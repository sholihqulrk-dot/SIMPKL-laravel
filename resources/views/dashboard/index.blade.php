@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@php
    // Pastikan user terautentikasi sebelum ambil data
    $user = auth()->user();
    $role = $user->role_id ?? 'unknown';
    $name = $user->name ?? 'User';
@endphp

<!-- Header -->
<div class="py-3 px-4 flex flex-wrap justify-between items-center gap-2 bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
    <div>
        <h1 class="font-semibold text-xl text-gray-800 dark:text-neutral-200">
            @if ($role === 'student')
                Student Dashboard
            @elseif ($role === 'teacher')
                Teacher Dashboard
            @elseif ($role === 'admin')
                Admin Dashboard
            @elseif ($role === 'companies')
                Company Dashboard
            @else
                Dashboard
            @endif
        </h1>

        <p class="text-sm text-gray-600 dark:text-neutral-400">
            Welcome back, {{ $name }}!
        </p>
    </div>

</div>

<!-- Body -->
<div class="flex-1 overflow-y-auto p-4 space-y-4">
    @if ($role === 'student')
        @include('dashboard.student')
    @elseif ($role === 'teacher')
        @include('dashboard.teacher')
    @elseif ($role === 'admin')
        @include('dashboard.admin') {{-- Buat file admin.blade.php jika perlu, atau gunakan teacher --}}
    @elseif ($role === 'companies')
        @include('dashboard.company')
    @else
        <div class="p-6 bg-red-50 border border-red-200 rounded-lg text-red-800 dark:bg-neutral-800 dark:border-red-700 dark:text-red-400">
            <p><strong>Error:</strong> Role tidak dikenali. Silakan hubungi administrator.</p>
        </div>
    @endif
</div>

@endsection