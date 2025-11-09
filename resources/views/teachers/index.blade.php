@extends('layouts.app')

@section('content')
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
                Data Guru
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Kelola data guru dan pembimbing PKL.
            </p>
            </div>

            <div class="sm:col-span-2 md:grow">
            @role('admin')
            <div class="flex justify-end gap-x-2">
                <!-- Import Button -->
                <button type="button" 
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-import-teacher-modal">
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
                        href="{{ route('admin.teachers.export', ['type' => 'all']) }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Export Semua Data
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                        href="#" data-hs-overlay="#hs-export-teacher-modal">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Export Data Terpilih
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                        href="{{ route('admin.teachers.template') }}">
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
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none" 
                href="{{ route('admin.teachers.create') }}">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="M12 5v14"/>
                    </svg>
                    Tambah Guru
                </a>
            </div>
            @endrole
            </div>
        </div>
        <!-- End Header -->

        @if($teachers->count() > 0)
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
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">NIP</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Nama</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Email</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Telepon</span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Alamat</span>
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
            @foreach($teachers as $teacher)
            <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                <td class="size-px whitespace-nowrap">
                <div class="ps-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $loop->iteration + ($teachers->currentPage() - 1) * $teachers->perPage() }}</span>
                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $teacher->nip }}</span>
                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $teacher->name }}</span>
                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $teacher->email }}</span>
                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $teacher->phone ?? '-' }}</span>
                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-3">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ Str::limit($teacher->address, 30) ?? '-' }}</span>
                </div>
                </td>
                <!-- Ganti bagian dropdown actions -->
                <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-1.5 flex">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                </svg>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700">
                                <div class="py-2 first:pt-0 last:pb-0">
                                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" 
                                    href="{{ route('admin.teachers.edit', $teacher->id) }}">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <button type="button" 
                                            class="delete-teacher-btn flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-100 focus:outline-hidden focus:bg-red-100 dark:text-red-500 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 w-full"
                                            data-teacher-id="{{ $teacher->id }}"
                                            data-teacher-name="{{ $teacher->name }}"
                                            data-teacher-nip="{{ $teacher->nip }}">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </div>
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
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            </div>

            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
            Tidak ada data guru
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
            Mulai dengan menambahkan data guru baru ke dalam sistem.
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