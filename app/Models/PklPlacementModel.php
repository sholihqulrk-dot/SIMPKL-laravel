<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class PklPlacementModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_pkl_placements';

    protected $fillable = [
        'student_id',
        'company_id',
        'teacher_id',
        'start_date',
        'end_date',
        'total_weeks',
        'status',
        'description',
    ];

    /**
     * Relasi ke Student
     */
    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    /**
     * Relasi ke Company
     */
    public function company()
    {
        return $this->belongsTo(CompanyModel::class, 'company_id');
    }

    /**
     * Relasi ke Teacher
     */
    public function teacher()
    {
        return $this->belongsTo(TeacherModel::class, 'teacher_id');
    }

    /**
     * Scope untuk filter berdasarkan role user
     */
    public function scopeForCurrentUser($query)
    {
        $user = Auth::user();
        if (!$user) return $query->where('id', 0);

        $userId = $user->id;
        $userRole = $user->role_id;

        return match($userRole) {
            'admin' => $query,
            'student' => $query->whereHas('student', fn($q) => $q->where('user_id', $userId)),
            'teacher' => $query->whereHas('teacher', fn($q) => $q->where('user_id', $userId)),
            'companies' => $query->whereHas('company', fn($q) => $q->where('user_id', $userId)),
            default => $query->where('id', 0)
        };
    }

    /**
     * Scope untuk company specific
     */
    public function scopeForCompany($query, $companyUserId)
    {
        return $query->whereHas('company', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    /**
     * Scope untuk teacher specific
     */
    public function scopeForTeacher($query, $teacherUserId)
    {
        return $query->whereHas('teacher', function ($q) use ($teacherUserId) {
            $q->where('user_id', $teacherUserId);
        });
    }
}