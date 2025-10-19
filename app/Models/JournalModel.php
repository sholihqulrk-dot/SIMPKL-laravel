<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
