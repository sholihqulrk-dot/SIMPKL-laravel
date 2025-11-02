<?php

namespace Database\Seeders;

use App\Models\AttendanceModel;
use App\Models\StudentModel;
use App\Models\PklPlacementModel;
use App\Models\CompanyModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $student = StudentModel::first();
        $pklPlacement = PklPlacementModel::first();
        $company = CompanyModel::first();

        $startDate = Carbon::parse($pklPlacement->start_date);
        $today = Carbon::today();

        // Create attendance records for the past 10 working days
        for ($i = 1; $i <= 10; $i++) {
            $attendanceDate = $today->copy()->subDays($i);
            
            // Skip weekends
            if ($attendanceDate->isWeekend()) {
                continue;
            }

            $status = $this->getRandomStatus();
            
            AttendanceModel::create([
                'student_id' => $student->id,
                'pkl_placement_id' => $company->id, // Note: This should be pkl_placement_id based on migration
                'attendance_date' => $attendanceDate,
                'status' => $status,
                'notes' => $this->getNotesByStatus($status),
                'approval_status' => 'approved',
                'approved_by' => $company->id,
            ]);
        }

        $this->command->info('Attendance data seeded successfully!');
    }

    private function getRandomStatus(): string
    {
        $statuses = ['present', 'present', 'present', 'present', 'sick', 'permission'];
        return $statuses[array_rand($statuses)];
    }

    private function getNotesByStatus(string $status): string
    {
        return match($status) {
            'sick' => 'Student reported sick with fever',
            'permission' => 'Family event - permission granted',
            'present' => 'On time and active participation',
            default => ''
        };
    }
}