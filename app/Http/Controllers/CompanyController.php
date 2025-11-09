<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Exports\CompaniesExport;
use App\Imports\CompaniesImport;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = CompanyModel::with('user')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'business_field' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'npwp' => 'nullable|string|max:20',
            'established_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'total_employees' => 'nullable|integer|min:0',
            'supervisor_name' => 'required|string|max:255',
            'supervisor_email' => 'required|email',
            'supervisor_phone' => 'required|string|max:20',
            'hr_name' => 'required|string|max:255',
            'hr_email' => 'required|email',
            'hr_phone' => 'required|string|max:20',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // Create user account
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make('password123'), // Default password
                    'role_id' => 'companies',
                ]);

                // Create company record
                CompanyModel::create([
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'business_field' => $request->business_field,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'website' => $request->website,
                    'npwp' => $request->npwp,
                    'established_year' => $request->established_year,
                    'description' => $request->description,
                    'status' => 'active',
                    'total_employees' => $request->total_employees,
                    'active_students' => 0,
                    'rating' => 0,
                    'supervisor_name' => $request->supervisor_name,
                    'supervisor_position' => $request->supervisor_position,
                    'supervisor_phone' => $request->supervisor_phone,
                    'supervisor_email' => $request->supervisor_email,
                    'hr_name' => $request->hr_name,
                    'hr_position' => $request->hr_position,
                    'hr_phone' => $request->hr_phone,
                    'hr_email' => $request->hr_email,
                    'work_schedule' => $request->work_schedule,
                    'pkl_duration' => $request->pkl_duration,
                    'facilities' => $request->facilities,
                    'training_program' => $request->training_program,
                ]);
            });

            return redirect()->route('admin.companies.index')
                ->with('success', 'Perusahaan berhasil ditambahkan.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = CompanyModel::with('user')->findOrFail($id);
        return view('companies.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = CompanyModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $company->user_id,
            'business_field' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'npwp' => 'nullable|string|max:20',
            'established_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'total_employees' => 'nullable|integer|min:0',
            'supervisor_name' => 'required|string|max:255',
            'supervisor_email' => 'required|email',
            'supervisor_phone' => 'required|string|max:20',
            'hr_name' => 'required|string|max:255',
            'hr_email' => 'required|email',
            'hr_phone' => 'required|string|max:20',
        ]);

        try {
            DB::transaction(function () use ($request, $company) {
                // Update user account
                $user = User::findOrFail($company->user_id);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                // Update company record
                $company->update([
                    'name' => $request->name,
                    'business_field' => $request->business_field,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'website' => $request->website,
                    'npwp' => $request->npwp,
                    'established_year' => $request->established_year,
                    'description' => $request->description,
                    'total_employees' => $request->total_employees,
                    'supervisor_name' => $request->supervisor_name,
                    'supervisor_position' => $request->supervisor_position,
                    'supervisor_phone' => $request->supervisor_phone,
                    'supervisor_email' => $request->supervisor_email,
                    'hr_name' => $request->hr_name,
                    'hr_position' => $request->hr_position,
                    'hr_phone' => $request->hr_phone,
                    'hr_email' => $request->hr_email,
                    'work_schedule' => $request->work_schedule,
                    'pkl_duration' => $request->pkl_duration,
                    'facilities' => $request->facilities,
                    'training_program' => $request->training_program,
                ]);
            });

            return redirect()->route('admin.companies.index')
                ->with('success', 'Data perusahaan berhasil diperbarui.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = CompanyModel::findOrFail($id);

        try {
            DB::transaction(function () use ($company) {
                // Delete user account
                User::where('id', $company->user_id)->delete();
                
                // Delete company record
                $company->delete();
            });

            return redirect()->route('admin.companies.index')
                ->with('success', 'Perusahaan berhasil dihapus.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $type = $request->get('type', 'all');
        
        switch ($type) {
            case 'selected':
                $companyIds = explode(',', $request->get('company_ids', ''));
                $companies = CompanyModel::with('user')->whereIn('id', $companyIds)->get();
                break;
            case 'filtered':
                // Implementasi filtering sesuai kebutuhan
                $companies = CompanyModel::with('user')->get();
                break;
            case 'all':
            default:
                $companies = CompanyModel::with('user')->get();
                break;
        }

        $filename = 'data-perusahaan-' . date('Y-m-d-H-i-s') . '.xlsx';
        
        return Excel::download(new CompaniesExport($companies), $filename);
    }

    /**
     * Import data perusahaan dari Excel
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240'
        ], [
            'file.required' => 'Silakan pilih file Excel terlebih dahulu.',
            'file.mimes' => 'Format file tidak valid. Gunakan file dengan ekstensi .xlsx, .xls, atau .csv.',
            'file.max' => 'Ukuran file maksimal adalah 10MB.'
        ]);

        try {
            $import = new CompaniesImport;
            Excel::import($import, $request->file('file'));

            $success = $import->successCount;
            $errorCount = count($import->errors);

            $message = "✅ <strong>Import selesai.</strong> {$success} data perusahaan berhasil diimpor.";

            if ($errorCount > 0) {
                $message .= " ⚠️ {$errorCount} baris gagal diimpor karena kesalahan data.";
                session()->flash('import_errors', $import->errors);
            }

            return redirect()->route('admin.companies.index')->with('success', $message);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
            }

            return redirect()->route('admin.companies.index')
                ->with('error', "Kesalahan validasi saat import:<br>" . implode("<br>", $errorMessages));

        } catch (\Throwable $e) {
            return redirect()->route('admin.companies.index')
                ->with('error', 'Terjadi kesalahan saat mengimpor data:<br>' . $e->getMessage());
        }
    }


    /**
     * Download template Excel
     */
    public function downloadTemplate()
    {
        $templateData = [
            [
                'name' => 'PT. Teknologi Indonesia Maju',
                'business_field' => 'Teknologi Informasi',
                'email' => 'hr@tekindonesia.co.id',
                'phone' => '02112345678',
                'address' => 'Jl. Sudirman No. 123, Jakarta Selatan',
                'website' => 'https://tekindonesia.co.id',
                'npwp' => '01.234.567.8-912.000',
                'established_year' => 2010,
                'total_employees' => 150,
                'description' => 'Perusahaan pengembangan software dan konsultan IT',
                'status' => 'active',
                'supervisor_name' => 'Budi Santoso',
                'supervisor_position' => 'IT Supervisor',
                'supervisor_phone' => '081234567890',
                'supervisor_email' => 'budi.santoso@tekindonesia.co.id',
                'hr_name' => 'Sari Dewi',
                'hr_position' => 'HR Manager',
                'hr_phone' => '081234567891',
                'hr_email' => 'sari.dewi@tekindonesia.co.id',
                'work_schedule' => 'Senin - Jumat, 08:00 - 17:00',
                'pkl_duration' => '6 Bulan',
                'facilities' => 'Laptop, Internet, Ruang Kerja, Mentoring',
                'training_program' => 'Web Development, Mobile Development, Database Management',
            ],
            [
                'name' => 'CV. Kreasi Digital Nusantara',
                'business_field' => 'Digital Marketing',
                'email' => 'info@kreasidigital.com',
                'phone' => '02198765432',
                'address' => 'Jl. Thamrin No. 45, Jakarta Pusat',
                'website' => 'https://kreasidigital.com',
                'npwp' => '02.345.678.9-123.000',
                'established_year' => 2015,
                'total_employees' => 50,
                'description' => 'Agency digital marketing dan creative content',
                'status' => 'active',
                'supervisor_name' => 'Rina Wijaya',
                'supervisor_position' => 'Creative Supervisor',
                'supervisor_phone' => '081234567892',
                'supervisor_email' => 'rina.wijaya@kreasidigital.com',
                'hr_name' => 'Ahmad Fauzi',
                'hr_position' => 'HR Officer',
                'hr_phone' => '081234567893',
                'hr_email' => 'ahmad.fauzi@kreasidigital.com',
                'work_schedule' => 'Senin - Jumat, 09:00 - 18:00',
                'pkl_duration' => '3 Bulan',
                'facilities' => 'Komputer, Software Creative, Ruang Meeting',
                'training_program' => 'Social Media Management, Content Creation, SEO',
            ],
        ];

        $filename = 'template-import-perusahaan.xlsx';
        return Excel::download(new CompaniesExport(collect($templateData)), $filename);
    }


}
