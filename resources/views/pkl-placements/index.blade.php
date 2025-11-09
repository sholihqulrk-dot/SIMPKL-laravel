@extends('layouts.app')

@section('content')
{{-- ✅ Alert Success --}}
@if (session('success'))
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="relative rounded-lg border border-green-200 bg-green-50 text-green-800 p-4 flex items-start space-x-3 shadow-sm">
        <svg class="flex-shrink-0 size-5 mt-0.5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <div class="text-sm leading-relaxed">{!! session('success') !!}</div>
        <button type="button" class="absolute top-2 right-2 text-green-600 hover:text-green-800"
            data-hs-remove-element="#success-alert">
            <span class="sr-only">Close</span>
            ✕
        </button>
    </div>
</div>
@endif

{{-- ❌ Alert Error --}}
@if (session('error'))
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="relative rounded-lg border border-red-200 bg-red-50 text-red-800 p-4 flex items-start space-x-3 shadow-sm">
        <svg class="flex-shrink-0 size-5 mt-0.5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0z" />
        </svg>
        <div class="text-sm leading-relaxed">{!! session('error') !!}</div>
        <button type="button" class="absolute top-2 right-2 text-red-600 hover:text-red-800"
            data-hs-remove-element="#error-alert">
            <span class="sr-only">Close</span>
            ✕
        </button>
    </div>
</div>
@endif


