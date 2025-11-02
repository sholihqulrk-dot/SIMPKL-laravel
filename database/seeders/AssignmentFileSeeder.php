<?php

namespace Database\Seeders;

use App\Models\AssignmentFileModel;
use App\Models\AssignmentUpdateModel;
use Illuminate\Database\Seeder;

class AssignmentFileSeeder extends Seeder
{
    public function run(): void
    {
        $assignmentUpdate = AssignmentUpdateModel::first();

        AssignmentFileModel::create([
            'update_id' => $assignmentUpdate->id,
            'file_name' => 'progress_report_week1.pdf',
            'file_path' => 'assignments/progress_report_week1.pdf',
            'file_type' => 'application/pdf',
            'file_size' => 2048576,
            'reviewed' => true,
            'comment' => 'Well structured report. Good documentation of the process.',
        ]);

        AssignmentFileModel::create([
            'update_id' => $assignmentUpdate->id,
            'file_name' => 'code_samples.zip',
            'file_path' => 'assignments/code_samples.zip',
            'file_type' => 'application/zip',
            'file_size' => 5120000,
            'reviewed' => false,
            'comment' => null,
        ]);

        $this->command->info('Assignment File data seeded successfully!');
    }
}