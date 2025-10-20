<?php

namespace App\Http\Controllers;

use App\Models\TeacherModel;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = TeacherModel::with('user')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }
}
