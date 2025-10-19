<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required Meta Tags Always Come First -->
<meta charset="utf-8">
<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<link rel="canonical" href="https://preline.co/">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Crafted for agencies and studios specializing in web design and development.">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Title -->
<title>SIMPKL</title>

<!-- Favicon -->
<link rel="shortcut icon" href="../../favicon.ico">

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
  html {
    scroll-behavior: smooth;
  }
</style>
</head>

<body class="bg-light-900">
<!-- ========== HEADER ========== -->
<header class="sticky top-4 inset-x-0 before:absolute before:inset-0 before:max-w-5xl before:mx-2 lg:before:mx-auto before:rounded-4xl before:border before:border-gray-200 dark:border-neutral-700 after:absolute after:inset-0 after:-z-1 after:max-w-5xl after:mx-2 lg:after:mx-auto after:rounded-4xl after:bg-white dark:bg-neutral-900 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
<nav class="relative max-w-5xl w-full md:flex md:items-center md:justify-between md:gap-3 ps-5 pe-2 mx-2 lg:mx-auto py-2 dark:bg-neutral-900">
    <!-- Logo w/ Collapse Button -->
    <div class="flex items-center justify-between">
    <a class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80 dark:text-white" href="#" aria-label="Brand">SIMPKL</a>

    <!-- Collapse Button -->
    <div class="md:hidden">
        <button type="button" class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold rounded-full border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-header-classic-collapse" aria-expanded="false" aria-controls="hs-header-classic" aria-label="Toggle navigation" data-hs-collapse="#hs-header-classic">
        <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Toggle navigation</span>
        </button>
    </div>
    <!-- End Collapse Button -->
    </div>
    <!-- End Logo w/ Collapse Button -->

    <!-- Collapse -->
    <div id="hs-header-classic" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-classic-collapse">
    <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
        <a class="p-2 flex items-center text-sm text-blue-600 focus:outline-hidden focus:text-blue-600 dark:text-blue-500 dark:focus:text-blue-500" href="#home" aria-current="page">
            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            Home
        </a>

        <a class="p-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" href="#about-us">
            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            About Us
        </a>

        <a class="p-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" href="#contact">
            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 12h.01"/><path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><path d="M22 13a18.15 18.15 0 0 1-20 0"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
            Contact
        </a>

        <!-- Button Group -->
        <div class="relative flex flex-wrap items-center gap-x-1.5 md:ps-2.5  md:ms-1.5 before:block before:absolute before:top-1/2 before:-start-px before:w-px before:h-4 before:bg-gray-300 before:-translate-y-1/2 dark:before:bg-neutral-700">
            <a class="p-2 w-full flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" href="{{ route('login') }}">
            <svg class="shrink-0 size-4 me-3 md:me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Log in
            </a>
        </div>
        <!-- End Button Group -->
        </div>
    </div>
    </div>
    <!-- End Collapse -->
</nav>
</header>
<!-- ========== END HEADER ========== -->

