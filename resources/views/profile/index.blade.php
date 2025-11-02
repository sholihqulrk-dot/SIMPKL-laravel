@extends('layouts.app')

@section('title', 'Profile')

@section('content') 

<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-neutral-200">Profile</h1>
            <p class="text-gray-600 dark:text-neutral-400 mt-1">View your profile information</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                {{ $user->getRoleDisplayName() }}
            </span>
            <a href="{{ route('profile.edit') }}" class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Edit Profile
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
        <!-- User Information Section -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <div class="sm:col-span-12">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Account Information
                </h2>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Full Name
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $user->name }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Email
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $user->email }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Role
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $user->getRoleDisplayName() }}
                </div>
            </div>
        </div>

        <!-- Role-specific Profile Details -->
        @if($user->hasRole('student') && $profileData)
        <!-- Student Profile -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <div class="sm:col-span-12">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Student Information
                </h2>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    NIS
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->nis }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Class
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->class }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Major
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->major }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Phone
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->phone }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Address
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->address }}
                </div>
            </div>
        </div>

        @elseif(($user->hasRole('teacher') || $user->hasRole('admin')) && $profileData)
        <!-- Teacher Profile -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <div class="sm:col-span-12">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Teacher Information
                </h2>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    NIP
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->nip }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Phone
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->phone }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Address
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->address }}
                </div>
            </div>
        </div>

        @elseif($user->hasRole('companies') && $profileData)
        <!-- Company Profile -->
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <div class="sm:col-span-12">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Company Information
                </h2>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Company Name
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->name }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Business Field
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->business_field }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Phone
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->phone }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Email
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->email }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    NPWP
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->npwp ?? '-' }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Established Year
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->established_year ?? '-' }}
                </div>
            </div>

            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Address
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->address }}
                </div>
            </div>

            @if($profileData->description)
            <div class="sm:col-span-3">
                <label class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                    Description
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="py-2 px-3 pe-11 block w-full border border-gray-200 rounded-lg sm:text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    {{ $profileData->description }}
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
    <!-- End Card -->
</div>

@endsection