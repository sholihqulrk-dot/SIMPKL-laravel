<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
