<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_teachers';

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'phone',
        'address',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createdAssignments(): HasMany
    {
        return $this->hasMany(AssignmentModel::class, 'created_by_id')
                    ->where('created_by_type', 'teacher');
    }

    public function reviewedUpdates(): HasMany
    {
        return $this->hasMany(AssignmentUpdateModel::class, 'reviewed_by');
    }
}
