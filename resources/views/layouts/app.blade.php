<!DOCTYPE html>
<html lang="en" class="relative min-h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SIMPKL - Sistem Informasi Manajemen Praktik Kerja Lapangan">
    
    <title>@yield('title', 'Dashboard') | SIMPKL</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.css?v=3.0.1">

    <style>
    /* Pastikan modal selalu muncul di atas header dan main */
    .hs-overlay {
        z-index: 9999 !important;
    }
    </style>


    @stack('styles')
</head>

<body class="hs-overlay-body-open overflow-hidden bg-gray-100 dark:bg-neutral-900">
    <!-- ========== HEADER ========== -->
    <header class="fixed top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 lg:z-61 w-full bg-white border-b border-gray-200 text-sm py-2.5 dark:bg-neutral-900 dark:border-neutral-700">
        <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
            <div class="w-full flex items-center gap-x-1.5">
                <ul class="flex items-center gap-1.5">
                    <li class="inline-flex items-center relative text-gray-200 pe-1.5 last:pe-0 last:after:hidden 
                    after:absolute after:top-1/2 after:end-0 after:inline-block after:w-px after:h-3.5 after:bg-gray-300 
                    after:rounded-full after:-translate-y-1/2 after:rotate-12 dark:text-neutral-200 dark:after:bg-neutral-700">

                        <!-- Logo + Text -->
                        <a href="{{ route('dashboard') }}" aria-label="SIMPKL" class="inline-flex items-center gap-2 focus:outline-none focus:opacity-80">
                            <img src="https://res.cloudinary.com/dlvmuwzun/image/upload/v1760795322/Gemini_Generated_Image_l5ffwgl5ffwgl5ff-removebg-preview_c7ytda.png" 
                                alt="Logo SIMPKL" 
                                class="w-8 h-8 object-contain">
                            <h1 class="font-medium text-lg text-gray-800 dark:text-neutral-200">SIMPKL</h1>
                        </a>

                        <!-- Sidebar Toggle -->
                        <button type="button" 
                                class="p-1.5 size-7.5 inline-flex items-center gap-x-1 text-xs rounded-md border border-transparent 
                                text-gray-500 hover:text-gray-800 disabled:opacity-50 disabled:pointer-events-none 
                                focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-400" 
                                aria-haspopup="dialog" 
                                aria-expanded="false" 
                                aria-controls="hs-pro-sidebar" 
                                data-hs-overlay="#hs-pro-sidebar">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2" />
                                <path d="M15 3v18" />
                                <path d="m10 15-3-3 3-3" />
                            </svg>
                            <span class="sr-only">Sidebar Toggle</span>
                        </button>
                    </li>
                </ul>

                <ul class="flex flex-row items-center gap-x-3 ms-auto">
                    <li class="inline-flex items-center gap-1.5 relative text-gray-500 pe-3 last:pe-0 last:after:hidden after:absolute after:top-1/2 after:end-0 after:inline-block after:w-px after:h-3.5 after:bg-gray-300 after:rounded-full after:-translate-y-1/2 after:rotate-12 dark:text-neutral-200 dark:after:bg-neutral-700">
                        <div class="h-8">
                            <!-- Account Dropdown -->
                            <div class="hs-dropdown inline-flex [--strategy:absolute] [--auto-close:inside] [--placement:bottom-right] relative text-start">
                                <!-- Notification Dropdown -->
                                    <li class="relative">
                                    <div class="hs-dropdown [--strategy:absolute] [--auto-close:inside] [--placement:bottom-right]">
                                        <button id="hs-notification-dropdown" type="button"
                                        class="relative inline-flex items-center justify-center size-9 rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800"
                                        aria-haspopup="menu" aria-expanded="false">
                                        <!-- Bell Icon -->
                                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.243 18.364a2 2 0 0 1-4.486 0M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9Z" />
                                        </svg>

                                        <!-- Red Dot Notification -->
                                        <span
                                            class="absolute top-1 right-1 block size-2.5 bg-red-500 rounded-full ring-2 ring-white dark:ring-neutral-900"></span>
                                        </button>

                                        <!-- Dropdown Menu -->
                                        <div
                                        class="hs-dropdown-menu hs-dropdown-open:opacity-100 transition-[opacity,margin] duration opacity-0 hidden z-50 mt-2 w-80 bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-900 dark:border-neutral-700">
                                        <div class="py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                                            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Notifikasi</h3>
                                        </div>

                                        <!-- List Notification -->
                                        <div class="max-h-60 overflow-y-auto">
                                            <a href="#"
                                            class="flex items-start gap-x-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-neutral-800">
                                            <span
                                                class="flex-shrink-0 inline-flex justify-center items-center size-8 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/30">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                                                </svg>
                                            </span>
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-700 dark:text-neutral-300">
                                                Jadwal PKL kamu telah disetujui oleh guru pembimbing.
                                                </p>
                                                <span class="text-xs text-gray-400 dark:text-neutral-500">2 menit yang lalu</span>
                                            </div>
                                            </a>

                                            <a href="#"
                                            class="flex items-start gap-x-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-neutral-800">
                                            <span
                                                class="flex-shrink-0 inline-flex justify-center items-center size-8 bg-green-100 text-green-600 rounded-full dark:bg-green-900/30">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                                </svg>
                                            </span>
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-700 dark:text-neutral-300">
                                                Laporan mingguan kamu berhasil dikirim.
                                                </p>
                                                <span class="text-xs text-gray-400 dark:text-neutral-500">1 jam yang lalu</span>
                                            </div>
                                            </a>
                                        </div>

                                        <div class="py-2 border-t border-gray-200 dark:border-neutral-700 text-center">
                                            <a href="#"
                                            class="block py-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                                            Lihat semua notifikasi
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <!-- End Notification Dropdown -->

                                <!-- Account Dropdown -->
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                    <!-- Trigger -->
                                    <button id="hs-account-dropdown" type="button"
                                        class="p-0.5 inline-flex shrink-0 items-center gap-x-3 text-start rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Account Menu">
                                        <img class="shrink-0 size-7 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                                        alt="{{ auth()->user()->name }}">
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div
                                        class="hs-dropdown-menu hs-dropdown-open:opacity-100 transition-[opacity,margin] duration hidden opacity-0 z-20 w-60 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl dark:bg-neutral-900 dark:border-neutral-700"
                                        role="menu" aria-orientation="vertical" aria-labelledby="hs-account-dropdown">

                                        <div class="py-2 px-3.5">
                                        <span class="font-medium text-gray-800 dark:text-neutral-300">{{ auth()->user()->name }}</span>
                                        <p class="text-sm text-gray-500 dark:text-neutral-500">{{ auth()->user()->email }}</p>
                                        <span
                                            class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                            @if(auth()->user()->role_id === 'student') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                            @elseif(auth()->user()->role_id === 'teacher') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                            @else bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                            @endif">
                                            {{ auth()->user()->getRoleDisplayName() }}
                                        </span>
                                        </div>

                                        <div class="p-1 border-t border-gray-200 dark:border-neutral-800">
                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-600 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800"
                                            href="#">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                            </svg>
                                            Profile
                                        </a>

                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-600 hover:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800"
                                            href="#">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                            <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            Settings
                                        </a>

                                        <button type="button"
                                            class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20"
                                            data-hs-overlay="#hs-logout-modal">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m16 17 5-5-5-5" />
                                            <path d="M21 12H9" />
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                            </svg>
                                            Log out
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- End Account Dropdown -->

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main class="lg:hs-overlay-layout-open:ps-60 transition-all duration-300 lg:fixed lg:inset-0 pt-15 px-3 pb-3">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Content -->
        <div class="h-[calc(100dvh-62px)] lg:h-full overflow-hidden flex flex-col bg-white border border-gray-200 shadow-sm rounded-lg dark:bg-neutral-800 dark:border-neutral-700">
            @yield('content')
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- Logout Confirmation Modal -->
    <div id="hs-logout-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-logout-modal-label">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-900 dark:border-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-800">
                    <h3 id="hs-logout-modal-label" class="font-semibold text-gray-800 dark:text-white">
                        Confirm Logout
                    </h3>
                    <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-logout-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="text-gray-800 dark:text-neutral-400">
                        Are you sure you want to logout? You will need to login again to access your account.
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-800">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-logout-modal">
                        Cancel
                    </button>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Logout Modal -->

    <!-- JS Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>
    
    @stack('scripts')
</body>
</html>