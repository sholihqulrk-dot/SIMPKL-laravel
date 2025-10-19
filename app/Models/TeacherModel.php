<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
