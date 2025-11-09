<?php

namespace App\Exports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $students;

    public function __construct($students = null)
    {
        $this->students = $students ?? StudentModel::with('user')->get();
    }

    public function collection()
    {
        return $this->students;
    }

    public function headings(): array
    {
        return [
            'NIS',
            'NAMA LENGKAP',
            'EMAIL',
            'KELAS',
            'JURUSAN',
            'ALAMAT',
            'TELEPON',
            'TANGGAL DIBUAT',
            'TANGGAL DIPERBARUI'
        ];
    }

    public function map($student): array
    {
        // Jika data berbentuk array (template)
        if (is_array($student)) {
            return [
                $student['nis'] ?? '',
                $student['nama_lengkap'] ?? '',
                $student['email'] ?? '',
                $student['kelas'] ?? '',
                $student['jurusan'] ?? '',
                $student['alamat'] ?? '',
                $student['telepon'] ?? '',
                '', // created_at kosong
                '', // updated_at kosong
            ];
        }

        // Jika data berbentuk object (dari database)
        return [
            $student->nis,
            $student->user->name ?? '',
            $student->email,
            $student->class,
            $student->major,
            $student->address,
            $student->phone,
            optional($student->created_at)->format('d/m/Y H:i'),
            optional($student->updated_at)->format('d/m/Y H:i'),
        ];
    }


    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:I1')->applyFromArray([
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
        foreach(range('A','I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Style untuk data
        $sheet->getStyle('A2:I' . ($sheet->getHighestRow()))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        return [];
    }

    public function title(): string
    {
        return 'Data Siswa';
    }
}