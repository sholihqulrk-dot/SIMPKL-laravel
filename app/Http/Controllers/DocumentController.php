<?php

namespace App\Http\Controllers;

use App\Models\DocumentModel;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //
    public function index()
    {
        $documents = DocumentModel::with([
                'student.user', 
                'pklPlacement.company', 
                'reviewer.user'
            ])
            ->forCurrentUser()
            ->latest()
            ->paginate(10);

        return view('documents.index', compact('documents'));
    }
}
