<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

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
        $students = StudentModel::with('user')->paginate(10);
        return view('students.index', compact('students'));
    }
}
