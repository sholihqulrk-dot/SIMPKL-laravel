<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Step 1: Create users and their profiles
            ProfileSeeder::class,
            
            // Step 2: Create PKL placement (requires Student, Company, Teacher)
            PklPlacementSeeder::class,
            
            // Step 3: Create assignments (requires PKL Placement)
            AssignmentSeeder::class,
            
            // Step 4: Create attendance records (requires Student, PKL Placement)
            AttendanceSeeder::class,
            
            // Step 5: Create journals (requires Student, PKL Placement)
            JournalSeeder::class,
            
            // Step 6: Create documents (requires Student, PKL Placement)
            DocumentSeeder::class,
            
            // Step 7: Create grades (requires PKL Placement, Student, Teacher)
            GradeSeeder::class,
            
            // Step 8: Create assignment updates (requires Assignment, Student)
            AssignmentUpdateSeeder::class,
            
            // Step 9: Create assignment files (requires Assignment Update)
            AssignmentFileSeeder::class,
        ]);

        $this->command->info('All database seeders completed successfully!');
        $this->command->info('Sample data is now ready for testing.');
    }
}