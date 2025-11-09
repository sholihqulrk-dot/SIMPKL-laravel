<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role_id;

        // Base query
        $query = StudentModel::with('user');

        switch ($role) {
            case 'admin':
                $students = $query->paginate(10);
                break;

            case 'teacher':
                $teacher = TeacherModel::where('user_id', $user->id)->first();

                if ($teacher) {
                    $students = $query->whereHas('pklPlacements', function ($q) use ($teacher) {
                        $q->where('teacher_id', $teacher->id);
                    })->paginate(10);
                } else {
                    $students = collect();
                }
                break;

            case 'companies':
                $company = CompanyModel::where('user_id', $user->id)->first();

                if ($company) {
                    $students = $query->whereHas('pklPlacements', function ($q) use ($company) {
                        $q->where('company_id', $company->id);
                    })->paginate(10);
                } else {
                    $students = collect();
                }
                break;

            case 'student':
                $students = $query->where('user_id', $user->id)->paginate(10);
                break;

            default:
                $students = collect();
        }

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.form');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nis' => 'required|string|unique:table_student,nis',
            'class' => 'required|string|max:50',
            'major' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // Create user account
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make('password123'), // Default password
                    'role_id' => 'student',
                ]);

                // Create student record
                StudentModel::create([
                    'user_id' => $user->id,
                    'nis' => $request->nis,
                    'class' => $request->class,
                    'major' => $request->major,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]);
            });

            return redirect()->route('admin.students.index')
                ->with('success', 'Siswa berhasil ditambahkan.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = StudentModel::with('user')->findOrFail($id);
        return view('students.form', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $student = StudentModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'nis' => 'required|string|unique:table_student,nis,' . $id,
            'class' => 'required|string|max:50',
            'major' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        try {
            DB::transaction(function () use ($request, $student) {
                // Update user account
                $user = User::findOrFail($student->user_id);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                // Update student record
                $student->update([
                    'nis' => $request->nis,
                    'class' => $request->class,
                    'major' => $request->major,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                ]);
            });

            return redirect()->route('admin.students.index')
                ->with('success', 'Data siswa berhasil diperbarui.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        $student = StudentModel::findOrFail($id);

        try {
            DB::transaction(function () use ($student) {
                // Delete user account
                User::where('id', $student->user_id)->delete();
                
                // Delete student record
                $student->delete();
            });

            return redirect()->route('admin.students.index')
                ->with('success', 'Siswa berhasil dihapus.');
                
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
                $studentIds = explode(',', $request->get('student_ids', ''));
                $students = StudentModel::with('user')->whereIn('id', $studentIds)->get();
                break;
            case 'filtered':
                // Implementasi filtering sesuai kebutuhan
                $students = StudentModel::with('user')->get();
                break;
            case 'all':
            default:
                $students = StudentModel::with('user')->get();
                break;
        }

        $filename = 'data-siswa-' . date('Y-m-d-H-i-s') . '.xlsx';
        
        return Excel::download(new StudentsExport($students), $filename);
    }

    /**
     * Import data siswa dari Excel
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240'
        ]);

        try {
            $import = new StudentsImport;
            Excel::import($import, $request->file('file'));

            $message = "Import berhasil! {$import->successCount} data siswa berhasil diimpor.";
            
            if (!empty($import->errors)) {
                $message .= " Terdapat " . count($import->errors) . " error.";
                
                // Simpan error log untuk ditampilkan
                session()->flash('import_errors', $import->errors);
            }

            return redirect()->route('admin.students.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('admin.students.index')
                ->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }

    /**
     * Download template Excel
     */
    public function downloadTemplate()
    {
        $templateData = [
            [
                'nis' => '20240001',
                'nama_lengkap' => 'John Doe',
                'email' => 'john.doe@example.com',
                'kelas' => 'XII RPL 1',
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'alamat' => 'Jl. Contoh No. 123',
                'telepon' => '081234567890'
            ],
            [
                'nis' => '20240002', 
                'nama_lengkap' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'kelas' => 'XII TKJ 1',
                'jurusan' => 'Teknik Komputer dan Jaringan',
                'alamat' => 'Jl. Sample No. 456',
                'telepon' => '081234567891'
            ]
        ];

        $filename = 'template-import-siswa.xlsx';
        
        return Excel::download(new StudentsExport(collect($templateData)), $filename);
    }
}