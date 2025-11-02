<?php

namespace Database\Seeders;

use App\Models\AssignmentUpdateModel;
use App\Models\AssignmentModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;

class AssignmentUpdateSeeder extends Seeder
{
    public function run(): void
    {
        $assignment = AssignmentModel::first();
        $student = StudentModel::first();
        $teacher = TeacherModel::first();

        $updates = [
            [
                'content' => 'I have completed the initial analysis and started working on the progress report. The main challenges I faced were understanding the existing codebase and setting up the development environment.',
                'status' => 'reviewed',
                'reviewed_by' => $teacher->id,
                'feedback' => 'Good start! Make sure to include specific examples of challenges and how you overcame them.',
                'has_file' => true,
            ],
            [
                'content' => 'Updated the report with more detailed information about the technical challenges and solutions implemented.',
                'status' => 'submitted',
                'reviewed_by' => null,
                'feedback' => null,
                'has_file' => false,
            ],
        ];

        foreach ($updates as $update) {
            AssignmentUpdateModel::create(array_merge($update, [
                'assignment_id' => $assignment->id,
                'student_id' => $student->id,
            ]));
        }

        $this->command->info('Assignment Update data seeded successfully!');
    }
}