<?php

namespace App\Http\Controllers;

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
}
