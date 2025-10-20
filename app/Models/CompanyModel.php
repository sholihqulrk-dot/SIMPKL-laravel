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
        'business_field',
        'address',
        'phone',
        'email',
        'website',
        'npwp',
        'established_year',
        'description',
        'status',
        'total_employees',
        'active_students',
        'rating',
        'supervisor_name',
        'supervisor_position',
        'supervisor_phone',
        'supervisor_email',
        'hr_name',
        'hr_position',
        'hr_phone',
        'hr_email',
        'work_schedule',
        'pkl_duration',
        'facilities',
        'training_program',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pklPlacements()
    {
        return $this->hasMany(PklPlacementModel::class, 'company_id');
    }
}
