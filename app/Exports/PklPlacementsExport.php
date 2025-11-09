<?php

namespace App\Exports;

use App\Models\PklPlacementModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class PklPlacementsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $placements;

    public function __construct($placements = null)
    {
        $this->placements = $placements ?? PklPlacementModel::with(['student.user', 'company', 'teacher.user'])->get();
    }

    public function collection()
    {
        return $this->placements;
    }

    public function headings(): array
    {
        return [
            'STUDENT_ID',
            'NAMA_SISWA',
            'NIS_SISWA',
            'COMPANY_ID', 
            'NAMA_PERUSAHAAN',
            'TEACHER_ID',
            'NAMA_GURU',
            'TANGGAL_MULAI',
            'TANGGAL_SELESAI',
            'TOTAL_MINGGU',
            'STATUS',
            'DESKRIPSI',
            'TANGGAL_DIBUAT',
            'TANGGAL_DIPERBARUI'
        ];
    }

    public function map($placement): array
    {
        return [
            $placement->student_id,
            $placement->student->user->name ?? '',
            $placement->student->nis ?? '',
            $placement->company_id,
            $placement->company->name ?? '',
            $placement->teacher_id,
            $placement->teacher->user->name ?? '',
            $placement->start_date ?? '',
            $placement->end_date ?? '',
            $placement->total_weeks ?? '',
            $placement->status,
            $placement->description,
            $placement->created_at->format('d/m/Y H:i'),
            $placement->updated_at->format('d/m/Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:N1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '3490DC'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'wrapText' => true,
            ],
        ]);

        // Auto size columns
        foreach(range('A','N') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Set width untuk kolom dengan teks panjang
        $sheet->getColumnDimension('B')->setWidth(25); // NAMA_SISWA
        $sheet->getColumnDimension('E')->setWidth(30); // NAMA_PERUSAHAAN
        $sheet->getColumnDimension('L')->setWidth(40); // DESKRIPSI

        // Style untuk data
        $sheet->getStyle('A2:N' . ($sheet->getHighestRow()))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Wrap text untuk kolom deskripsi
        $sheet->getStyle('L2:L' . ($sheet->getHighestRow()))
            ->getAlignment()->setWrapText(true);

        return [];
    }

    public function title(): string
    {
        return 'Data Penempatan PKL';
    }
}