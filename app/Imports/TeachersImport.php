<?php

namespace App\Imports;

use App\Models\TeacherModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;

class TeachersImport implements ToCollection, WithHeadingRow, WithValidation
{
    public $errors = [];
    public $successCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Skip row jika data kosong
            if (empty($row['nip']) || empty($row['nama_lengkap']) || empty($row['email'])) {
                continue;
            }

            // Validasi data
            $validator = Validator::make($row->toArray(), [
                'nip' => 'required|unique:table_teachers,nip',
                'nama_lengkap' => 'required',
                'email' => 'required|email|unique:users,email',
                'telepon' => 'required',
                'alamat' => 'required',
            ]);

            if ($validator->fails()) {
                $this->errors[] = [
                    'row' => $row->toArray(),
                    'errors' => $validator->errors()->all()
                ];
                continue;
            }

            try {
                DB::transaction(function () use ($row) {
                    // Create user account
                    $user = User::create([
                        'name' => $row['nama_lengkap'],
                        'email' => $row['email'],
                        'password' => Hash::make('password123'),
                        'role_id' => 'teacher',
                    ]);

                    // Create teacher record
                    TeacherModel::create([
                        'user_id' => $user->id,
                        'name' => $row['nama_lengkap'],
                        'nip' => $row['nip'],
                        'phone' => $row['telepon'],
                        'address' => $row['alamat'],
                        'email' => $row['email'],
                    ]);

                    $this->successCount++;
                });
            } catch (\Exception $e) {
                $this->errors[] = [
                    'row' => $row->toArray(),
                    'errors' => [$e->getMessage()]
                ];
            }
        }
    }

    public function rules(): array
    {
        return [
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nip.required' => 'NIP wajib diisi',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'telepon.required' => 'Telepon wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ];
    }
}