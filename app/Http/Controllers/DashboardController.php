<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the main dashboard
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role_id;

        // Redirect ke dashboard berdasarkan role
        return match($role) {
            'student' => $this->studentDashboard($user),
            'teacher' => $this->teacherDashboard($user),
            'companies' => $this->companyDashboard($user),
            'admin' => $this->adminDashboard($user),
            default => abort(403, 'Unauthorized role'),
        };
    }

    protected function studentDashboard($user)
    {
        // Logika khusus student
        $studentData = []; // Tambahkan data yang diperlukan
        return view('dashboard.student', compact('user', 'studentData'));
    }

    protected function teacherDashboard($user)
    {
        // Logika khusus teacher
        $teacherData = []; // Tambahkan data yang diperlukan
        return view('dashboard.teacher', compact('user', 'teacherData'));
    }

    protected function companyDashboard($user)
    {
        // Logika khusus company
        $companyData = []; // Tambahkan data yang diperlukan
        return view('dashboard.company', compact('user', 'companyData'));
    }

    protected function adminDashboard($user)
    {
        // Logika khusus admin
        $adminData = []; // Tambahkan data yang diperlukan
        return view('dashboard.admin', compact('user', 'adminData'));
    }
}
