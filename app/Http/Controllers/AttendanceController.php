<?php

namespace App\Http\Controllers;

use App\Models\AttendanceModel;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        $attendances = AttendanceModel::with([
                'student.user', 
                'company.user', 
                'approver.user'
            ])
            ->forCurrentUser()
            ->latest()
            ->paginate(10);

        return view('attendances.index', compact('attendances'));
    }


}
