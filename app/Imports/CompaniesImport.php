<?php

namespace App\Imports;

use App\Models\CompanyModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;

class CompaniesImport implements ToCollection, WithHeadingRow, WithValidation
{
    public $errors = [];
    public $successCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Skip jika data utama kosong
            if (empty($row['name']) || empty($row['email']) || empty($row['business_field'])) {
                continue;
            }

            // Validasi data
            $validator = Validator::make($row->toArray(), [
                'name' => 'required',
                'business_field' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'address' => 'required',
                'supervisor_name' => 'required',
                'supervisor_position' => 'required',
                'supervisor_phone' => 'required',
                'supervisor_email' => 'required|email',
                'hr_name' => 'required',
                'hr_position' => 'required',
                'hr_phone' => 'required',
                'hr_email' => 'required|email',
            ]);

            if ($validator->fails()) {
                $this->errors[] = [
                    'row' => $row->toArray(),
                    'errors' => $validator->errors()->all(),
                ];
                continue;
            }

            try {
                DB::transaction(function () use ($row) {
                    // Buat akun user untuk perusahaan
                    $user = User::create([
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'password' => Hash::make('password123'),
                        'role_id' => 'companies',
                    ]);

                    // Buat data perusahaan dengan urutan kolom sesuai export
                    CompanyModel::create([
                        'user_id' => $user->id,
                        'name' => $row['name'],
                        'business_field' => $row['business_field'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'address' => $row['address'],
                        'website' => $row['website'] ?? null,
                        'npwp' => $row['npwp'] ?? null,
                        'established_year' => $row['established_year'] ?? null,
                        'total_employees' => $row['total_employees'] ?? 0,
                        'description' => $row['description'] ?? null,
                        'status' => $row['status'] ?? 'active',
                        'supervisor_name' => $row['supervisor_name'],
                        'supervisor_position' => $row['supervisor_position'] ?? 'Supervisor',
                        'supervisor_phone' => $row['supervisor_phone'],
                        'supervisor_email' => $row['supervisor_email'],
                        'hr_name' => $row['hr_name'],
                        'hr_position' => $row['hr_position'] ?? 'HR',
                        'hr_phone' => $row['hr_phone'],
                        'hr_email' => $row['hr_email'],
                        'work_schedule' => $row['work_schedule'] ?? 'Senin - Jumat, 08:00 - 17:00',
                        'pkl_duration' => $row['pkl_duration'] ?? '3 Bulan',
                        'facilities' => $row['facilities'] ?? 'Komputer, Internet, Ruang Kerja',
                        'training_program' => $row['training_program'] ?? 'On-the-job Training',
                    ]);

                    $this->successCount++;
                });
            } catch (\Exception $e) {
                dd($row);

                $this->errors[] = [
                    'row' => $row->toArray(),
                    'errors' => [$e->getMessage()],
                ];
            }
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'business_field' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'supervisor_name' => 'required',
            'supervisor_position' => 'required',
            'supervisor_phone' => 'required',
            'supervisor_email' => 'required|email',
            'hr_name' => 'required',
            'hr_position' => 'required',
            'hr_phone' => 'required',
            'hr_email' => 'required|email',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'Nama perusahaan wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'business_field.required' => 'Bidang usaha wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'supervisor_name.required' => 'Nama supervisor wajib diisi',
            'supervisor_position.required' => 'Jabatan supervisor wajib diisi',
            'supervisor_phone.required' => 'Telepon supervisor wajib diisi',
            'supervisor_email.required' => 'Email supervisor wajib diisi',
            'supervisor_email.email' => 'Format email supervisor tidak valid',
            'hr_name.required' => 'Nama HR wajib diisi',
            'hr_position.required' => 'Jabatan HR wajib diisi',
            'hr_phone.required' => 'Telepon HR wajib diisi',
            'hr_email.required' => 'Email HR wajib diisi',
            'hr_email.email' => 'Format email HR tidak valid',
        ];
    }
}
