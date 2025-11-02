<?php

namespace Database\Seeders;

use App\Models\AssignmentModel;
use App\Models\PklPlacementModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $pklPlacement = PklPlacementModel::first();
        $teacher = TeacherModel::first();
        $company = CompanyModel::first();

        // Assignment from Teacher
        AssignmentModel::create([
            'pkl_placement_id' => $pklPlacement->id,
            'title' => 'Weekly Progress Report',
            'description' => 'Create a detailed report about your learning progress and challenges faced during this week.',
            'deadline' => now()->addDays(7),
            'grade' => null,
            'created_by_type' => 'teacher',
            'created_by_id' => $teacher->id,
        ]);

        // Assignment from Supervisor
        AssignmentModel::create([
            'pkl_placement_id' => $pklPlacement->id,
            'title' => 'Company Project Task - User Authentication',
            'description' => 'Implement user authentication system for the company web application using Laravel.',
            'deadline' => now()->addDays(14),
            'grade' => null,
            'created_by_type' => 'supervisor',
            'created_by_id' => $company->id,
        ]);

        // Completed Assignment
        AssignmentModel::create([
            'pkl_placement_id' => $pklPlacement->id,
            'title' => 'Initial Project Setup',
            'description' => 'Set up development environment and understand the existing codebase.',
            'deadline' => now()->subDays(3),
            'grade' => 85,
            'created_by_type' => 'supervisor',
            'created_by_id' => $company->id,
        ]);

        $this->command->info('Assignment data seeded successfully!');
    }
}