<?php

namespace App\Http\Controllers;

use App\Models\JournalModel;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    //
    public function index()
    {
        $journals = JournalModel::with([
                'student.user', 
                'pklPlacement.company', 
                'reviewer.user'
            ])
            ->forCurrentUser()
            ->latest()
            ->paginate(10);

        return view('journals.index', compact('journals'));
    }
}
