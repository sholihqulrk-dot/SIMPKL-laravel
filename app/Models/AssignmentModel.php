<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class AssignmentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_assignments';

    protected $fillable = [
        'pkl_placement_id',
        'title',
        'description',
        'deadline',
        'grade',
        'created_by_type', // 'teacher' atau 'company'
        'created_by_id',
    ];

    protected $casts = [
        'deadline' => 'date',
        'grade' => 'integer',
    ];

    /**
     * Relasi ke penempatan PKL
     */
    public function pklPlacement(): BelongsTo
    {
        return $this->belongsTo(PklPlacementModel::class, 'pkl_placement_id');
    }

    /**
     * Relasi ke perusahaan (melalui penempatan PKL)
     */
    public function company()
    {
        return $this->belongsTo(CompanyModel::class, 'pkl_placement_id');
    }

    /**
     * Relasi ke update tugas
     */
    public function updates(): HasMany
    {
        return $this->hasMany(AssignmentUpdateModel::class, 'assignment_id');
    }

    /**
     * Ambil pembuat tugas (teacher / company) secara dinamis
     */
    public function createdBy()
    {
        if ($this->created_by_type === 'teacher') {
            return $this->belongsTo(TeacherModel::class, 'created_by_id');
        } elseif ($this->created_by_type === 'company') {
            return $this->belongsTo(CompanyModel::class, 'created_by_id');
        }

        return null;
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
            'student' => $query->where(function ($q) use ($userId) {
                $q->whereHas('updates.student', fn($q2) => $q2->where('user_id', $userId))
                  ->orWhereHas('pklPlacement.student', fn($q2) => $q2->where('user_id', $userId));
            }),
            'teacher' => $query->where(function ($q) use ($userId) {
                $q->where(function ($q2) use ($userId) {
                    $q2->where('created_by_type', 'teacher')
                       ->where('created_by_id', $userId);
                })
                ->orWhereHas('pklPlacement.teacher', fn($q2) => $q2->where('user_id', $userId))
                ->orWhereHas('updates.student.pklPlacements.teacher', fn($q2) => $q2->where('user_id', $userId));
            }),
            'companies' => $query->where(function ($q) use ($userId) {
                $q->where(function ($q2) use ($userId) {
                    $q2->where('created_by_type', 'company')
                       ->where('created_by_id', $userId);
                })
                ->orWhereHas('pklPlacement.company', fn($q2) => $q2->where('user_id', $userId))
                ->orWhereHas('updates.student.pklPlacements.company', fn($q2) => $q2->where('user_id', $userId));
            }),
            default => $query->where('id', 0)
        };
    }

    /**
     * Scope untuk student specific
     */
    public function scopeForStudent($query, $studentUserId)
    {
        return $query->where(function ($q) use ($studentUserId) {
            $q->whereHas('updates.student', function ($q2) use ($studentUserId) {
                $q2->where('user_id', $studentUserId);
            })->orWhereHas('pklPlacement.student', function ($q2) use ($studentUserId) {
                $q2->where('user_id', $studentUserId);
            });
        });
    }

    /**
     * Scope untuk teacher specific
     */
    public function scopeForTeacher($query, $teacherUserId)
    {
        return $query->where(function ($q) use ($teacherUserId) {
            $q->where(function ($q2) use ($teacherUserId) {
                $q2->where('created_by_type', 'teacher')
                   ->where('created_by_id', $teacherUserId);
            })
            ->orWhereHas('pklPlacement.teacher', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            })
            ->orWhereHas('updates.student.pklPlacements.teacher', function ($q2) use ($teacherUserId) {
                $q2->where('user_id', $teacherUserId);
            });
        });
    }

    /**
     * Scope untuk company specific
     */
    public function scopeForCompany($query, $companyUserId)
    {
        return $query->where(function ($q) use ($companyUserId) {
            $q->where(function ($q2) use ($companyUserId) {
                $q2->where('created_by_type', 'company')
                   ->where('created_by_id', $companyUserId);
            })
            ->orWhereHas('pklPlacement.company', function ($q2) use ($companyUserId) {
                $q2->where('user_id', $companyUserId);
            })
            ->orWhereHas('updates.student.pklPlacements.company', function ($q2) use ($companyUserId) {
                $q2->where('user_id', $companyUserId);
            });
        });
    }

    /**
     * Ambil nama pembuat
     */
    public function getCreatorNameAttribute(): string
    {
        $creator = $this->createdBy()?->first();
        return $creator->name ?? 'Unknown';
    }

    /**
     * Status deadline
     */
    public function getDeadlineStatusAttribute(): string
    {
        if (!$this->deadline) return 'no-deadline';
        if ($this->deadline->isPast()) return 'overdue';
        if ($this->deadline->diffInDays(now()) <= 3) return 'urgent';
        return 'upcoming';
    }

    /**
     * Update terbaru
     */
    public function getLatestUpdateAttribute()
    {
        return $this->updates()->latest()->first();
    }
}