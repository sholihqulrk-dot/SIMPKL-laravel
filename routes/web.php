<?php

use App\Http\Controllers\AssignmentController;
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

    // ==================== STUDENT ROUTES ====================
    Route::middleware('checkrole:student')->name('student.')->group(function () {
        Route::get('/student/pkl-placements', [PklPlacementController::class, 'index'])->name('pkl-placements.index');
        Route::get('/student/pkl-placements/{id}', [PklPlacementController::class, 'show'])->name('pkl-placements.show');
        Route::resource('/student/journals', JournalController::class)->names([
            'index' => 'journals.index',
            'create' => 'journals.create',
            'store' => 'journals.store',
            'show' => 'journals.show',
            'edit' => 'journals.edit',
            'update' => 'journals.update',
            'destroy' => 'journals.destroy'
        ]);
        Route::get('/student/grades', [GradeController::class, 'index'])->name('grades.index');
        Route::get('/student/grades/{id}', [GradeController::class, 'show'])->name('grades.show');
        Route::get('/student/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/student/documents/{id}', [DocumentController::class, 'show'])->name('documents.show');
        Route::get('/student/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/student/attendances/{id}', [AttendanceController::class, 'show'])->name('attendances.show');
        Route::resource('/student/companies', CompanyController::class)->only(['index', 'show']);
        Route::resource('/student/assignments', AssignmentController::class)->names([
            'index' => 'assignments.index',
            'create' => 'assignments.create',
            'store' => 'assignments.store',
            'show' => 'assignments.show',
            'edit' => 'assignments.edit',
            'update' => 'assignments.update',
            'destroy' => 'assignments.destroy'
        ]);
        Route::get('/student/profile', [StudentController::class, 'profile'])->name('profile');
    });

    // ==================== TEACHER ROUTES ====================
    Route::middleware('checkrole:teacher')->name('teacher.')->group(function () {
        Route::resource('/teacher/students', StudentController::class)->except(['create', 'store', 'destroy'])->names([
            'index' => 'students.index',
            'show' => 'students.show',
            'edit' => 'students.edit',
            'update' => 'students.update'
        ]);
        Route::resource('/teacher/pkl-placements', PklPlacementController::class)->names([
            'index' => 'pkl-placements.index',
            'create' => 'pkl-placements.create',
            'store' => 'pkl-placements.store',
            'show' => 'pkl-placements.show',
            'edit' => 'pkl-placements.edit',
            'update' => 'pkl-placements.update',
            'destroy' => 'pkl-placements.destroy'
        ]);
        Route::resource('/teacher/journals', JournalController::class)->names([
            'index' => 'journals.index',
            'create' => 'journals.create',
            'store' => 'journals.store',
            'show' => 'journals.show',
            'edit' => 'journals.edit',
            'update' => 'journals.update',
            'destroy' => 'journals.destroy'
        ]);
        Route::resource('/teacher/grades', GradeController::class)->names([
            'index' => 'grades.index',
            'create' => 'grades.create',
            'store' => 'grades.store',
            'show' => 'grades.show',
            'edit' => 'grades.edit',
            'update' => 'grades.update',
            'destroy' => 'grades.destroy'
        ]);
        Route::resource('/teacher/documents', DocumentController::class)->names([
            'index' => 'documents.index',
            'create' => 'documents.create',
            'store' => 'documents.store',
            'show' => 'documents.show',
            'edit' => 'documents.edit',
            'update' => 'documents.update',
            'destroy' => 'documents.destroy'
        ]);
        Route::resource('/teacher/attendances', AttendanceController::class)->names([
            'index' => 'attendances.index',
            'create' => 'attendances.create',
            'store' => 'attendances.store',
            'show' => 'attendances.show',
            'edit' => 'attendances.edit',
            'update' => 'attendances.update',
            'destroy' => 'attendances.destroy'
        ]);
        Route::resource('/teacher/assignments', AssignmentController::class)->names([
            'index' => 'assignments.index',
            'create' => 'assignments.create',
            'store' => 'assignments.store',
            'show' => 'assignments.show',
            'edit' => 'assignments.edit',
            'update' => 'assignments.update',
            'destroy' => 'assignments.destroy'
        ]);

        Route::resource('/teacher/companies', CompanyController::class)->only(['index', 'show']);

    });

    // ==================== COMPANY ROUTES ====================
    Route::middleware('checkrole:companies')->name('company.')->group(function () {
        Route::get('/company/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/company/students/{id}', [StudentController::class, 'show'])->name('students.show');
        Route::get('/company/pkl-placements', [PklPlacementController::class, 'index'])->name('pkl-placements.index');
        Route::get('/company/pkl-placements/{id}', [PklPlacementController::class, 'show'])->name('pkl-placements.show');
        Route::put('/company/pkl-placements/{id}', [PklPlacementController::class, 'update'])->name('pkl-placements.update');
        Route::get('/company/journals', [JournalController::class, 'index'])->name('journals.index');
        Route::get('/company/journals/{id}', [JournalController::class, 'show'])->name('journals.show');
        Route::get('/company/grades', [GradeController::class, 'index'])->name('grades.index');
        Route::get('/company/grades/{id}', [GradeController::class, 'show'])->name('grades.show');
        Route::get('/company/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/company/documents/{id}', [DocumentController::class, 'show'])->name('documents.show');
        Route::get('/company/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/company/attendances/{id}', [AttendanceController::class, 'show'])->name('attendances.show');
        Route::get('/company/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
        Route::get('/company/assignments/{id}', [AssignmentController::class, 'show'])->name('assignments.show');
    });

    // ==================== ADMIN ROUTES ====================
    Route::middleware('checkrole:admin')->name('admin.')->group(function () {
        // Full access untuk admin
        Route::resource('/admin/students', StudentController::class)->names([
            'index' => 'students.index',
            'create' => 'students.create',
            'store' => 'students.store',
            'show' => 'students.show',
            'edit' => 'students.edit',
            'update' => 'students.update',
            'destroy' => 'students.destroy'
        ]);
        Route::resource('/admin/teachers', TeacherController::class)->names([
            'index' => 'teachers.index',
            'create' => 'teachers.create',
            'store' => 'teachers.store',
            'show' => 'teachers.show',
            'edit' => 'teachers.edit',
            'update' => 'teachers.update',
            'destroy' => 'teachers.destroy'
        ]);
        Route::resource('/admin/companies', CompanyController::class)->names([
            'index' => 'companies.index',
            'create' => 'companies.create',
            'store' => 'companies.store',
            'show' => 'companies.show',
            'edit' => 'companies.edit',
            'update' => 'companies.update',
            'destroy' => 'companies.destroy'
        ]);
        Route::resource('/admin/pkl-placements', PklPlacementController::class)->names([
            'index' => 'pkl-placements.index',
            'create' => 'pkl-placements.create',
            'store' => 'pkl-placements.store',
            'show' => 'pkl-placements.show',
            'edit' => 'pkl-placements.edit',
            'update' => 'pkl-placements.update',
            'destroy' => 'pkl-placements.destroy'
        ]);
        Route::resource('/admin/journals', JournalController::class)->names([
            'index' => 'journals.index',
            'create' => 'journals.create',
            'store' => 'journals.store',
            'show' => 'journals.show',
            'edit' => 'journals.edit',
            'update' => 'journals.update',
            'destroy' => 'journals.destroy'
        ]);
        Route::resource('/admin/grades', GradeController::class)->names([
            'index' => 'grades.index',
            'create' => 'grades.create',
            'store' => 'grades.store',
            'show' => 'grades.show',
            'edit' => 'grades.edit',
            'update' => 'grades.update',
            'destroy' => 'grades.destroy'
        ]);
        Route::resource('/admin/documents', DocumentController::class)->names([
            'index' => 'documents.index',
            'create' => 'documents.create',
            'store' => 'documents.store',
            'show' => 'documents.show',
            'edit' => 'documents.edit',
            'update' => 'documents.update',
            'destroy' => 'documents.destroy'
        ]);
        Route::resource('/admin/attendances', AttendanceController::class)->names([
            'index' => 'attendances.index',
            'create' => 'attendances.create',
            'store' => 'attendances.store',
            'show' => 'attendances.show',
            'edit' => 'attendances.edit',
            'update' => 'attendances.update',
            'destroy' => 'attendances.destroy'
        ]);
        Route::resource('/admin/assignments', AssignmentController::class)->names([
            'index' => 'assignments.index',
            'create' => 'assignments.create',
            'store' => 'assignments.store',
            'show' => 'assignments.show',
            'edit' => 'assignments.edit',
            'update' => 'assignments.update',
            'destroy' => 'assignments.destroy'
        ]);
        
    });

    // ==================== FALLBACK ROUTE ====================
    Route::fallback(function () {
        return response()->view('errors.403', [], 403);
    });
});

