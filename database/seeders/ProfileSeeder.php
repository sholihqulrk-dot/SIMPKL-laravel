<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample student
        $studentUser = User::create([
            'name' => 'Student Example',
            'email' => 'student@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 'student',
        ]);

        StudentModel::create([
            'user_id' => $studentUser->id,
            'nis' => '2024001',
            'class' => 'XII',
            'major' => 'Computer Science',
            'address' => 'Jl. Student No. 123',
            'phone' => '081234567890',
            'email' => 'student@gmail.com',
        ]);

        // Create sample teacher
        $teacherUser = User::create([
            'name' => 'Teacher Example',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 'teacher',
        ]);

        TeacherModel::create([
            'user_id' => $teacherUser->id,
            'name' => 'Teacher Example',
            'nip' => '198001012000121001',
            'phone' => '081234567891',
            'address' => 'Jl. Teacher No. 456',
            'email' => 'teacher@gmail.com',
        ]);

        // Create sample company
        $companyUser = User::create([
            'name' => 'Tech Company Ltd',
            'email' => 'company@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 'companies',
        ]);

        CompanyModel::create([
            'user_id' => $companyUser->id,
            'name' => 'Tech Company Ltd',
            'business_field' => 'Technology & Software Development',
            'address' => 'Jl. Company No. 789, Tech Park Building',
            'phone' => '0211234567',
            'email' => 'company@gmail.com',
            'website' => 'https://techcompany.gmail.com',
            'npwp' => '01.234.567.8-912.000',
            'established_year' => 2010,
            'description' => 'Leading technology company specializing in software development and digital solutions.',
            'total_employees' => 150,
            'supervisor_name' => 'Budi Santoso',
            'supervisor_position' => 'Head of Internship Program',
            'supervisor_phone' => '081234567892',
            'supervisor_email' => 'budi.santoso@techcompany.gmail.com',
        ]);

        $this->command->info('Profile data seeded successfully!');
        $this->command->info('Student Login: student@gmail.com / password');
        $this->command->info('Teacher Login: teacher@gmail.com / password');
        $this->command->info('Company Login: company@gmail.com / password');
    }
}