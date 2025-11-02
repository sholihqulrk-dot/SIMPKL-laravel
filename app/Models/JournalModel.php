<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class JournalModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_journals';

    protected $fillable = [
        'student_id',
        'pkl_placement_id',
        'title',
        'content',
        'week_number',
        'journal_date',
        'status',
        'reviewed_by',
        'reviewed_at',
        'score',
    ];

    /**
     * Relasi ke Siswa
     */
    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    /**
     * Relasi ke Penempatan PKL
     */
    public function pklPlacement()
    {
        return $this->belongsTo(PklPlacementModel::class, 'pkl_placement_id');
    }

    /**
     * Relasi ke Guru Reviewer
     */
    public function reviewer()
    {
        return $this->belongsTo(TeacherModel::class, 'reviewed_by');
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
                $q->whereHas('pklPlacement.teacher', fn($q2) => $q2->where('user_id', $userId))
                ->orWhereHas('reviewer', fn($q2) => $q2->where('user_id', $userId));
            }),
            'companies' => $query->whereHas('pklPlacement.company', fn($q) => $q->where('user_id', $userId)),
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
            $q->whereHas('pklPlacement.teacher', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            })->orWhereHas('reviewer', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            });
        });
    }

    /**
     * Scope untuk company specific
     */
    public function scopeForCompany($query, $companyUserId)
    {
        return $query->whereHas('pklPlacement.company', function ($q) use ($companyUserId) {
            $q->where('user_id', $companyUserId);
        });
    }

    /**
     * Scope untuk jurnal aktif (dengan penempatan aktif)
     */
    public function scopeActivePlacement($query)
    {
        return $query->whereHas('pklPlacement', function ($q) {
            $q->where('status', 'active');
        });
    }
}