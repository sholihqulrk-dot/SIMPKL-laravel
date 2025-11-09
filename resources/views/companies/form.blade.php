@extends('layouts.app')

@section('content')
<!-- Card Section -->
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
        <form action="{{ isset($company) ? route('admin.companies.update', $company->id) : route('admin.companies.store') }}" method="POST">
            @csrf
            @if(isset($company))
                @method('PUT')
            @endif

            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ isset($company) ? 'Edit Data Perusahaan' : 'Tambah Data Perusahaan' }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ isset($company) ? 'Perbarui informasi data perusahaan' : 'Isi form berikut untuk menambahkan perusahaan baru' }}
                </p>
            </div>
            <!-- End Header -->

            <!-- Data Perusahaan Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Data Perusahaan
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Nama Perusahaan -->
                <div class="sm:col-span-3">
                    <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nama Perusahaan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="name" name="name" type="text" 
                            value="{{ old('name', $company->name ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Masukkan nama perusahaan" required>
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Email -->
                <div class="sm:col-span-3">
                    <label for="email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Email
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="email" name="email" type="email" 
                            value="{{ old('email', $company->email ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Masukkan alamat email" required>
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Bidang Usaha -->
                <div class="sm:col-span-3">
                    <label for="business_field" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Bidang Usaha
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="business_field" name="business_field" type="text" 
                            value="{{ old('business_field', $company->business_field ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Contoh: Teknologi Informasi, Manufaktur, Retail" required>
                    @error('business_field')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Website -->
                <div class="sm:col-span-3">
                    <label for="website" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Website
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="website" name="website" type="url" 
                            value="{{ old('website', $company->website ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="https://example.com">
                    @error('website')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- NPWP -->
                <div class="sm:col-span-3">
                    <label for="npwp" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        NPWP
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="npwp" name="npwp" type="text" 
                            value="{{ old('npwp', $company->npwp ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Masukkan NPWP perusahaan">
                    @error('npwp')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Tahun Berdiri -->
                <div class="sm:col-span-3">
                    <label for="established_year" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Tahun Berdiri
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="established_year" name="established_year" type="number" 
                            value="{{ old('established_year', $company->established_year ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Tahun berdiri perusahaan" min="1900" max="{{ date('Y') }}">
                    @error('established_year')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Jumlah Karyawan -->
                <div class="sm:col-span-3">
                    <label for="total_employees" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Jumlah Karyawan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="total_employees" name="total_employees" type="number" 
                            value="{{ old('total_employees', $company->total_employees ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Jumlah karyawan" min="0">
                    @error('total_employees')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Deskripsi -->
                <div class="sm:col-span-3">
                    <label for="description" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Deskripsi Perusahaan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <textarea id="description" name="description" rows="4"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Deskripsi singkat tentang perusahaan">{{ old('description', $company->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Data Perusahaan Section -->

            <!-- Kontak Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Kontak
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Alamat -->
                <div class="sm:col-span-3">
                    <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Alamat Lengkap
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <textarea id="address" name="address" rows="3"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Masukkan alamat lengkap perusahaan" required>{{ old('address', $company->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Telepon -->
                <div class="sm:col-span-3">
                    <label for="phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nomor Telepon
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="phone" name="phone" type="text" 
                            value="{{ old('phone', $company->phone ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Masukkan nomor telepon perusahaan" required>
                    @error('phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Kontak Section -->

            <!-- Supervisor Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Supervisor/Pembimbing
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Nama Supervisor -->
                <div class="sm:col-span-3">
                    <label for="supervisor_name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nama Supervisor
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="supervisor_name" name="supervisor_name" type="text" 
                            value="{{ old('supervisor_name', $company->supervisor_name ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nama lengkap supervisor" required>
                    @error('supervisor_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Jabatan Supervisor -->
                <div class="sm:col-span-3">
                    <label for="supervisor_position" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Jabatan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="supervisor_position" name="supervisor_position" type="text" 
                            value="{{ old('supervisor_position', $company->supervisor_position ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Jabatan supervisor">
                    @error('supervisor_position')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Email Supervisor -->
                <div class="sm:col-span-3">
                    <label for="supervisor_email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Email Supervisor
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="supervisor_email" name="supervisor_email" type="email" 
                            value="{{ old('supervisor_email', $company->supervisor_email ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Email supervisor" required>
                    @error('supervisor_email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Telepon Supervisor -->
                <div class="sm:col-span-3">
                    <label for="supervisor_phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Telepon Supervisor
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="supervisor_phone" name="supervisor_phone" type="text" 
                            value="{{ old('supervisor_phone', $company->supervisor_phone ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nomor telepon supervisor" required>
                    @error('supervisor_phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Supervisor Section -->

            <!-- HR Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        HR/Personalia
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Nama HR -->
                <div class="sm:col-span-3">
                    <label for="hr_name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nama HR
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="hr_name" name="hr_name" type="text" 
                            value="{{ old('hr_name', $company->hr_name ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nama lengkap HR" required>
                    @error('hr_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Jabatan HR -->
                <div class="sm:col-span-3">
                    <label for="hr_position" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Jabatan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="hr_position" name="hr_position" type="text" 
                            value="{{ old('hr_position', $company->hr_position ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Jabatan HR">
                    @error('hr_position')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Email HR -->
                <div class="sm:col-span-3">
                    <label for="hr_email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Email HR
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="hr_email" name="hr_email" type="email" 
                            value="{{ old('hr_email', $company->hr_email ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Email HR" required>
                    @error('hr_email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Telepon HR -->
                <div class="sm:col-span-3">
                    <label for="hr_phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Telepon HR
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="hr_phone" name="hr_phone" type="text" 
                            value="{{ old('hr_phone', $company->hr_phone ?? '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Nomor telepon HR" required>
                    @error('hr_phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End HR Section -->

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.companies.index') }}" 
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                    Batal
                </a>
                <button type="submit" 
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    {{ isset($company) ? 'Perbarui Data' : 'Simpan Data' }}
                </button>
            </div>
            <!-- End Action Buttons -->
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
@endsection