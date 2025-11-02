<?php

namespace Database\Seeders;

use App\Models\JournalModel;
use App\Models\StudentModel;
use App\Models\PklPlacementModel;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JournalSeeder extends Seeder
{
    public function run(): void
    {
        $student = StudentModel::first();
        $pklPlacement = PklPlacementModel::first();
        $teacher = TeacherModel::first();

        $journals = [
            [
                'title' => 'First Week - Orientation and Environment Setup',
                'content' => 'This week was focused on understanding the company culture and setting up my development environment. I learned about the existing projects and met the development team.',
                'week_number' => 1,
                'journal_date' => Carbon::parse($pklPlacement->start_date)->addDays(4),
                'status' => 'approved',
                'reviewed_by' => $teacher->id,
                'reviewed_at' => now(),
                'score' => 85,
            ],
            [
                'title' => 'Second Week - Learning Laravel Framework',
                'content' => 'Started learning Laravel framework in depth. Worked on basic CRUD operations and understanding the MVC pattern. Created my first Laravel application with user authentication.',
                'week_number' => 2,
                'journal_date' => Carbon::parse($pklPlacement->start_date)->addDays(11),
                'status' => 'submitted',
                'reviewed_by' => null,
                'reviewed_at' => null,
                'score' => null,
            ],
            [
                'title' => 'Project Planning and Requirements Gathering',
                'content' => 'Participated in project meetings and learned about requirement analysis. Assisted in creating user stories and technical documentation for the new feature.',
                'week_number' => 3,
                'journal_date' => now()->subDays(2),
                'status' => 'draft',
                'reviewed_by' => null,
                'reviewed_at' => null,
                'score' => null,
            ],
        ];

        foreach ($journals as $journal) {
            JournalModel::create(array_merge($journal, [
                'student_id' => $student->id,
                'pkl_placement_id' => $pklPlacement->id,
            ]));
        }

        $this->command->info('Journal data seeded successfully!');
    }
}