<!-- Hero -->
<div  id="home"class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Grid -->
  <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
    <div>
      <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">Kelola PKL Lebih Mudah dengan <span class="text-blue-600">SIMPKL</span></h1>
      <p class="mt-3 text-lg text-gray-800 dark:text-neutral-400">SIMPKL adalah aplikasi manajemen Praktik Kerja Lapangan (PKL) yang dirancang untuk mempermudah proses administrasi, monitoring, dan penilaian mahasiswa secara efisien dan transparan.</p>

      <!-- Buttons -->  
      <div class="mt-7 grid gap-3 w-full sm:inline-flex">
        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
          Get started
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
          Contact sales team
        </a>
      </div>
      <!-- End Buttons -->

      <!-- Review -->
      <div class="mt-6 lg:mt-10 grid grid-cols-2 gap-x-5">
        <!-- Review -->
        <div class="py-5">
          <div class="flex gap-x-1">
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
          </div>

          <p class="mt-3 text-sm text-gray-800 dark:text-neutral-200">
            <span class="font-bold">4.6</span> /5 - from 12k reviews
          </p>

          <div class="mt-5">
            <!-- Star -->
            <svg class="h-auto w-16 text-gray-800 dark:text-white" width="80" height="27" viewBox="0 0 80 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.558 9.74046H11.576V12.3752H17.9632C17.6438 16.0878 14.5301 17.7245 11.6159 17.7245C7.86341 17.7245 4.58995 14.7704 4.58995 10.6586C4.58995 6.62669 7.70373 3.51291 11.6159 3.51291C14.6498 3.51291 16.4063 5.42908 16.4063 5.42908L18.2426 3.51291C18.2426 3.51291 15.8474 0.878184 11.4961 0.878184C5.94724 0.838264 1.67578 5.50892 1.67578 10.5788C1.67578 15.5289 5.70772 20.3592 11.6558 20.3592C16.8854 20.3592 20.7177 16.8063 20.7177 11.4969C20.7177 10.3792 20.558 9.74046 20.558 9.74046Z" fill="currentColor"/>
              <path d="M27.8621 7.78442C24.1894 7.78442 21.5547 10.6587 21.5547 14.012C21.5547 17.4451 24.1096 20.3593 27.9419 20.3593C31.415 20.3593 34.2094 17.7645 34.2094 14.0918C34.1695 9.94011 30.896 7.78442 27.8621 7.78442ZM27.902 10.2994C29.6984 10.2994 31.415 11.7764 31.415 14.0918C31.415 16.4072 29.7383 17.8842 27.902 17.8842C25.906 17.8842 24.3491 16.2874 24.3491 14.0519C24.3092 11.8962 25.8661 10.2994 27.902 10.2994Z" fill="currentColor"/>
              <path d="M41.5964 7.78442C37.9238 7.78442 35.2891 10.6587 35.2891 14.012C35.2891 17.4451 37.844 20.3593 41.6763 20.3593C45.1493 20.3593 47.9438 17.7645 47.9438 14.0918C47.9038 9.94011 44.6304 7.78442 41.5964 7.78442ZM41.6364 10.2994C43.4328 10.2994 45.1493 11.7764 45.1493 14.0918C45.1493 16.4072 43.4727 17.8842 41.6364 17.8842C39.6404 17.8842 38.0835 16.2874 38.0835 14.0519C38.0436 11.8962 39.6004 10.2994 41.6364 10.2994Z" fill="currentColor"/>
              <path d="M55.0475 7.82434C51.6543 7.82434 49.0195 10.7784 49.0195 14.0918C49.0195 17.8443 52.0934 20.3992 54.9676 20.3992C56.764 20.3992 57.6822 19.7205 58.4407 18.8822V20.1198C58.4407 22.2754 57.1233 23.5928 55.1273 23.5928C53.2111 23.5928 52.2531 22.1557 51.8938 21.3573L49.4587 22.3553C50.297 24.1517 52.0135 26.0279 55.0874 26.0279C58.4407 26.0279 60.9956 23.9122 60.9956 19.481V8.18362H58.3608V9.26147C57.6423 8.38322 56.5245 7.82434 55.0475 7.82434ZM55.287 10.2994C56.9237 10.2994 58.6403 11.7365 58.6403 14.1317C58.6403 16.6068 56.9636 17.9241 55.2471 17.9241C53.4507 17.9241 51.774 16.4471 51.774 14.1716C51.8139 11.6966 53.5305 10.2994 55.287 10.2994Z" fill="currentColor"/>
              <path d="M72.8136 7.78442C69.62 7.78442 66.9453 10.2994 66.9453 14.0519C66.9453 18.004 69.9393 20.3593 73.093 20.3593C75.7278 20.3593 77.4044 18.8822 78.3625 17.6048L76.1669 16.1277C75.608 17.006 74.6499 17.8443 73.093 17.8443C71.3365 17.8443 70.5381 16.8862 70.0192 15.9281L78.4423 12.4152L78.0032 11.3772C77.1649 9.46107 75.2886 7.78442 72.8136 7.78442ZM72.8934 10.2196C74.0511 10.2196 74.8495 10.8184 75.2487 11.5768L69.6599 13.9321C69.3405 12.0958 71.097 10.2196 72.8934 10.2196Z" fill="currentColor"/>
              <path d="M62.9531 19.9999H65.7076V1.47693H62.9531V19.9999Z" fill="currentColor"/>
            </svg>
            <!-- End Star -->
          </div>
        </div>
        <!-- End Review -->

        <!-- Review -->
        <div class="py-5">
          <div class="flex gap-x-1">
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="size-4 text-gray-800 dark:text-neutral-200" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M49.6867 20.0305C50.2889 19.3946 49.9878 18.1228 49.0846 18.1228L33.7306 15.8972C33.4296 15.8972 33.1285 15.8972 32.8275 15.2613L25.9032 0.317944C25.6021 0 25.3011 0 25 0V42.6046C25 42.6046 25.3011 42.6046 25.6021 42.6046L39.7518 49.9173C40.3539 50.2352 41.5581 49.5994 41.2571 48.6455L38.5476 32.4303C38.5476 32.1124 38.5476 31.7944 38.8486 31.4765L49.6867 20.0305Z" fill="transparent"/>
              <path d="M0.313299 20.0305C-0.288914 19.3946 0.0122427 18.1228 0.915411 18.1228L16.2694 15.8972C16.5704 15.8972 16.8715 15.8972 17.1725 15.2613L24.0968 0.317944C24.3979 0 24.6989 0 25 0V42.6046C25 42.6046 24.6989 42.6046 24.3979 42.6046L10.2482 49.9173C9.64609 50.2352 8.44187 49.5994 8.74292 48.6455L11.4524 32.4303C11.4524 32.1124 11.4524 31.7944 11.1514 31.4765L0.313299 20.0305Z" fill="currentColor"/>
            </svg>
          </div>

          <p class="mt-3 text-sm text-gray-800 dark:text-neutral-200">
            <span class="font-bold">4.8</span> /5 - from 5k reviews
          </p>

          <div class="mt-5">
            <!-- Star -->
            <svg class="h-auto w-16 text-gray-800 dark:text-white" width="110" height="28" viewBox="0 0 110 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M66.6601 8.35107C64.8995 8.35107 63.5167 8.72875 62.1331 9.48265C62.1331 5.4582 62.1331 1.81143 62.2594 0.554199L53.8321 2.06273V2.81736L54.7124 2.94301C55.8433 3.19431 56.2224 3.82257 56.4715 5.33255C56.725 8.35107 56.5979 24.4496 56.4715 27.0912C58.7354 27.5945 61.1257 27.9722 63.5159 27.9722C70.1819 27.9722 74.2064 23.8213 74.2064 17.281C74.2064 12.1249 70.9366 8.35107 66.6601 8.35107ZM63.7672 26.5878C63.2639 26.5878 62.6342 26.5878 62.258 26.4629C62.1316 24.7023 62.0067 17.281 62.1316 10.7413C62.8862 10.4893 63.3888 10.3637 64.0185 10.3637C66.7872 10.3637 68.2965 13.6335 68.2965 17.6572C68.2957 22.6898 66.4088 26.5878 63.7672 26.5878ZM22.1363 1.0568H0V2.18838L1.25796 2.31403C2.89214 2.56533 3.52184 3.57127 3.77242 5.9608C4.15082 10.4886 4.02445 18.6646 3.77242 22.5619C3.52112 24.9522 2.89287 26.0845 1.25796 26.2087L0 26.4615V27.4674H14.2123V26.4615L12.703 26.2087C11.0681 26.0838 10.4392 24.9522 10.1879 22.5619C10.0615 20.9263 9.93583 18.2847 9.93583 15.0156L12.9543 15.1413C14.8413 15.1413 15.7208 16.6505 16.0985 18.7881H17.2308V9.86106H16.0985C15.7201 11.9993 14.8413 13.5078 12.9543 13.5078L9.93655 13.6342C9.93655 9.35773 10.0622 5.33328 10.1886 2.94374H14.59C17.9869 2.94374 19.7475 5.08125 21.0047 8.85513L22.2626 8.47745L22.1363 1.0568Z" fill="currentColor"/>
              <path d="M29.3053 8.09998C35.5944 8.09998 38.7385 12.3764 38.7385 18.0358C38.7385 23.4439 35.2167 27.9731 28.9276 27.9731C22.6393 27.9731 19.4951 23.6959 19.4951 18.0358C19.4951 12.6277 23.0162 8.09998 29.3053 8.09998ZM28.9276 9.35793C26.1604 9.35793 25.4058 13.1311 25.4058 18.0358C25.4058 22.8149 26.6637 26.7137 29.1796 26.7137C32.0703 26.7137 32.8264 22.9405 32.8264 18.0358C32.8264 13.2567 31.5699 9.35793 28.9276 9.35793ZM75.8403 18.1622C75.8403 13.0054 79.1101 8.09998 85.5248 8.09998C90.8057 8.09998 93.3224 11.9995 93.3224 17.1555H81.6253C81.4989 21.8089 83.7628 25.2051 88.2913 25.2051C90.3038 25.2051 91.3098 24.7033 92.5685 23.8223L93.0703 24.4505C91.8124 26.2111 89.0459 27.9731 85.5248 27.9731C79.8647 27.9724 75.8403 23.9479 75.8403 18.1622ZM81.6253 15.7726L87.5366 15.6463C87.5366 13.1311 87.159 9.35793 85.0214 9.35793C82.8839 9.35793 81.7502 12.8791 81.6253 15.7726ZM108.291 9.10663C106.782 8.47693 104.77 8.09998 102.506 8.09998C97.8538 8.09998 94.9594 10.8665 94.9594 14.137C94.9594 17.4075 97.0955 18.7904 100.118 19.7971C103.261 20.9279 104.142 21.8089 104.142 23.3182C104.142 24.8275 103.01 26.2103 100.997 26.2103C98.6084 26.2103 96.8464 24.8275 95.4635 21.0536L94.5825 21.3063L94.7089 26.84C96.2181 27.4683 98.9846 27.9724 101.375 27.9724C106.28 27.9724 109.425 25.4557 109.425 21.5576C109.425 18.9161 108.041 17.4075 104.771 16.1489C101.249 14.766 99.992 13.8857 99.992 12.2501C99.992 10.6152 101.126 9.48286 102.635 9.48286C104.897 9.48286 106.407 10.8665 107.54 14.2627L108.42 14.0114L108.291 9.10663ZM55.0883 8.6033C52.9508 7.3468 49.1769 7.97433 47.1651 12.5028L47.29 8.1007L38.8642 9.73561V10.4902L39.7444 10.6159C40.8775 10.7423 41.3794 11.3705 41.5057 13.0062C41.757 16.0247 41.6314 21.3078 41.5057 23.9486C41.3794 25.4564 40.8775 26.2111 39.7444 26.3374L38.8642 26.4638V27.4697H50.5606V26.4638L49.0513 26.3374C47.7941 26.2111 47.4164 25.4564 47.29 23.9486C47.0387 21.5584 47.0387 16.7793 47.1651 13.7608C47.7933 12.8798 50.5606 12.1259 53.0757 13.7608L55.0883 8.6033Z" fill="currentColor"/>
            </svg>
            <!-- End Star -->
          </div>
        </div>
        <!-- End Review -->
      </div>
      <!-- End Review -->
    </div>
    <!-- End Col -->

    <div class="relative ms-4">
      <img class="w-full rounded-md" src="https://res.cloudinary.com/dlvmuwzun/image/upload/v1760795322/Gemini_Generated_Image_l5ffwgl5ffwgl5ff-removebg-preview_c7ytda.png" alt="Hero Image">
      <div class="absolute inset-0 -z-1 bg-linear-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6 dark:from-neutral-800 dark:via-neutral-900/0 dark:to-neutral-900/0"></div>

      <!-- SVG-->
      <div class="absolute bottom-0 start-0">
        <img src="https://res.cloudinary.com/dlvmuwzun/image/upload/v1760795322/Gemini_Generated_Image_l5ffwgl5ffwgl5ff-removebg-preview_c7ytda.png" alt="" width="630" height="451">
      </div>
      <!-- End SVG-->
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Hero -->

