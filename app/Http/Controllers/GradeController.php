<?php

namespace App\Http\Controllers;

use App\Models\GradeModel;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function index()
    {
        $grades = GradeModel::with(['student', 'teacher', 'company'])
            ->paginate(10);
        return view('grades.index', compact('grades'));
    }
}
