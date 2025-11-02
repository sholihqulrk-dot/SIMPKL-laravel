<?php

namespace Database\Seeders;

use App\Models\GradeModel;
use App\Models\PklPlacementModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $pklPlacement = PklPlacementModel::first();
        $student = StudentModel::first();
        $teacher = TeacherModel::first();

        GradeModel::create([
            'pkl_placement_id' => $pklPlacement->id,
            'student_id' => $student->id,
            'teacher_id' => $teacher->id,
            'score' => 85,
            'feedback' => 'Excellent progress in web development. Shows good understanding of Laravel framework and actively participates in team projects. Need to improve documentation skills.',
        ]);

        $this->command->info('Grade data seeded successfully!');
    }
}