<!-- Testimonials -->
<div class="relative overflow-hidden">
  <div class="max-w-[85rem] px-4 py-12 sm:px-6 lg:px-8 lg:py-16 mx-auto">
    <!-- Gradients -->
    <div aria-hidden="true" class="flex -z-1 absolute start-0">
      <div class="bg-purple-200 opacity-20 blur-3xl w-[1036px] h-75 dark:bg-purple-900 dark:opacity-20"></div>
    </div>
    <!-- End Gradients -->

    <!-- Grid -->
    <div class="lg:grid lg:grid-cols-6 lg:gap-8 lg:items-center">
      <div class="hidden lg:block lg:col-span-2">
        <img class="rounded-xl" src="https://images.unsplash.com/photo-1671726203390-cdc4354ee2eb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Avatar">
      </div>
      <!-- End Col -->

      <div class="lg:col-span-4">
        <!-- Blockquote -->
        <blockquote>
          <img class="w-24 h-auto mb-4" width="2500" height="779" src="https://res.cloudinary.com/dlvmuwzun/image/upload/v1760795322/Gemini_Generated_Image_l5ffwgl5ffwgl5ff-removebg-preview_c7ytda.png" alt="">
          

          <p class="text-xl font-medium text-gray-800 lg:text-2xl lg:leading-normal dark:text-neutral-200">
            Mulai Kelola PKL Sekarang!! Tingkatkan efisiensi dan transparansi manajemen PKL Anda bersama SIMPKL.
          </p>

          <footer class="mt-6">
            <div class="flex items-center">
              <div class="lg:hidden shrink-0">
                <img class="size-12 rounded-full" src="https://images.unsplash.com/photo-1671726203390-cdc4354ee2eb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
              </div>
              <div class="ms-4 lg:ms-0">
                <p class="font-medium text-gray-800 dark:text-neutral-200">
                  SIMPKL — Solusi Cerdas Manajemen PKL
                </p>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                  Otomatisasi proses PKL dari pendaftaran hingga penilaian.
                </p>
              </div>
            </div>
          </footer>
        </blockquote>
        <!-- End Blockquote -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End Testimonials -->

