<div id="hs-pro-sidebar" class="hs-overlay [--body-scroll:true] lg:[--overlay-backdrop:false] [--is-layout-affect:true] [--opened:lg] [--auto-close:lg]
    hs-overlay-open:translate-x-0 lg:hs-overlay-layout-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-60
    hidden
    fixed inset-y-0 z-60 start-0
    bg-white border-e border-gray-200
    lg:block lg:-translate-x-full lg:end-auto lg:bottom-0
    dark:bg-neutral-900 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="lg:pt-13 relative flex flex-col h-full max-h-full">
        <!-- Body -->
        <nav class="p-3 size-full flex flex-col overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <div class="lg:hidden mb-2 flex items-center justify-between">
                <!-- Close Button for Mobile -->
                <button type="button" class="p-1.5 size-7.5 inline-flex items-center gap-x-1 text-xs rounded-md text-gray-500 hover:text-gray-800 focus:outline-none dark:text-neutral-500 dark:hover:text-neutral-400" data-hs-overlay="#hs-pro-sidebar">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Close Sidebar</span>
                </button>
            </div>

            <!-- Quick Actions -->
            <button type="button" class="mb-3 p-1.5 ps-2.5 w-full inline-flex items-center gap-x-2 text-sm rounded-lg bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 hover:border-gray-300 focus:outline-none focus:border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:border-neutral-600">
                Notifications
                <span class="ms-auto flex items-center gap-x-1 py-px px-1.5 border border-gray-200 rounded-md dark:border-neutral-700">
                    <!-- Bell Icon (ukuran kecil) -->
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.243 18.364a2 2 0 0 1-4.486 0M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9Z" />
                    </svg>
                </span>
            </button>

            <!-- Main Navigation -->
            <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 first:border-t-0 first:pt-0 first:mt-0 dark:border-neutral-700">
                <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-800 dark:text-neutral-500">Home</span>
                <ul class="flex flex-col gap-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg 
                            {{ request()->routeIs('dashboard') 
                                    ? 'bg-gray-100 text-gray-800 dark:bg-neutral-800 dark:text-neutral-200' 
                                    : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} 
                            focus:outline-none">

                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="7" height="9" x="3" y="3" rx="1" />
                                    <rect width="7" height="5" x="14" y="3" rx="1" />
                                    <rect width="7" height="9" x="14" y="12" rx="1" />
                                    <rect width="7" height="5" x="3" y="16" rx="1" />
                                </svg>

                                Dashboard
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Data Management Section -->
            <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-700">
                <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-800 dark:text-neutral-500">Data Management</span>
                <ul class="flex flex-col gap-y-1">
                    <!-- Students -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('students.index') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('students.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>
                            Data Siswa
                        </a>
                    </li>

                    <!-- Teachers -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('teachers.index') ? 'bg-green-50 text-green-600 dark:bg-green-900/20 dark:text-green-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('teachers.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Data Guru
                        </a>
                    </li>

                    <!-- Companies -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('companies.index') ? 'bg-purple-50 text-purple-600 dark:bg-purple-900/20 dark:text-purple-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('companies.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5m-4 0h4" />
                            </svg>
                            Data Perusahaan
                        </a>
                    </li>

                    <!-- PKL Placements -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('pkl-placements.index') ? 'bg-yellow-50 text-yellow-600 dark:bg-yellow-900/20 dark:text-yellow-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('pkl-placements.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            Penempatan PKL
                        </a>
                    </li>

                    <!-- Journals -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('journals.index') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/20 dark:text-indigo-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('journals.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" x2="8" y1="13" y2="13" />
                                <line x1="16" x2="8" y1="17" y2="17" />
                                <polyline points="10 9 9 9 8 9" />
                            </svg>
                            Jurnal PKL
                        </a>
                    </li>

                    <!-- Grades -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('grades.index') ? 'bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('grades.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18" />
                                <path d="M18 17V9" />
                                <path d="M13 17V5" />
                                <path d="M8 17v-3" />
                            </svg>
                            Data Nilai
                        </a>
                    </li>

                    <!-- Documents -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('documents.index') ? 'bg-teal-50 text-teal-600 dark:bg-teal-900/20 dark:text-teal-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('documents.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" x2="8" y1="13" y2="13" />
                                <line x1="16" x2="8" y1="17" y2="17" />
                                <polyline points="10 9 9 9 8 9" />
                            </svg>
                            Dokumen PKL
                        </a>
                    </li>

                    <!-- Attendances -->
                    <li>
                        <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm rounded-lg {{ request()->routeIs('attendances.index') ? 'bg-orange-50 text-orange-600 dark:bg-orange-900/20 dark:text-orange-400' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200' }} focus:outline-none" href="{{ route('attendances.index') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                <line x1="16" x2="16" y1="2" y2="6" />
                                <line x1="8" x2="8" y1="2" y2="6" />
                                <line x1="3" x2="21" y1="10" y2="10" />
                                <path d="M8 14h.01" />
                                <path d="M12 14h.01" />
                                <path d="M16 14h.01" />
                                <path d="M8 18h.01" />
                                <path d="M12 18h.01" />
                                <path d="M16 18h.01" />
                            </svg>
                            Data Absensi
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Footer -->
        <footer class="mt-auto p-3 flex flex-col border-t border-gray-200 dark:border-neutral-700">
            <ul class="flex flex-col gap-y-1">
                <li>
                    <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-800 focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200" href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4" />
                            <path d="M12 8h.01" />
                        </svg>
                        Help & support
                    </a>
                </li>
                <li>
                    <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-600 rounded-lg hover:bg-gray-100 hover:text-gray-800 focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:hover:text-neutral-200" href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 7v14" />
                            <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
                        </svg>
                        Documentation
                    </a>
                </li>
            </ul>
        </footer>
    </div>
</div>