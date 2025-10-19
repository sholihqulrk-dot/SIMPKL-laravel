<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
