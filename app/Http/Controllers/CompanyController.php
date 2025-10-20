<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = CompanyModel::with('user')->paginate(10);
        return view('companies.index', compact('companies'));
    }
}
