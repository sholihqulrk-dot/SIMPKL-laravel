<?php

namespace App\Exports;

use App\Models\CompanyModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class CompaniesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $companies;

    public function __construct($companies = null)
    {
        $this->companies = $companies ?? CompanyModel::with('user')->get();
    }

    public function collection()
    {
        return $this->companies;
    }

    public function headings(): array
    {
        return [
            'NAMA PERUSAHAAN',
            'BIDANG USAHA',
            'EMAIL',
            'TELEPON',
            'ALAMAT',
            'WEBSITE',
            'NPWP',
            'TAHUN BERDIRI',
            'JUMLAH KARYAWAN',
            'DESKRIPSI',
            'STATUS',
            'NAMA SUPERVISOR',
            'JABATAN SUPERVISOR',
            'TELEPON SUPERVISOR',
            'EMAIL SUPERVISOR',
            'NAMA HR',
            'JABATAN HR',
            'TELEPON HR',
            'EMAIL HR',
            'JADWAL KERJA',
            'DURASI PKL',
            'FASILITAS',
            'PROGRAM PELATIHAN',
            'TANGGAL DIBUAT',
            'TANGGAL DIPERBARUI'
        ];
    }

    public function map($company): array
    {
        if (is_array($company)) {
            return [
                $company['name'] ?? '',
                $company['business_field'] ?? '',
                $company['email'] ?? '',
                $company['phone'] ?? '',
                $company['address'] ?? '',
                $company['website'] ?? '',
                $company['npwp'] ?? '',
                $company['established_year'] ?? '',
                $company['total_employees'] ?? '',
                $company['description'] ?? '',
                $company['status'] ?? '',
                $company['supervisor_name'] ?? '',
                $company['supervisor_position'] ?? '',
                $company['supervisor_phone'] ?? '',
                $company['supervisor_email'] ?? '',
                $company['hr_name'] ?? '',
                $company['hr_position'] ?? '',
                $company['hr_phone'] ?? '',
                $company['hr_email'] ?? '',
                $company['work_schedule'] ?? '',
                $company['pkl_duration'] ?? '',
                $company['facilities'] ?? '',
                $company['training_program'] ?? '',
                '', // created_at kosong untuk template
                '', // updated_at kosong untuk template
            ];
        }

        // Jika data berbentuk object (Eloquent)
        return [
            $company->name,
            $company->business_field,
            $company->email,
            $company->phone,
            $company->address,
            $company->website,
            $company->npwp,
            $company->established_year,
            $company->total_employees,
            $company->description,
            $company->status,
            $company->supervisor_name,
            $company->supervisor_position,
            $company->supervisor_phone,
            $company->supervisor_email,
            $company->hr_name,
            $company->hr_position,
            $company->hr_phone,
            $company->hr_email,
            $company->work_schedule,
            $company->pkl_duration,
            $company->facilities,
            $company->training_program,
            optional($company->created_at)->format('d/m/Y H:i'),
            optional($company->updated_at)->format('d/m/Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header style
        $sheet->getStyle('A1:Y1')->applyFromArray([
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

        // Auto-size semua kolom
        foreach (range('A', 'Y') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Border untuk seluruh data
        $sheet->getStyle('A2:Y' . $sheet->getHighestRow())
            ->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Wrap text untuk kolom panjang
        $sheet->getStyle('E2:E' . $sheet->getHighestRow())->getAlignment()->setWrapText(true);
        $sheet->getStyle('J2:J' . $sheet->getHighestRow())->getAlignment()->setWrapText(true);

        return [];
    }

    public function title(): string
    {
        return 'Data Perusahaan';
    }
}
