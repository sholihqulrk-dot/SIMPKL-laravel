@extends('layouts.app')

@section('content')
<!-- Card Section -->
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
<!-- Card -->
<div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
    <form action="{{ isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store') }}" method="POST">
    @csrf
    @if(isset($student))
        @method('PUT')
    @endif

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
        {{ isset($student) ? 'Edit Data Siswa' : 'Tambah Data Siswa' }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-neutral-400">
        {{ isset($student) ? 'Perbarui informasi data siswa' : 'Isi form berikut untuk menambahkan siswa baru' }}
        </p>
    </div>
    <!-- End Header -->

    <!-- Data Pribadi Section -->
    <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
        <div class="sm:col-span-12">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            Data Pribadi
        </h2>
        </div>
        <!-- End Col -->

        <!-- Nama Lengkap -->
        <div class="sm:col-span-3">
        <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
            Nama Lengkap
        </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <input id="name" name="name" type="text" 
                value="{{ old('name', $student->user->name ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Masukkan nama lengkap" required>
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
                value="{{ old('email', $student->email ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Masukkan alamat email" required>
        @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
        </div>
        <!-- End Col -->

        <!-- NIS -->
        <div class="sm:col-span-3">
        <label for="nis" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
            NIS
        </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <input id="nis" name="nis" type="text" 
                value="{{ old('nis', $student->nis ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Masukkan Nomor Induk Siswa" required>
        @error('nis')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
        </div>
        <!-- End Col -->
    </div>
    <!-- End Data Pribadi Section -->

    <!-- Data Akademik Section -->
    <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
        <div class="sm:col-span-12">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            Data Akademik
        </h2>
        </div>
        <!-- End Col -->

        <!-- Kelas -->
        <div class="sm:col-span-3">
        <label for="class" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
            Kelas
        </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <input id="class" name="class" type="text" 
                value="{{ old('class', $student->class ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Contoh: XII RPL 1" required>
        @error('class')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
        </div>
        <!-- End Col -->

        <!-- Jurusan -->
        <div class="sm:col-span-3">
        <label for="major" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
            Jurusan
        </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <input id="major" name="major" type="text" 
                value="{{ old('major', $student->major ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Contoh: Rekayasa Perangkat Lunak" required>
        @error('major')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
        </div>
        <!-- End Col -->
    </div>
    <!-- End Data Akademik Section -->

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
            Alamat
        </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <textarea id="address" name="address" rows="3"
                    class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Masukkan alamat lengkap" required>{{ old('address', $student->address ?? '') }}</textarea>
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
                value="{{ old('phone', $student->phone ?? '') }}"
                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                placeholder="Masukkan nomor telepon" required>
        @error('phone')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
        </div>
        <!-- End Col -->
    </div>
    <!-- End Kontak Section -->

    <!-- Action Buttons -->
    <div class="mt-8 flex justify-end gap-3">
        <a href="{{ route('admin.students.index') }}" 
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
        {{ isset($student) ? 'Perbarui Data' : 'Simpan Data' }}
        </button>
    </div>
    <!-- End Action Buttons -->
    </form>
</div>
<!-- End Card -->
</div>
<!-- End Card Section -->
@endsection