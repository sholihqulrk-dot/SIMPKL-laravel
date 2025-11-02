<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class GradeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_grades';

    protected $fillable = [
        'pkl_placement_id',
        'student_id',
        'teacher_id',
        'score',
        'feedback',
    ];

    // Relasi ke perusahaan (tempat PKL)
    public function company()
    {
        return $this->belongsTo(CompanyModel::class, 'pkl_placement_id');
    }

    // Relasi ke siswa
    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    // Relasi ke guru
    public function teacher()
    {
        return $this->belongsTo(TeacherModel::class, 'teacher_id');
    }

    /**
     * Scope untuk filter berdasarkan role user yang login
     */
    public function scopeForCurrentUser($query)
    {
        $user = Auth::user();
        if (!$user) {
            return $query->where('id', 0);
        }

        $userId = $user->id;
        $userRole = $user->role_id;

        return match($userRole) {
            'admin' => $query,
            'student' => $query->whereHas('student', fn($q) => $q->where('user_id', $userId)),
            'teacher' => $query->where(function ($q) use ($userId) {
                $q->whereHas('teacher', fn($q2) => $q2->where('user_id', $userId))
                  ->orWhereHas('student.pklPlacements.teacher', fn($q2) => $q2->where('user_id', $userId));
            }),
            'companies' => $query->whereHas('company', fn($q) => $q->where('user_id', $userId)),
            default => $query->where('id', 0)
        };
    }

    /**
     * Scope untuk student specific
     */
    public function scopeForStudent($query, $studentUserId)
    {
        return $query->whereHas('student', function ($q) use ($studentUserId) {
            $q->where('user_id', $studentUserId);
        });
    }

    /**
     * Scope untuk teacher specific
     */
    public function scopeForTeacher($query, $teacherUserId)
    {
        return $query->where(function ($q) use ($teacherUserId) {
            $q->whereHas('teacher', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            })->orWhereHas('student.pklPlacements.teacher', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            });
        });
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
     * Scope untuk nilai dengan penempatan aktif
     */
    public function scopeActivePlacement($query)
    {
        return $query->whereHas('company', function ($q) {
            $q->where('status', 'active');
        });
    }

    /**
     * Scope untuk nilai berdasarkan rentang skor
     */
    public function scopeScoreRange($query, $min, $max)
    {
        return $query->whereBetween('score', [$min, $max]);
    }

    /**
     * Scope untuk nilai di atas tertentu
     */
    public function scopeMinScore($query, $minScore)
    {
        return $query->where('score', '>=', $minScore);
    }

    /**
     * Scope untuk nilai di bawah tertentu
     */
    public function scopeMaxScore($query, $maxScore)
    {
        return $query->where('score', '<=', $maxScore);
    }

    /**
     * Accessor untuk grade letter (A, B, C, D, E)
     */
    public function getGradeLetterAttribute()
    {
        return match(true) {
            $this->score >= 90 => 'A',
            $this->score >= 80 => 'B',
            $this->score >= 70 => 'C',
            $this->score >= 60 => 'D',
            default => 'E'
        };
    }

    /**
     * Accessor untuk grade description
     */
    public function getGradeDescriptionAttribute()
    {
        return match($this->grade_letter) {
            'A' => 'Sangat Baik',
            'B' => 'Baik',
            'C' => 'Cukup',
            'D' => 'Kurang',
            'E' => 'Sangat Kurang',
            default => 'Tidak Ada Nilai'
        };
    }

    /**
     * Accessor untuk status kelulusan
     */
    public function getIsPassedAttribute()
    {
        return $this->score >= 70; // Standar kelulusan 70
    }

    /**
     * Check if grade is excellent
     */
    public function getIsExcellentAttribute()
    {
        return $this->score >= 90;
    }

    /**
     * Check if grade needs improvement
     */
    public function getNeedsImprovementAttribute()
    {
        return $this->score < 70;
    }
}