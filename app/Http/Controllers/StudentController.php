<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function dashboard()
    {
        // Kirim ke view
        return view('dashboard.student');
    }

    public function index()
    {
        $user = Auth::user();
        $role = $user->role_id;

        // Base query
        $query = StudentModel::with('user');

        switch ($role) {
            case 'admin':
                // Admin bisa melihat semua
                $students = $query->paginate(10);
                break;

            case 'teacher':
                /**
                 * Asumsi relasi antara teacher dan student tersimpan di tabel PKL atau relasi kelas.
                 * Misalnya di tabel `table_pkl_placements` terdapat kolom `teacher_id`.
                 */
                $teacher = TeacherModel::where('user_id', $user->id)->first();

                if ($teacher) {
                    $students = $query->whereHas('pklPlacements', function ($q) use ($teacher) {
                        $q->where('teacher_id', $teacher->id);
                    })->paginate(10);
                } else {
                    $students = collect(); // Tidak ada data
                }
                break;

            case 'companies':
                /**
                 * Asumsi relasi PKL: tabel `table_pkl_placements`
                 * kolom `company_id` menghubungkan dengan perusahaan.
                 */
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
                // Hanya data dirinya sendiri
                $students = $query->where('user_id', $user->id)->paginate(10);
                break;

            default:
                $students = collect(); // role lain tidak punya akses
        }

        return view('students.index', compact('students'));
    }
}
