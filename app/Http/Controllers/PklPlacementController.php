<?php

namespace App\Http\Controllers;

use App\Models\PklPlacementModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}   