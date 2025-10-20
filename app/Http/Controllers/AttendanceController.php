<?php

namespace App\Http\Controllers;

use App\Models\AttendanceModel;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        $attendances = AttendanceModel::with(['student', 'company', 'approver'])
            ->paginate(10);
        return view('attendances.index', compact('attendances'));
    }
}
