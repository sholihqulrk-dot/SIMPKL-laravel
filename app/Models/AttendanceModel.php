<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class AttendanceModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_attendances';

    protected $fillable = [
        'student_id',
        'pkl_placement_id',
        'attendance_date',
        'status',
        'notes',
        'approval_status',
        'approved_by',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    // Relasi ke siswa
    public function student()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    // Relasi ke tempat PKL (perusahaan)
    public function company()
    {
        return $this->belongsTo(CompanyModel::class, 'pkl_placement_id');
    }

    // Relasi ke pembimbing perusahaan (yang menyetujui)
    public function approver()
    {
        return $this->belongsTo(CompanyModel::class, 'approved_by');
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
            'teacher' => $query->whereHas('student.pklPlacements.teacher', fn($q) => $q->where('user_id', $userId)),
            'companies' => $query->where(function ($q) use ($userId) {
                $q->whereHas('company', fn($q2) => $q2->where('user_id', $userId))
                  ->orWhereHas('approver', fn($q2) => $q2->where('user_id', $userId));
            }),
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
        return $query->whereHas('student.pklPlacements', function ($q) use ($teacherUserId) {
            $q->whereHas('teacher', function ($q2) use ($teacherUserId) {
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
            $q->whereHas('company', function ($q2) use ($companyUserId) {
                $q2->where('user_id', $companyUserId);
            })->orWhereHas('approver', function ($q2) use ($companyUserId) {
                $q2->where('user_id', $companyUserId);
            });
        });
    }

    /**
     * Scope untuk absensi dengan penempatan aktif
     */
    public function scopeActivePlacement($query)
    {
        return $query->whereHas('company', function ($q) {
            $q->where('status', 'active');
        });
    }

    /**
     * Scope untuk absensi berdasarkan status persetujuan
     */
    public function scopeByApprovalStatus($query, $status)
    {
        return $query->where('approval_status', $status);
    }

    /**
     * Scope untuk absensi berdasarkan status kehadiran
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk absensi dalam rentang tanggal
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('attendance_date', [$startDate, $endDate]);
    }

    /**
     * Accessor untuk status label
     */
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'present' => 'Hadir',
            'late' => 'Terlambat',
            'absent' => 'Tidak Hadir',
            'permission' => 'Izin',
            'sick' => 'Sakit',
            default => $this->status
        };
    }

    /**
     * Accessor untuk approval status label
     */
    public function getApprovalStatusLabelAttribute()
    {
        return match($this->approval_status) {
            'pending' => 'Menunggu',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            default => $this->approval_status
        };
    }

    /**
     * Check if attendance is approved
     */
    public function getIsApprovedAttribute()
    {
        return $this->approval_status === 'approved';
    }

    /**
     * Check if attendance is pending
     */
    public function getIsPendingAttribute()
    {
        return $this->approval_status === 'pending';
    }
}