<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the main dashboard
     */
    public function index()
    {
        $user = auth()->user();
        
        return view('dashboard.index', compact('user'));
    }
}

class StudentController extends Controller
{
    /**
     * Show student dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        return view('dashboard.student', compact('user'));
    }

    /**
     * Show student courses
     */
    public function courses()
    {
        return view('dashboard.student-courses');
    }
}

class TeacherController extends Controller
{
    /**
     * Show teacher dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        return view('dashboard.teacher', compact('user'));
    }

    /**
     * Show teacher classes
     */
    public function classes()
    {
        return view('dashboard.teacher-classes');
    }
}

class CompanyController extends Controller
{
    /**
     * Show company dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        return view('dashboard.company', compact('user'));
    }

    /**
     * Show job postings
     */
    public function jobs()
    {
        return view('dashboard.company-jobs');
    }
}