{{-- ⚠️ Detail Error Import --}}
@if (session('import_errors'))
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <div class="rounded-lg border border-yellow-200 bg-yellow-50 text-yellow-800 p-4 shadow-sm">
        <div class="flex items-start space-x-3 mb-2">
            <svg class="flex-shrink-0 size-5 text-yellow-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M4.93 4.93a10 10 0 1 1 14.14 14.14A10 10 0 0 1 4.93 4.93z" />
            </svg>
            <h3 class="font-semibold">Beberapa data tidak dapat diimpor:</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-yellow-200 text-sm">
                <thead class="bg-yellow-100">
                    <tr>
                        <th class="px-3 py-2 text-left font-medium text-yellow-800">#</th>
                        <th class="px-3 py-2 text-left font-medium text-yellow-800">Data</th>
                        <th class="px-3 py-2 text-left font-medium text-yellow-800">Pesan Error</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-yellow-100">
                    @foreach (session('import_errors') as $index => $error)
                        <tr>
                            <td class="px-3 py-2">{{ $index + 1 }}</td>
                            <td class="px-3 py-2 text-gray-700 text-xs">
                                <pre class="whitespace-pre-wrap break-words">{{ json_encode($error['row'], JSON_PRETTY_PRINT) }}</pre>
                            </td>
                            <td class="px-3 py-2 text-red-700 text-xs">
                                <ul class="list-disc pl-4">
                                    @foreach ($error['errors'] as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- Table Section -->
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
<!-- Card -->
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
        <!-- Header -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                Data Penempatan PKL
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Kelola penempatan siswa PKL di berbagai perusahaan.
            </p>
            </div>

            <div class="sm:col-span-2 md:grow">
            <div class="flex justify-end gap-x-2">
                @role('admin')
                <!-- Import Button -->
                <button type="button" 
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-import-placement-modal">
                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg>
                    Import
                </button>

                <!-- Export Dropdown -->
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Export
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                        href="{{ route('admin.pkl-placements.export', ['type' => 'all']) }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Export Semua Data
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                        href="#" data-hs-overlay="#hs-export-placement-modal">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Export Data Terpilih
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                        href="{{ route('admin.pkl-placements.template') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                            </svg>
                            Download Template
                        </a>
                    </div>
                </div>
                <!-- End Export Dropdown -->

                <!-- Add New Button -->
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-700 focus:outline-hidden focus:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none" 
                href="{{ route('admin.pkl-placements.create') }}">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="M12 5v14"/>
                    </svg>
                    Tambah Penempatan
                </a>
                @endrole
            </div>
            </div>
        </div>
        <!-- End Header -->

        @if($placements->count() > 0)
        <!-- Table -->
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" data-searchable="true">
            <thead class="bg-gray-50 dark:bg-neutral-800">
            <tr>
                <th scope="col" class="ps-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">No</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Siswa</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Perusahaan</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Guru Pembimbing</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Periode</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Durasi</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Status</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Aksi</span>
                </div>
                </th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach($placements as $placement)
            <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                <td class="size-px whitespace-nowrap">
                <div class="ps-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $loop->iteration + ($placements->currentPage() - 1) * $placements->perPage() }}</span>
                </div>
                </td>
                
                <!-- Student Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <div class="flex items-center gap-x-3">
                    <div class="flex items-center gap-x-2">
                        <div class="size-8 bg-blue-100 rounded-full flex items-center justify-center dark:bg-blue-900/20">
                        <span class="text-sm font-medium text-blue-800 dark:text-blue-200">
                            {{ substr($placement->student->user->name ?? 'N/A', 0, 1) }}
                        </span>
                        </div>
                        <div>
                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $placement->student->user->name ?? 'N/A' }}</span>
                        <span class="block text-sm text-gray-600 dark:text-neutral-400">{{ $placement->student->nis ?? '-' }}</span>
                        </div>
                    </div>
                    </div>
                </div>
                </td>

                <!-- Company Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <div class="flex items-center gap-x-3">
                    <div class="flex items-center gap-x-2">
                        <div class="size-8 bg-purple-100 rounded-full flex items-center justify-center dark:bg-purple-900/20">
                        <span class="text-sm font-medium text-purple-800 dark:text-purple-200">
                            {{ substr($placement->company->name ?? 'N/A', 0, 1) }}
                        </span>
                        </div>
                        <div>
                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $placement->company->name ?? 'N/A' }}</span>
                        <span class="block text-sm text-gray-600 dark:text-neutral-400">{{ $placement->company->business_field ?? '-' }}</span>
                        </div>
                    </div>
                    </div>
                </div>
                </td>

                <!-- Teacher Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <div class="flex items-center gap-x-3">
                    @if($placement->teacher)
                    <div class="flex items-center gap-x-2">
                        <div class="size-8 bg-green-100 rounded-full flex items-center justify-center dark:bg-green-900/20">
                        <span class="text-sm font-medium text-green-800 dark:text-green-200">
                            {{ substr($placement->teacher->name, 0, 1) }}
                        </span>
                        </div>
                        <div>
                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $placement->teacher->name }}</span>
                        <span class="block text-sm text-gray-600 dark:text-neutral-400">{{ $placement->teacher->nip ?? '-' }}</span>
                        </div>
                    </div>
                    @else
                    <span class="text-sm text-gray-500 dark:text-neutral-400">Belum ditentukan</span>
                    @endif
                    </div>
                </div>
                </td>

                <!-- Period Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <div class="text-sm text-gray-800 dark:text-neutral-200">
                    {{ \Carbon\Carbon::parse($placement->start_date)->format('d M Y') }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-neutral-400">
                    s/d {{ \Carbon\Carbon::parse($placement->end_date)->format('d M Y') }}
                    </div>
                </div>
                </td>

                <!-- Duration Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                    {{ $placement->total_weeks }} minggu
                    </span>
                </div>
                </td>

                <!-- Status Column -->
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    @php
                    $statusConfig = [
                        'active' => ['class' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-500', 'label' => 'Aktif'],
                        'completed' => ['class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-500', 'label' => 'Selesai'],
                        'pending' => ['class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-500', 'label' => 'Menunggu'],
                        'cancelled' => ['class' => 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-500', 'label' => 'Dibatalkan'],
                    ];
                    $config = $statusConfig[$placement->status] ?? $statusConfig['pending'];
                    @endphp
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $config['class'] }}">
                    @if($placement->status == 'active')
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    @elseif($placement->status == 'completed')
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                    @elseif($placement->status == 'pending')
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                    </svg>
                    @else
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    @endif
                    {{ $config['label'] }}
                    </span>
                </div>
                </td>

                <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5 flex">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                            </button>
                            @role('admin')
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700">
                                <div class="py-2 first:pt-0 last:pb-0">
                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                                    href="{{ route('admin.pkl-placements.edit', $placement->id) }}">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                        Edit
                                    </a>
                                </div>
                                <div class="py-2 first:pt-0 last:pb-0">
                                    <button type="button" 
                                            class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-100 focus:outline-hidden focus:bg-red-100 dark:text-red-500 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 w-full hs-delete-placement-btn"
                                            data-placement-id="{{ $placement->id }}"
                                            data-student-name="{{ $placement->student->user->name }}"
                                            data-company-name="{{ $placement->company->name }}"
                                            data-start-date="{{ $placement->start_date}}"
                                            data-end-date="{{ $placement->end_date}}">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- End Table -->

        @else
        <!-- Empty State -->
        <div class="max-w-sm w-full min-h-100 flex flex-col justify-center mx-auto px-6 py-4">
            <div class="flex justify-center items-center size-11 bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
            </div>

            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
            Tidak ada data penempatan PKL
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
            Mulai dengan menambahkan penempatan PKL baru untuk siswa.
            </p>

        </div>
        <!-- End Empty State -->
        @endif
        </div>
    </div>
    </div>
</div>
<!-- End Card -->
</div>
<!-- End Table Section -->
@endsection