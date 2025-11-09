@extends('layouts.app')

@section('content')
<!-- Card Section -->
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
        <form action="{{ isset($placement) ? route('admin.pkl-placements.update', $placement->id) : route('admin.pkl-placements.store') }}" method="POST">
            @csrf
            @if(isset($placement))
                @method('PUT')
            @endif

            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ isset($placement) ? 'Edit Data Penempatan PKL' : 'Tambah Data Penempatan PKL' }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ isset($placement) ? 'Perbarui informasi penempatan PKL' : 'Isi form berikut untuk menambahkan penempatan PKL baru' }}
                </p>
            </div>
            <!-- End Header -->

            <!-- Data Penempatan Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Data Penempatan
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Siswa -->
                <div class="sm:col-span-3">
                    <label for="student_id" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Siswa <span class="text-red-500">*</span>
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <select id="student_id" name="student_id" 
                            class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" 
                                    {{ old('student_id', $placement->student_id ?? '') == $student->id ? 'selected' : '' }}>
                                {{ $student->user->name }} (NIS: {{ $student->nis }})
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Perusahaan -->
                <div class="sm:col-span-3">
                    <label for="company_id" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Perusahaan <span class="text-red-500">*</span>
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <select id="company_id" name="company_id" 
                            class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" required>
                        <option value="">Pilih Perusahaan</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" 
                                    {{ old('company_id', $placement->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }} - {{ $company->business_field }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Guru Pembimbing -->
                <div class="sm:col-span-3">
                    <label for="teacher_id" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Guru Pembimbing
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <select id="teacher_id" name="teacher_id" 
                            class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option value="">Pilih Guru Pembimbing (Opsional)</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" 
                                    {{ old('teacher_id', $placement->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->user->name }} (NIP: {{ $teacher->nip }})
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Data Penempatan Section -->

            <!-- Periode PKL Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Periode PKL
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Tanggal Mulai -->
                <div class="sm:col-span-3">
                    <label for="start_date" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="start_date" name="start_date" type="date" 
                            value="{{ old('start_date', isset($placement) ? $placement->start_date : '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            required>
                    @error('start_date')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                <!-- Tanggal Selesai -->
                <div class="sm:col-span-3">
                    <label for="end_date" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="end_date" name="end_date" type="date" 
                            value="{{ old('end_date', isset($placement) ? $placement->end_date : '') }}"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            required>
                    @error('end_date')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->

                @if(isset($placement))
                <!-- Status -->
                <div class="sm:col-span-3">
                    <label for="status" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Status <span class="text-red-500">*</span>
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <select id="status" name="status" 
                            class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" required>
                        <option value="pending" {{ old('status', $placement->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ old('status', $placement->status ?? '') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="completed" {{ old('status', $placement->status ?? '') == 'completed' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
                @endif
            </div>
            <!-- End Periode PKL Section -->

            <!-- Deskripsi Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Deskripsi
                    </h2>
                </div>
                <!-- End Col -->

                <!-- Deskripsi -->
                <div class="sm:col-span-3">
                    <label for="description" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Keterangan
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <textarea id="description" name="description" rows="4"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Masukkan keterangan tambahan tentang penempatan PKL">{{ old('description', $placement->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Deskripsi Section -->

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.pkl-placements.index') }}" 
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                    Batal
                </a>
                <button type="submit" 
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-700 focus:outline-hidden focus:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    {{ isset($placement) ? 'Perbarui Data' : 'Simpan Data' }}
                </button>
            </div>
            <!-- End Action Buttons -->
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Calculate total weeks when dates change
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    
    function calculateWeeks() {
        if (startDateInput.value && endDateInput.value) {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const diffTime = Math.abs(endDate - startDate);
            const diffWeeks = Math.ceil(diffTime / (1000 * 60 * 60 * 24 * 7));
            
            // You can display this information to the user if needed
            console.log(`Total minggu: ${diffWeeks}`);
        }
    }
    
    if (startDateInput && endDateInput) {
        startDateInput.addEventListener('change', calculateWeeks);
        endDateInput.addEventListener('change', calculateWeeks);
    }
});
</script>
@endsection