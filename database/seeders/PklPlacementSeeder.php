<?php

namespace Database\Seeders;

use App\Models\PklPlacementModel;
use App\Models\StudentModel;
use App\Models\CompanyModel;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;

class PklPlacementSeeder extends Seeder
{
    public function run(): void
    {
        $student = StudentModel::first();
        $company = CompanyModel::first();
        $teacher = TeacherModel::first();

        PklPlacementModel::create([
            'student_id' => $student->id,
            'company_id' => $company->id,
            'teacher_id' => $teacher->id,
            'start_date' => now()->subWeeks(2),
            'end_date' => now()->addWeeks(10),
            'total_weeks' => 12,
            'status' => 'active',
            'description' => 'PKL Program for Computer Science Student - Web Development Internship',
        ]);

        $this->command->info('PKL Placement data seeded successfully!');
    }
}