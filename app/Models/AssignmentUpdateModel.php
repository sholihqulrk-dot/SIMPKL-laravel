<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssignmentUpdateModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_assignment_updates';

    protected $fillable = [
        'assignment_id',
        'student_id',
        'content',
        'status',
        'reviewed_by',
        'feedback',
        'has_file',
    ];

    protected $casts = [
        'has_file' => 'boolean',
    ];

    /**
     * Relasi ke assignment utama
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(AssignmentModel::class, 'assignment_id');
    }

    /**
     * Relasi ke student
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    /**
     * Relasi ke teacher yang mereview
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(TeacherModel::class, 'reviewed_by');
    }

    /**
     * Relasi ke files
     */
    public function files(): HasMany
    {
        return $this->hasMany(AssignmentFileModel::class, 'update_id');
    }

    /**
     * Scope untuk updates berdasarkan status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Accessor untuk status color
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'submitted' => 'orange',
            'reviewed' => 'cyan',
            'rejected' => 'pink',
            default => 'gray'
        };
    }
}