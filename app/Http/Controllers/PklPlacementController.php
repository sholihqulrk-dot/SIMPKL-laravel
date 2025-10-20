<?php

namespace App\Http\Controllers;

use App\Models\PklPlacementModel;
use Illuminate\Http\Request;

class PklPlacementController extends Controller
{
    //
    public function index()
    {
        $placements = PklPlacementModel::with(['student', 'company', 'teacher'])
            ->paginate(10);
        return view('pkl-placements.index', compact('placements'));
    }
}
