<?php

namespace App\Http\Controllers;

use App\Models\AssignmentModel;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Tampilkan daftar assignments
     */
    public function index(Request $request)
    {
        $assignments = AssignmentModel::with([
                'pklPlacement.student.user',
                'pklPlacement.company.user', 
                'pklPlacement.teacher.user',
                'updates.student.user',
                'updates.reviewer.user',
                'updates.files'
            ])
            ->forCurrentUser()
            ->latest()
            ->paginate(10);

        // Load manual creator
        $assignments->each(function ($assignment) {
            $assignment->creator = $assignment->createdBy()?->first();
        });

        return view('assignments.index', compact('assignments'));
    }

}