<!-- Icon Blocks -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-2">
    <!-- Icon Block -->
    <a class="group flex flex-col justify-center hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 rounded-xl p-4 md:p-7 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <div class="flex justify-center items-center size-12 bg-blue-600 rounded-xl">
        <svg class="shrink-0 size-6 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="10" height="14" x="3" y="8" rx="2"/><path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"/><path d="M8 18h.01"/></svg>
      </div>
      <div class="mt-5">
        <h3 class="group-hover:text-gray-600 text-lg font-semibold text-gray-800 dark:text-white dark:group-hover:text-gray-400">Manajemen Data Terpusat</h3>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Pantau seluruh aktivitas PKL dalam satu dashboard.</p>
        <span class="mt-2 inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
          Learn more
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
      </div>
    </a>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <a class="group flex flex-col justify-center hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 rounded-xl p-4 md:p-7 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <div class="flex justify-center items-center size-12 bg-blue-600 rounded-xl">
        <svg class="shrink-0 size-6 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
      </div>
      <div class="mt-5">
        <h3 class="group-hover:text-gray-600 text-lg font-semibold text-gray-800 dark:text-white dark:group-hover:text-gray-400">Proses Lebih Cepat</h3>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Otomatisasi pengajuan, validasi, dan laporan PKL</p>
        <span class="mt-2 inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
          Learn more
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
      </div>
    </a>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <a class="group flex flex-col justify-center hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 rounded-xl p-4 md:p-7 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <div class="flex justify-center items-center size-12 bg-blue-600 rounded-xl">
        <svg class="shrink-0 size-6 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
      </div>
      <div class="mt-5">
        <h3 class="group-hover:text-gray-600 text-lg font-semibold text-gray-800 dark:text-white dark:group-hover:text-gray-400">Kolaborasi Efektif</h3>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Dosen, pembimbing, dan mahasiswa terhubung dalam satu sistem.</p>
        <span class="mt-2 inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
          Learn more
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
      </div>
    </a>
    <!-- End Icon Block -->

    <!-- Icon Block -->
    <a class="group flex flex-col justify-center hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 rounded-xl p-4 md:p-7 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      <div class="flex justify-center items-center size-12 bg-blue-600 rounded-xl">
        <svg class="shrink-0 size-6 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
      </div>
      <div class="mt-5">
        <h3 class="group-hover:text-gray-600 text-lg font-semibold text-gray-800 dark:text-white dark:group-hover:text-gray-400">Data Aman & Terjamin</h3>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Disimpan dengan sistem keamanan berbasis web yang andal.</p>
        <span class="mt-2 inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
          Learn more
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
      </div>
    </a>
    <!-- End Icon Block -->
  </div>
