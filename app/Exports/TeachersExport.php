<?php

namespace App\Exports;

use App\Models\TeacherModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class TeachersExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $teachers;

    public function __construct($teachers = null)
    {
        $this->teachers = $teachers ?? TeacherModel::with('user')->get();
    }

    public function collection()
    {
        return $this->teachers;
    }

    public function headings(): array
    {
        return [
            'NIP',
            'NAMA LENGKAP',
            'EMAIL',
            'TELEPON',
            'ALAMAT',
            'TANGGAL DIBUAT',
            'TANGGAL DIPERBARUI'
        ];
    }

    public function map($teacher): array
    {
        // Jika data berbentuk array (misalnya dari template)
        if (is_array($teacher)) {
            return [
                $teacher['nip'] ?? '',
                $teacher['nama_lengkap'] ?? '',
                $teacher['email'] ?? '',
                $teacher['telepon'] ?? '',
                $teacher['alamat'] ?? '',
                '', // created_at kosong untuk template
                '', // updated_at kosong untuk template
            ];
        }

        // Jika data berbentuk object (hasil query Eloquent)
        return [
            $teacher->nip,
            $teacher->user->name ?? $teacher->name ?? '',
            $teacher->email ?? '',
            $teacher->phone ?? '',
            $teacher->address ?? '',
            optional($teacher->created_at)->format('d/m/Y H:i'),
            optional($teacher->updated_at)->format('d/m/Y H:i'),
        ];
    }


    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:G1')->applyFromArray([
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
        ]);

        // Auto size columns
        foreach(range('A','G') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Style untuk data
        $sheet->getStyle('A2:G' . ($sheet->getHighestRow()))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        return [];
    }

    public function title(): string
    {
        return 'Data Guru';
    }
}