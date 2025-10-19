<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
