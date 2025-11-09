<?php

namespace App\Imports;

use App\Models\StudentModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation
{
    public $errors = [];
    public $successCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Skip row jika data kosong
            if (empty($row['nis']) || empty($row['nama_lengkap']) || empty($row['email'])) {
                continue;
            }

            // Validasi data
            $validator = Validator::make($row->toArray(), [
                'nis' => 'required|unique:table_student,nis',
                'nama_lengkap' => 'required',
                'email' => 'required|email|unique:users,email',
                'kelas' => 'required',
                'jurusan' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
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
                        'role_id' => 'student',
                    ]);

                    // Create student record
                    StudentModel::create([
                        'user_id' => $user->id,
                        'nis' => $row['nis'],
                        'class' => $row['kelas'],
                        'major' => $row['jurusan'],
                        'address' => $row['alamat'],
                        'phone' => $row['telepon'],
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
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nis.required' => 'NIS wajib diisi',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
        ];
    }
}