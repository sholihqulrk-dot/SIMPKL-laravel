<?php

namespace App\Imports;

use App\Models\PklPlacementModel;
use App\Models\StudentModel;
use App\Models\CompanyModel;
use App\Models\TeacherModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class PklPlacementsImport implements ToCollection, WithHeadingRow, WithValidation
{
    public $errors = [];
    public $successCount = 0;
    
    protected $studentMapping = [];
    protected $teacherMapping = [];
    protected $companyMapping = [];

    public function __construct()
    {
        $this->loadMappingData();
    }

    protected function loadMappingData()
    {
        // Load students
        $this->studentMapping = StudentModel::with('user')
            ->get()
            ->mapWithKeys(function ($student) {
                $label = $student->user->name . ' (' . $student->user->email . ')';
                return [$label => $student->id];
            })->toArray();

        // Load teachers
        $this->teacherMapping = TeacherModel::with('user')
            ->get()
            ->mapWithKeys(function ($teacher) {
                $label = $teacher->user->name . ' (' . $teacher->user->email . ')';
                return [$label => $teacher->id];
            })->toArray();

        // Load companies
        $this->companyMapping = CompanyModel::with('user')
            ->get()
            ->mapWithKeys(function ($company) {
                $label = $company->user->name . ' - ' . ($company->sector ?? 'General');
                return [$label => $company->id];
            })->toArray();
    }

    public function collection(Collection $rows)
    {
        $rowNumber = 1;

        foreach ($rows as $index => $row) {
            $rowNumber++;
            
            // 🔹 PERBAIKAN: Skip baris yang benar-benar kosong
            if ($this->isCompletelyEmptyRow($row)) {
                continue;
            }

            // 🔹 Konversi formula ke nilai aktual
            $processedRow = $this->processFormulas($row);
            
            // 🔹 Validasi independen per baris
            $validationResult = $this->validateRow($processedRow, $rowNumber);
            
            if (!$validationResult['valid']) {
                $this->errors[] = [
                    'row' => $processedRow,
                    'row_number' => $rowNumber,
                    'errors' => $validationResult['errors']
                ];
                continue;
            }

            // 🔹 Proses data yang valid
            try {
                $this->processValidRow($processedRow, $validationResult['dates'], $rowNumber);
                $this->successCount++;
                
            } catch (\Exception $e) {
                $this->errors[] = [
                    'row' => $processedRow,
                    'row_number' => $rowNumber,
                    'errors' => ['Terjadi kesalahan sistem: ' . $e->getMessage()]
                ];
            }
        }
    }

    /**
     * 🔹 PERBAIKAN: Cek jika baris benar-benar kosong (semua kolom kosong atau hanya berisi formula)
     */
    protected function isCompletelyEmptyRow($row)
    {
        $data = $row->toArray();
        
        // Daftar kolom yang akan dicek
        $columnsToCheck = [
            'student_id', 'student_name', 
            'company_id', 'company_name',
            'teacher_id', 'teacher_name',
            'tanggal_mulai', 'tanggal_selesai', 
            'status', 'deskripsi'
        ];

        foreach ($columnsToCheck as $column) {
            $value = $data[$column] ?? null;
            
            // Jika ada nilai yang tidak kosong dan bukan formula yang menghasilkan string kosong
            if (!empty($value) && $value !== '""' && $value !== "''") {
                // Cek jika nilai adalah formula yang tidak menghasilkan apa-apa
                if ($this->isFormula($value)) {
                    // Jika formula, tetap anggap baris tidak kosong (biarkan validasi menangani error)
                    return false;
                }
                return false;
            }
            
            // Handle kasus khusus: nilai 0 atau string kosong
            if ($value === 0 || $value === '0') {
                return false;
            }
        }

        return true;
    }

    /**
     * 🔹 Proses formula Excel dan konversi ke nilai aktual
     */
    protected function processFormulas($row)
    {
        $processed = $row->toArray();

        // Debug: log nilai sebelum diproses
        \Log::info('Before processing formulas:', $processed);

        // Handle student_id
        if ($this->isFormula($processed['student_id']) && !empty($processed['student_name'])) {
            $processed['student_id'] = $this->studentMapping[$processed['student_name']] ?? null;
        } elseif (empty($processed['student_id']) && !empty($processed['student_name'])) {
            // Jika student_id kosong tapi student_name ada, coba mapping
            $processed['student_id'] = $this->studentMapping[$processed['student_name']] ?? null;
        }

        // Handle company_id
        if ($this->isFormula($processed['company_id']) && !empty($processed['company_name'])) {
            $processed['company_id'] = $this->companyMapping[$processed['company_name']] ?? null;
        } elseif (empty($processed['company_id']) && !empty($processed['company_name'])) {
            $processed['company_id'] = $this->companyMapping[$processed['company_name']] ?? null;
        }

        // Handle teacher_id
        if ($this->isFormula($processed['teacher_id']) && !empty($processed['teacher_name'])) {
            $processed['teacher_id'] = $this->teacherMapping[$processed['teacher_name']] ?? null;
        } elseif (empty($processed['teacher_id']) && !empty($processed['teacher_name'])) {
            $processed['teacher_id'] = $this->teacherMapping[$processed['teacher_name']] ?? null;
        }

        // Handle tanggal - konversi Excel serial number ke tanggal
        if (is_numeric($processed['tanggal_mulai'])) {
            $processed['tanggal_mulai'] = $this->convertExcelDate($processed['tanggal_mulai']);
        }
        if (is_numeric($processed['tanggal_selesai'])) {
            $processed['tanggal_selesai'] = $this->convertExcelDate($processed['tanggal_selesai']);
        }

        // Debug: log nilai setelah diproses
        \Log::info('After processing formulas:', $processed);

        return $processed;
    }

    /**
     * 🔹 Konversi Excel serial number ke format tanggal
     */
    protected function convertExcelDate($excelDate)
    {
        if (is_numeric($excelDate)) {
            try {
                // Excel date (Windows) - 1 Jan 1900 sebagai basis
                $timestamp = ($excelDate - 25569) * 86400; // 25569 = days from 1900-01-01 to 1970-01-01
                return Carbon::createFromTimestamp($timestamp)->format('d/m/Y');
            } catch (\Exception $e) {
                return $excelDate; // Return as is jika gagal
            }
        }
        return $excelDate;
    }

    /**
     * 🔹 Cek jika nilai berisi formula Excel
     */
    protected function isFormula($value)
    {
        if (!is_string($value)) {
            return false;
        }

        return str_starts_with($value, '=') || 
               str_starts_with($value, 'CONCATENATE') || 
               str_contains($value, 'IF(') ||
               str_contains($value, 'IF (');
    }

    /**
     * 🔹 Validasi independen per baris
     */
    protected function validateRow($data, $rowNumber)
    {
        // Debug: log data yang divalidasi
        \Log::info("Validating row {$rowNumber}:", $data);

        // Validasi dasar menggunakan Laravel Validator
        $validator = Validator::make($data, [
            'student_id' => 'required|exists:table_student,id',
            'company_id' => 'required|exists:table_companies,id',
            'teacher_id' => 'nullable|exists:table_teachers,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:pending,active,completed',
        ], $this->customValidationMessages());

        if ($validator->fails()) {
            \Log::warning("Validation failed for row {$rowNumber}:", $validator->errors()->toArray());
            return [
                'valid' => false,
                'errors' => $validator->errors()->all()
            ];
        }

        // 🔹 Validasi tanggal
        $dateValidation = $this->validateDates($data, $rowNumber);
        if (!$dateValidation['valid']) {
            return $dateValidation;
        }

        // 🔹 Validasi duplikasi
        $duplicateValidation = $this->checkDuplicatePlacement($data, $dateValidation['dates']['startDate'], $dateValidation['dates']['endDate']);
        if (!$duplicateValidation['valid']) {
            return $duplicateValidation;
        }

        return [
            'valid' => true,
            'dates' => $dateValidation['dates']
        ];
    }

    /**
     * 🔹 Validasi format dan konsistensi tanggal
     */
    protected function validateDates($data, $rowNumber)
    {
        $startDate = $this->parseDate($data['tanggal_mulai']);
        $endDate = $this->parseDate($data['tanggal_selesai']);
        
        if (!$startDate) {
            return [
                'valid' => false,
                'errors' => ['Format tanggal mulai tidak valid. Gunakan format DD/MM/YYYY']
            ];
        }

        if (!$endDate) {
            return [
                'valid' => false,
                'errors' => ['Format tanggal selesai tidak valid. Gunakan format DD/MM/YYYY']
            ];
        }

        if ($endDate->lte($startDate)) {
            return [
                'valid' => false,
                'errors' => ['Tanggal selesai harus setelah tanggal mulai']
            ];
        }

        return [
            'valid' => true,
            'dates' => [
                'startDate' => $startDate,
                'endDate' => $endDate
            ]
        ];
    }

    /**
     * 🔹 Cek duplikasi penempatan
     */
    protected function checkDuplicatePlacement($data, $startDate, $endDate)
    {
        $existingPlacement = PklPlacementModel::where('student_id', $data['student_id'])
            ->where('company_id', $data['company_id'])
            ->where(function($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function($q) use ($startDate, $endDate) {
                          $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                      });
            })
            ->first();

        if ($existingPlacement) {
            return [
                'valid' => false,
                'errors' => ['Penempatan PKL sudah ada untuk siswa dan perusahaan ini dalam periode yang sama']
            ];
        }

        return ['valid' => true];
    }

    /**
     * 🔹 Proses baris yang valid ke database
     */
    protected function processValidRow($data, $dates, $rowNumber)
    {
        $startDate = $dates['startDate'];
        $endDate = $dates['endDate'];
        $totalWeeks = $startDate->diffInWeeks($endDate);

        PklPlacementModel::create([
            'student_id' => $data['student_id'],
            'company_id' => $data['company_id'],
            'teacher_id' => $data['teacher_id'] ?? null,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_weeks' => $totalWeeks,
            'status' => $data['status'],
            'description' => $data['deskripsi'] ?? null,
        ]);

        \Log::info("Successfully imported row {$rowNumber}");
    }

    /**
     * 🔹 Parse tanggal dari berbagai format
     */
    protected function parseDate($dateValue)
    {
        if (empty($dateValue)) {
            return null;
        }

        try {
            // Jika sudah dalam format Carbon object
            if ($dateValue instanceof Carbon) {
                return $dateValue;
            }

            // Handle berbagai format tanggal
            if (is_numeric($dateValue)) {
                // Handle Excel timestamp
                return Carbon::createFromTimestamp((($dateValue - 25569) * 86400));
            } elseif (is_string($dateValue)) {
                if (str_contains($dateValue, '/')) {
                    // Format DD/MM/YYYY
                    return Carbon::createFromFormat('d/m/Y', $dateValue);
                } elseif (str_contains($dateValue, '-')) {
                    // Coba format YYYY-MM-DD atau DD-MM-YYYY
                    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateValue)) {
                        return Carbon::createFromFormat('Y-m-d', $dateValue);
                    } else {
                        return Carbon::createFromFormat('d-m-Y', $dateValue);
                    }
                } else {
                    // Coba parse secara otomatis
                    return Carbon::parse($dateValue);
                }
            }
        } catch (\Exception $e) {
            \Log::error("Date parsing error for value: {$dateValue}", ['error' => $e->getMessage()]);
            return null;
        }

        return null;
    }

    /**
     * 🔹 Rules untuk WithValidation concern
     */
    public function rules(): array
    {
        return [
            'student_id' => 'sometimes|required',
            'company_id' => 'sometimes|required',
            'teacher_id' => 'nullable',
            'tanggal_mulai' => 'sometimes|required',
            'tanggal_selesai' => 'sometimes|required',
            'status' => 'sometimes|required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'student_id.required' => 'Student ID wajib diisi',
            'student_id.exists' => 'Student ID tidak valid atau tidak ditemukan',
            'company_id.required' => 'Company ID wajib diisi',
            'company_id.exists' => 'Company ID tidak valid atau tidak ditemukan',
            'teacher_id.exists' => 'Teacher ID tidak valid atau tidak ditemukan',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid',
            'tanggal_selesai.after' => 'Tanggal selesai harus setelah tanggal mulai',
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status harus: pending, active, atau completed',
        ];
    }

    public function getImportResults()
    {
        return [
            'success_count' => $this->successCount,
            'error_count' => count($this->errors),
            'errors' => $this->errors,
            'total_processed' => $this->successCount + count($this->errors)
        ];
    }
}