</div>
<!-- End Icon Blocks -->

<!-- FAQ -->
<div id="about-us" class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-3xl md:leading-tight text-gray-800 dark:text-neutral-200">
      Frequently Asked Questions
    </h2>
  </div>
  <!-- End Title -->

  <div class="max-w-5xl mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Apa itu SIMPKL?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          SIMPKL (Sistem Informasi Manajemen PKL) adalah aplikasi berbasis web yang membantu perguruan tinggi dalam mengelola seluruh proses Praktik Kerja Lapangan — mulai dari pendaftaran mahasiswa, penempatan, monitoring kegiatan, hingga penilaian akhir.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Siapa saja yang bisa menggunakan SIMPKL?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          SIMPKL dirancang untuk digunakan oleh mahasiswa, dosen pembimbing, pembimbing lapangan, dan admin kampus. Setiap pengguna memiliki akses dan fitur yang disesuaikan dengan perannya masing-masing.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Apa keunggulan SIMPKL dibandingkan sistem manual?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          Dengan SIMPKL, seluruh proses PKL menjadi lebih cepat, efisien, dan transparan. Tidak perlu lagi mengurus dokumen manual — semua data tersimpan rapi secara digital dan dapat diakses kapan saja.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Apakah SIMPKL bisa diintegrasikan dengan sistem akademik kampus?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          Ya. SIMPKL dapat diintegrasikan dengan SIAKAD (Sistem Informasi Akademik) atau platform internal kampus lainnya melalui API, sehingga data mahasiswa dan dosen dapat terhubung secara otomatis.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Apakah data pengguna di SIMPKL aman?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          Sangat aman. SIMPKL menggunakan sistem enkripsi dan autentikasi berbasis role, memastikan hanya pengguna berwenang yang dapat mengakses data tertentu. Backup data juga dilakukan secara berkala.
        </p>
      </div>
      <!-- End Col -->

      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
          Bagaimana cara memulai menggunakan SIMPKL?
        </h3>
        <p class="mt-2 text-gray-600 dark:text-neutral-400">
          Kampus dapat langsung mendaftarkan institusi dan melakukan konfigurasi awal melalui dashboard admin. Setelah itu, mahasiswa dan dosen dapat login menggunakan akun yang sudah terdaftar untuk mulai mengelola kegiatan PKL.
        </p>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End FAQ -->

