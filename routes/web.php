<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CompanyController;
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

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Main dashboard (accessible to all authenticated users)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Student routes - using CheckRole middleware
    Route::middleware(CheckRole::class . ':student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
        Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    });
    
    // Teacher routes - using CheckRole middleware
    Route::middleware(CheckRole::class . ':teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
        Route::get('/classes', [TeacherController::class, 'classes'])->name('classes');
    });
    
    // Company routes - using CheckRole middleware
    Route::middleware(CheckRole::class . ':companies')->prefix('company')->name('company.')->group(function () {
        Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
        Route::get('/jobs', [CompanyController::class, 'jobs'])->name('jobs');
    });
    
    // Admin route example - accessible by both teacher and companies
    Route::middleware(CheckRole::class . ':teacher,companies')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/reports', function () {
            return view('admin.reports');
        })->name('reports');
    });
});

