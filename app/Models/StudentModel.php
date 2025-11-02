<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_student';

    protected $fillable = [
        'user_id',
        'nis',
        'class',
        'major',
        'address',
        'phone',
        'email',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pklPlacements()
    {
        return $this->hasMany(PklPlacementModel::class, 'student_id');
    }
}
