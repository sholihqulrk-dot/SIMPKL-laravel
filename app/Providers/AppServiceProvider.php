<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Custom directive untuk check role
        Blade::if('role', function ($roles) {
            $userRole = auth()->user()->role_id ?? 'student';
            $allowedRoles = is_array($roles) ? $roles : explode(',', $roles);
            
            return in_array($userRole, $allowedRoles);
        });

        // Custom directive untuk check multiple roles
        Blade::if('hasanyrole', function ($roles) {
            $userRole = auth()->user()->role_id ?? 'student';
            $allowedRoles = is_array($roles) ? $roles : explode(',', $roles);
            
            return in_array($userRole, $allowedRoles);
        });
    }
}