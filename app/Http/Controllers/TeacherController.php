<?php

namespace App\Http\Controllers;

use App\Models\TeacherModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Exports\TeachersExport;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = TeacherModel::with('user')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

     /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('teachers.form', [
            'teacher' => null,
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|string|unique:table_teachers,nip',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        DB::transaction(function () use ($validated) {
            // Create user account
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make('password123'), // Default password
                'role_id' => 'teacher',
            ]);

            // Create teacher record
            TeacherModel::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'nip' => $validated['nip'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'email' => $validated['email'],
            ]);
        });

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit(string $id)
    {
        $teacher = TeacherModel::with('user')->findOrFail($id);

        return view('teachers.form', [
            'teacher' => $teacher,
            'mode' => 'edit'
        ]);
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = TeacherModel::with('user')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id,
            'nip' => 'required|string|unique:table_teachers,nip,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        DB::transaction(function () use ($validated, $teacher) {
            // Update user account
            $teacher->user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);

            // Update teacher record
            $teacher->update([
                'name' => $validated['name'],
                'nip' => $validated['nip'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'email' => $validated['email'],
            ]);
        });

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy(string $id)
    {
        $teacher = TeacherModel::with('user')->findOrFail($id);

        DB::transaction(function () use ($teacher) {
            // Soft delete teacher record
            $teacher->delete();
            
            // Also delete the associated user account
            $teacher->user->delete();
        });

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Guru berhasil dihapus.');
    }

     public function export(Request $request)
    {
        $type = $request->get('type', 'all');
        
        switch ($type) {
            case 'selected':
                $teacherIds = explode(',', $request->get('teacher_ids', ''));
                $teachers = TeacherModel::with('user')->whereIn('id', $teacherIds)->get();
                break;
            case 'filtered':
                // Implementasi filtering sesuai kebutuhan
                $teachers = TeacherModel::with('user')->get();
                break;
            case 'all':
            default:
                $teachers = TeacherModel::with('user')->get();
                break;
        }

        $filename = 'data-guru-' . date('Y-m-d-H-i-s') . '.xlsx';
        
        return Excel::download(new TeachersExport($teachers), $filename);
    }

    /**
     * Import data guru dari Excel
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240'
        ]);

        try {
            $import = new TeachersImport;
            Excel::import($import, $request->file('file'));

            $message = "Import berhasil! {$import->successCount} data guru berhasil diimpor.";
            
            if (!empty($import->errors)) {
                $message .= " Terdapat " . count($import->errors) . " error.";
                
                // Simpan error log untuk ditampilkan
                session()->flash('import_errors', $import->errors);
            }

            return redirect()->route('admin.teachers.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('admin.teachers.index')
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
                'nip' => '198001012000121001',
                'nama_lengkap' => 'Dr. Ahmad Wijaya, M.Pd.',
                'email' => 'ahmad.wijaya@example.com',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Pendidikan No. 123, Jakarta'
            ],
            [
                'nip' => '198102022001122002',
                'nama_lengkap' => 'Diana Sari, S.Pd., M.T.',
                'email' => 'diana.sari@example.com', 
                'telepon' => '081234567891',
                'alamat' => 'Jl. Guru Besar No. 45, Bandung'
            ],
            [
                'nip' => '198503152003072003',
                'nama_lengkap' => 'Budi Santoso, S.Kom.',
                'email' => 'budi.santoso@example.com',
                'telepon' => '081234567892',
                'alamat' => 'Jl. Teknologi No. 67, Surabaya'
            ]
        ];

        $filename = 'template-import-guru.xlsx';
        
        return Excel::download(new TeachersExport(collect($templateData)), $filename);
    }
}
