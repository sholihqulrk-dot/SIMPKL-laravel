<?php

namespace Database\Seeders;

use App\Models\DocumentModel;
use App\Models\StudentModel;
use App\Models\PklPlacementModel;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $student = StudentModel::first();
        $pklPlacement = PklPlacementModel::first();
        $teacher = TeacherModel::first();

        $documents = [
            [
                'title' => 'PKL Assignment Letter',
                'filename' => 'assignment_letter.pdf',
                'file_path' => 'documents/assignment_letter.pdf',
                'category' => 'assignment_letter',
                'status' => 'approved',
                'reviewed_by' => $teacher->id,
                'reviewed_at' => now()->subDays(5),
            ],
            [
                'title' => 'First Week Report',
                'filename' => 'week1_report.pdf',
                'file_path' => 'documents/week1_report.pdf',
                'category' => 'report',
                'status' => 'approved',
                'reviewed_by' => $teacher->id,
                'reviewed_at' => now()->subDays(2),
            ],
            [
                'title' => 'Company ID Card',
                'filename' => 'id_card.jpg',
                'file_path' => 'documents/id_card.jpg',
                'category' => 'supporting',
                'status' => 'approved',
                'reviewed_by' => $teacher->id,
                'reviewed_at' => now()->subDays(7),
            ],
            [
                'title' => 'Monthly Attendance Summary',
                'filename' => 'attendance_november.pdf',
                'file_path' => 'documents/attendance_november.pdf',
                'category' => 'attendance',
                'status' => 'pending',
                'reviewed_by' => null,
                'reviewed_at' => null,
            ],
        ];

        foreach ($documents as $document) {
            DocumentModel::create(array_merge($document, [
                'student_id' => $student->id,
                'pkl_placement_id' => $pklPlacement->id,
            ]));
        }

        $this->command->info('Document data seeded successfully!');
    }
}