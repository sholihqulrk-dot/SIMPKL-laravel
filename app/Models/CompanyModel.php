<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'table_companies';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'website',
        'supervisor_name',
        'supervisor_phone',
        'supervisor_email',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
