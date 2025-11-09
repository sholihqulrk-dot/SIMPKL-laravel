<?php

namespace App\Exports;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class PklPlacementsTemplateExport implements 
    FromArray, 
    WithHeadings, 
    WithTitle, 
    WithStrictNullComparison,
    WithColumnFormatting,
    WithStyles,
    WithColumnWidths,
    WithEvents
{
    protected $students;
    protected $teachers;
    protected $companies;

    public function __construct()
    {
        $this->loadData();
    }

    /**
     * Load data untuk dropdown
     */
    protected function loadData()
    {
        // Load students dengan relasi user
        $this->students = StudentModel::with('user')
            ->get()
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'label' => $student->user->name . ' (' . $student->user->email . ')'
                ];
            });

        // Load teachers dengan relasi user
        $this->teachers = TeacherModel::with('user')
            ->get()
            ->map(function ($teacher) {
                return [
                    'id' => $teacher->id,
                    'label' => $teacher->user->name . ' (' . $teacher->user->email . ')'
                ];
            });

        // Load companies dengan relasi user
        $this->companies = CompanyModel::with('user')
            ->get()
            ->map(function ($company) {
                return [
                    'id' => $company->id,
                    'label' => $company->user->name . ' - ' . ($company->sector ?? 'General')
                ];
            });
    }

    /**
     * Data template (kosong)
     */
    public function array(): array
    {
        return [
            // Baris kosong untuk diisi user
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
        ];
    }

    /**
     * Header kolom
     */
    public function headings(): array
    {
        return [
            'STUDENT_ID',
            'STUDENT_NAME',
            'COMPANY_ID', 
            'COMPANY_NAME',
            'TEACHER_ID',
            'TEACHER_NAME',
            'TANGGAL_MULAI',
            'TANGGAL_SELESAI',
            'STATUS',
            'DESKRIPSI'
        ];
    }

    /**
     * Judul sheet
     */
    public function title(): string
    {
        return 'Template Penempatan PKL';
    }

    /**
     * Format kolom
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER, // STUDENT_ID
            'C' => NumberFormat::FORMAT_NUMBER, // COMPANY_ID
            'E' => NumberFormat::FORMAT_NUMBER, // TEACHER_ID
            'G' => 'dd/mm/yyyy', // TANGGAL_MULAI
            'H' => 'dd/mm/yyyy', // TANGGAL_SELESAI
        ];
    }

    /**
     * Style untuk Excel
     */
    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2E86C1'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Style untuk data rows
        $sheet->getStyle('A2:J10')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD'],
                ],
            ],
        ]);

        // Auto filter
        $sheet->setAutoFilter('A1:J1');

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
     * Lebar kolom
     */
    public function columnWidths(): array
    {
        return [
            'A' => 15, // STUDENT_ID
            'B' => 25, // STUDENT_NAME
            'C' => 15, // COMPANY_ID
            'D' => 25, // COMPANY_NAME
            'E' => 15, // TEACHER_ID
            'F' => 25, // TEACHER_NAME
            'G' => 15, // TANGGAL_MULAI
            'H' => 15, // TANGGAL_SELESAI
            'I' => 12, // STATUS
            'J' => 30, // DESKRIPSI
        ];
    }

    /**
     * Events untuk menambahkan data validation
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $this->addDataValidation($event);
                $this->addHelperSheet($event);
            },
        ];
    }

    /**
     * Tambahkan data validation dropdown
     */
   protected function addDataValidation(AfterSheet $event)
    {
        $sheet = $event->sheet->getDelegate();

        // Data dropdown
        $studentOptions = $this->students->pluck('label')->implode(',');
        $teacherOptions = $this->teachers->pluck('label')->implode(',');
        $companyOptions = $this->companies->pluck('label')->implode(',');
        $statusOptions = 'pending,active,completed';

        // 🔹 Tentukan range baris yang akan diberi validasi
        // Mulai dari baris 2 (setelah header) sampai baris yang cukup untuk template
        $startRow = 2;
        $endRow = 2; // Set batas yang cukup untuk template, tapi impor bisa lebih

        // 🔹 Loop semua baris dalam range template
        for ($row = $startRow; $row <= $endRow; $row++) {
            // Kolom A: Student ID (hidden)
            $this->addHiddenValidation($sheet, 'A' . $row);
            
            // Kolom B: Student Name dropdown
            $this->addDropdownValidation($sheet, 'B' . $row, $studentOptions);
            
            // Kolom C: Company ID (hidden)
            $this->addHiddenValidation($sheet, 'C' . $row);
            
            // Kolom D: Company Name dropdown
            $this->addDropdownValidation($sheet, 'D' . $row, $companyOptions);
            
            // Kolom E: Teacher ID (hidden)
            $this->addHiddenValidation($sheet, 'E' . $row);
            
            // Kolom F: Teacher Name dropdown
            $this->addDropdownValidation($sheet, 'F' . $row, $teacherOptions);
            
            // Kolom I: Status dropdown
            $this->addDropdownValidation($sheet, 'I' . $row, $statusOptions);
        }

        // 🔹 Tambahkan formula mapping ID
        $this->addMappingFormulas($sheet, $endRow);
    }


    /**
     * Tambahkan dropdown validation
     */
    protected function addDropdownValidation($sheet, $cell, $options)
    {
        $validation = $sheet->getCell($cell)->getDataValidation();
        $validation->setType(DataValidation::TYPE_LIST);
        $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
        $validation->setAllowBlank(true);
        $validation->setShowInputMessage(true);
        $validation->setShowErrorMessage(true);
        $validation->setShowDropDown(true);
        $validation->setErrorTitle('Input error');
        $validation->setError('Value is not in list.');
        $validation->setPromptTitle('Pick from list');
        $validation->setPrompt('Please pick a value from the drop-down list.');
        $validation->setFormula1('"' . $options . '"');
    }

    /**
     * Tambahkan hidden validation
     */
    protected function addHiddenValidation($sheet, $cell)
    {
        $validation = $sheet->getCell($cell)->getDataValidation();
        $validation->setType(DataValidation::TYPE_CUSTOM);
        $validation->setAllowBlank(true);
        $validation->setShowInputMessage(false);
        $validation->setShowErrorMessage(false);
    }

    /**
     * Tambahkan formula untuk mapping ID
     */
    // Dalam PklPlacementsTemplateExport.php, ganti bagian formula dengan:
    protected function addMappingFormulas($sheet, $endRow)
    {
        // Tidak perlu formula kompleks, cukup beri instruksi
        $instruction = "⚠️ Isi dengan pilihan dropdown di kolom B, D, F - ID akan terisi otomatis";
        
        for ($row = 2; $row <= $endRow; $row++) {
            $sheet->setCellValue('A' . $row, $instruction);
            $sheet->setCellValue('C' . $row, $instruction);
            $sheet->setCellValue('E' . $row, $instruction);
        }
    }
    /**
     * Build formula untuk mapping ID
     */
    protected function buildMappingFormula($data, $choiceCell)
    {
        $formulaParts = [];
        
        foreach ($data as $index => $item) {
            $formulaParts[] = 'IF(' . $choiceCell . '="' . $item['label'] . '", ' . $item['id'] . ', "")';
        }
        
        return 'CONCATENATE(' . implode(', ', $formulaParts) . ')';
    }

    /**
     * Tambahkan helper sheet dengan data referensi
     */
    protected function addHelperSheet(AfterSheet $event)
    {
        $spreadsheet = $event->getSheet()->getParent();
        
        // Helper sheet untuk Students
        $studentSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Students Reference');
        $spreadsheet->addSheet($studentSheet);
        $this->populateReferenceSheet($studentSheet, 'Students Reference', $this->students);
        
        // Helper sheet untuk Teachers
        $teacherSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Teachers Reference');
        $spreadsheet->addSheet($teacherSheet);
        $this->populateReferenceSheet($teacherSheet, 'Teachers Reference', $this->teachers);
        
        // Helper sheet untuk Companies
        $companySheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Companies Reference');
        $spreadsheet->addSheet($companySheet);
        $this->populateReferenceSheet($companySheet, 'Companies Reference', $this->companies);
        
        // Kembali ke sheet utama
        $spreadsheet->setActiveSheetIndex(0);
    }

    /**
     * Populate reference sheet dengan data
     */
    protected function populateReferenceSheet($sheet, $title, $data)
    {
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Label');
        $sheet->getStyle('A1:B1')->getFont()->setBold(true);
        
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['label']);
            $row++;
        }
        
        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(50);
    }
}