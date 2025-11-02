<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignmentFileModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_assignment_files';

    protected $fillable = [
        'update_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'reviewed',
        'comment',
    ];

    protected $casts = [
        'reviewed' => 'boolean',
        'file_size' => 'integer',
    ];

    /**
     * Relasi ke assignment update
     */
    public function assignmentUpdate(): BelongsTo
    {
        return $this->belongsTo(AssignmentUpdateModel::class, 'update_id');
    }

    /**
     * Accessor untuk formatted file size
     */
    public function getFormattedFileSizeAttribute(): string
    {
        $bytes = $this->file_size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    /**
     * Accessor untuk file icon berdasarkan type
     */
    public function getFileIconAttribute(): string
    {
        $extension = pathinfo($this->file_name, PATHINFO_EXTENSION);
        
        return match(strtolower($extension)) {
            'pdf' => '📄',
            'doc', 'docx' => '📝',
            'xls', 'xlsx' => '📊',
            'jpg', 'jpeg', 'png', 'gif' => '🖼️',
            'zip', 'rar' => '📦',
            default => '📎'
        };
    }
}