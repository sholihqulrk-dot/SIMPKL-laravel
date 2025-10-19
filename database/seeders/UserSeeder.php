<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('siswa1234'),
                'role_id' => 'student',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('guru1234'),
                'role_id' => 'teacher',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'company',
                'email' => 'company@gmail.com',
                'password' => Hash::make('company1234'),
                'role_id' => 'companies',
                'email_verified_at' => now(),
            ],
        ];

        // 🔁 Loop untuk setiap user
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
