<?php

namespace App\Http\Controllers;

use App\Models\PklPlacementModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\PklPlacementsExport;
use App\Exports\PklPlacementsTemplateExport;
use App\Imports\PklPlacementsImport;
use Maatwebsite\Excel\Facades\Excel;

class PklPlacementController extends Controller
{
    public function index()
    {
        $placements = PklPlacementModel::with(['student.user', 'company.user', 'teacher.user'])
            ->forCurrentUser()
            ->paginate(10);

        return view('pkl-placements.index', compact('placements'));
    }

    /**
     * Filter penempatan untuk student (hanya data sendiri)
     */

       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua student_id yang sudah punya placement
        $assignedStudentIds = PklPlacementModel::pluck('student_id')->toArray();

        // Ambil hanya siswa yang belum punya placement
        $students = StudentModel::with('user')
            ->whereNotIn('id', $assignedStudentIds)
            ->get();

        // Semua company
        $companies = CompanyModel::all();

        // Semua teacher kecuali role admin
        $teachers = TeacherModel::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role_id', '!=', 'admin');
            })
            ->get();

        return view('pkl-placements.form', compact('students', 'companies', 'teachers'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:table_student,id',
            'company_id' => 'required|exists:table_companies,id',
            'teacher_id' => 'nullable|exists:table_teachers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        try {
            // Calculate total weeks
            $startDate = \Carbon\Carbon::parse($request->start_date);
            $endDate = \Carbon\Carbon::parse($request->end_date);
            $totalWeeks = $startDate->diffInWeeks($endDate);

            PklPlacementModel::create([
                'student_id' => $request->student_id,
                'company_id' => $request->company_id,
                'teacher_id' => $request->teacher_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_weeks' => $totalWeeks,
                'status' => 'pending',
                'description' => $request->description,
            ]);

            return redirect()->route('admin.pkl-placements.index')
                ->with('success', 'Penempatan PKL berhasil ditambahkan.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $placement = PklPlacementModel::with(['student.user', 'company', 'teacher.user'])
            ->forCurrentUser()
            ->findOrFail($id);
            
        // Ambil semua student_id yang sudah punya placement, kecuali student saat ini
        $assignedStudentIds = PklPlacementModel::where('id', '!=', $id)
            ->pluck('student_id')
            ->toArray();

        // ✅ Ambil siswa yang belum memiliki placement, atau siswa yang sedang diedit
        $students = StudentModel::with('user')
            ->whereNotIn('id', $assignedStudentIds)
            ->orWhere('id', $placement->student_id)
            ->get();

        $companies = CompanyModel::all();
        $teachers = TeacherModel::with('user')->get();
        
        return view('pkl-placements.form', compact('placement', 'students', 'companies', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $placement = PklPlacementModel::findOrFail($id);

        $request->validate([
            'student_id' => 'required|exists:table_student,id',
            'company_id' => 'required|exists:table_companies,id',
            'teacher_id' => 'nullable|exists:table_teachers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pending,active,completed',
            'description' => 'nullable|string',
        ]);

        try {
            // Calculate total weeks
            $startDate = \Carbon\Carbon::parse($request->start_date);
            $endDate = \Carbon\Carbon::parse($request->end_date);
            $totalWeeks = $startDate->diffInWeeks($endDate);

            $placement->update([
                'student_id' => $request->student_id,
                'company_id' => $request->company_id,
                'teacher_id' => $request->teacher_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_weeks' => $totalWeeks,
                'status' => $request->status,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.pkl-placements.index')
                ->with('success', 'Data penempatan PKL berhasil diperbarui.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $placement = PklPlacementModel::findOrFail($id);

        try {
            $placement->delete();

            return redirect()->route('admin.pkl-placements.index')
                ->with('success', 'Penempatan PKL berhasil dihapus.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $type = $request->get('type', 'all');
        
        switch ($type) {
            case 'selected':
                $placementIds = explode(',', $request->get('placement_ids', ''));
                $placements = PklPlacementModel::with(['student.user', 'company', 'teacher.user'])
                    ->whereIn('id', $placementIds)
                    ->get();
                break;
            case 'filtered':
                // Implementasi filtering sesuai kebutuhan
                $placements = PklPlacementModel::with(['student.user', 'company', 'teacher.user'])->get();
                break;
            case 'all':
            default:
                $placements = PklPlacementModel::with(['student.user', 'company', 'teacher.user'])->get();
                break;
        }

        $filename = 'data-penempatan-pkl-' . date('Y-m-d-H-i-s') . '.xlsx';
        
        return Excel::download(new PklPlacementsExport($placements), $filename);
    }

    /**
     * Import data penempatan PKL dari Excel
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240'
        ]);

        try {
            $import = new PklPlacementsImport;
            Excel::import($import, $request->file('file'));

            $success = $import->successCount;
            $errorCount = count($import->errors);

            $message = "✅ <strong>Import selesai.</strong> {$success} data perusahaan berhasil diimpor.";

            if ($errorCount > 0) {
                $message .= " ⚠️ {$errorCount} baris gagal diimpor karena kesalahan data.";
                session()->flash('import_errors', $import->errors);
            }

            return redirect()->route('admin.pkl-placements.index')->with('success', $message);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
            }

            return redirect()->route('admin.pkl-placements.index')
                ->with('error', "Kesalahan validasi saat import:<br>" . implode("<br>", $errorMessages));

        } catch (\Throwable $e) {
            return redirect()->route('admin.pkl-placements.index')
                ->with('error', 'Terjadi kesalahan saat mengimpor data:<br>' . $e->getMessage());
        }
    }

    /**
     * Download template Excel dengan data validation
     */
    public function downloadTemplate()
    {
        $filename = 'template-import-penempatan-pkl.xlsx';
        
        return Excel::download(new PklPlacementsTemplateExport(), $filename);
    }

    

}   