<!-- Card Blog -->
<div id="contact" class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 sm:items-center gap-8">
    <div class="sm:order-2">
      <div class="relative pt-[50%] sm:pt-[100%] rounded-lg">
        <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
      </div>
    </div>
    <!-- End Col -->

    <div class="sm:order-1">
      <p class="mb-5 inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-neutral-800 dark:text-neutral-200">
        SIMPKL
      </p>

      <h2 class="text-2xl font-bold md:text-3xl lg:text-4xl lg:leading-tight xl:text-5xl xl:leading-tight text-gray-800 dark:text-neutral-200">
        <a class="hover:text-blue-600 focus:outline-hidden focus:text-blue-600 dark:text-neutral-300 dark:hover:text-white dark:focus:text-white" href="#">
          SIMPKL — Solusi Cerdas Manajemen PKL
        </a>
      </h2>

      <!-- Avatar -->
      <div class="mt-6 sm:mt-10 flex items-center">

        <div class="ms-3 sm:ms-4">
          <p class="sm:mb-1 font-semibold text-gray-800 dark:text-neutral-200">
            Kelola PKL Lebih Mudah dengan SIMPKL
          </p>
          <p class="text-xs text-gray-500 dark:text-neutral-500">
            Kelola seluruh proses Praktik Kerja Lapangan dengan mudah, cepat, dan terintegrasi. Dari pendaftaran hingga penilaian, semua dalam satu sistem digital yang efisien dan transparan.
          </p>
        </div>
      </div>
      <!-- End Avatar -->

      <div class="mt-5">
        <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-blue-500" href="#">
          Read more
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      </div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Card Blog -->

<!-- ========== FOOTER ========== -->
<footer class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-[85rem]">
  <div class="py-6 border-t border-gray-200 dark:border-neutral-700">
    <div class="flex flex-wrap justify-between items-center gap-2">
      <div>
        <p class="text-xs text-gray-600 dark:text-neutral-400">
          © 2025 SIMPKL.
        </p>
      </div>
      <!-- End Col -->

      <!-- List -->
      <ul class="flex flex-wrap items-center">
        <li class="inline-block relative pe-4 text-xs last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:rounded-full before:bg-gray-400 dark:text-neutral-500 dark:before:bg-neutral-600">
          <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-hidden focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
            X (Twitter)
          </a>
        </li>
        <li class="inline-block relative pe-4 text-xs last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:rounded-full before:bg-gray-400 dark:text-neutral-500 dark:before:bg-neutral-600">
          <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-hidden focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
            Dribbble
          </a>
        </li>
        <li class="inline-block pe-4 text-xs">
          <a class="text-xs text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-hidden focus:decoration-2 dark:text-neutral-500 dark:hover:text-neutral-400" href="#">
            Github
          </a>
        </li>
      </ul>
      <!-- End List -->
    </div>
  </div>
</footer>
<!-- ========== END FOOTER ========== -->


<!-- JS Implementing Plugins -->

<!-- JS PLUGINS -->
<!-- Required plugins -->
<script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>

<!-- JS THIRD PARTY PLUGINS -->
<!-- Google Analytics. Global site tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B73TDMXKF5"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
    dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-B73TDMXKF5');
    
</script>
</body>
</html>