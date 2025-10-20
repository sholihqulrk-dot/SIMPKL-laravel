<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PklPlacementController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;


Route::get('/', function () {
    return view('index');
});

Route::get('/layouts', function () {
    return view('layouts.app');
});

// Guest routes (accessible only when not authenticated)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Profile Routes
Route::prefix('profile')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Main dashboard (accessible to all authenticated users)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Resource Routes untuk semua model
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('pkl-placements', PklPlacementController::class);
    Route::resource('journals', JournalController::class);
    Route::resource('grades', GradeController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('attendances', AttendanceController::class);
});

