@extends('layouts.app')

@section('title', 'Profile edit')

@section('content')
<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-neutral-200">Edit Profile</h1>
            <p class="text-gray-600 dark:text-neutral-400 mt-1">Update your profile information</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                {{ $user->getRoleDisplayName() }}
            </span>
            <a href="{{ route('profile.index') }}" class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-gray-200 font-semibold text-gray-500 hover:text-white hover:bg-gray-500 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-all text-sm dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600">
                Cancel
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
        <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
            @csrf
            @method('PUT')

            <!-- Account Information Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Account Information
                    </h2>
                </div>

                <div class="sm:col-span-3">
                    <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Full Name
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Email
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Password Change Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Change Password
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400 mt-1">
                        Leave blank if you don't want to change your password
                    </p>
                </div>

                <div class="sm:col-span-3">
                    <label for="password" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        New Password
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <div class="relative">
                        <input id="password" name="password" type="password" 
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Enter new password" autocomplete="new-password">
                        <button type="button" 
                                data-hs-toggle-password='{
                                    "target": "#password"
                                }'
                                class="absolute top-1/2 end-0 -translate-y-1/2 flex items-center justify-center h-8 w-8 rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            <svg class="hs-password-active:hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg class="hs-password-active:block hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                                <line x1="2" x2="22" y1="2" y2="22"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1 dark:text-neutral-400">Minimum 8 characters</p>
                </div>

                <div class="sm:col-span-3">
                    <label for="password_confirmation" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Confirm Password
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" 
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Confirm new password" autocomplete="new-password">
                        <button type="button" 
                                data-hs-toggle-password='{
                                    "target": "#password_confirmation"
                                }'
                                class="absolute top-1/2 end-0 -translate-y-1/2 flex items-center justify-center h-8 w-8 rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            <svg class="hs-password-active:hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg class="hs-password-active:block hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                                <line x1="2" x2="22" y1="2" y2="22"/>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Role-specific Form Sections -->
            @if($user->hasRole('student'))
            <!-- Student Form -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Student Information
                    </h2>
                </div>

                <div class="sm:col-span-3">
                    <label for="nis" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        NIS
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="nis" name="nis" type="text" value="{{ old('nis', $profileData->nis ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" readonly>
                    @error('nis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="class" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Class
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="class" name="class" type="text" value="{{ old('class', $profileData->class ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" readonly>
                    @error('class')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="major" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Major
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="major" name="major" type="text" value="{{ old('major', $profileData->major ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" readonly>
                    @error('major')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Phone
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $profileData->phone ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Address
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <textarea id="address" name="address" rows="3" 
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">{{ old('address', $profileData->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @elseif($user->hasRole('teacher'))
            <!-- Teacher Form -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Teacher Information
                    </h2>
                </div>

                <div class="sm:col-span-3">
                    <label for="nip" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        NIP
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="nip" name="nip" type="text" value="{{ old('nip', $profileData->nip ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Phone
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $profileData->phone ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Address
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <textarea id="address" name="address" rows="3" 
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">{{ old('address', $profileData->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @elseif($user->hasRole('companies'))
            <!-- Company Form -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Company Information
                    </h2>
                </div>

                <div class="sm:col-span-3">
                    <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Company Name
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="name" name="name" type="text" value="{{ old('name', $profileData->name ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="business_field" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Business Field
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="business_field" name="business_field" type="text" value="{{ old('business_field', $profileData->business_field ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('business_field')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="phone" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Phone
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $profileData->phone ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Email
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="email" name="email" type="email" value="{{ old('email', $profileData->email ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="npwp" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        NPWP
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="npwp" name="npwp" type="text" value="{{ old('npwp', $profileData->npwp ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>

                <div class="sm:col-span-3">
                    <label for="established_year" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Established Year
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input id="established_year" name="established_year" type="number" value="{{ old('established_year', $profileData->established_year ?? '') }}" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>

                <div class="sm:col-span-3">
                    <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Address
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <textarea id="address" name="address" rows="3" 
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">{{ old('address', $profileData->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="description" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Description
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <textarea id="description" name="description" rows="3" 
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">{{ old('description', $profileData->description ?? '') }}</textarea>
                </div>
            </div>
            @endif

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end">
                <button type="submit" class="w-full sm:w-auto py-3 px-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
    <!-- End Card -->
</div>

<!-- Custom JavaScript for Password Toggle -->
<script>
    // Initialize Preline UI components
    document.addEventListener('DOMContentLoaded', function() {
        // Preline UI will automatically handle the password toggle
        // with data-hs-toggle-password attribute
        
        // Additional custom validation if needed
        const form = document.getElementById('profileForm');
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            
            // If password is filled but confirmation is empty
            if (password && !passwordConfirmation) {
                e.preventDefault();
                alert('Please confirm your new password');
                document.getElementById('password_confirmation').focus();
                return false;
            }
            
            // If confirmation is filled but password is empty
            if (!password && passwordConfirmation) {
                e.preventDefault();
                alert('Please enter your new password');
                document.getElementById('password').focus();
                return false;
            }
            
            // If both are filled but don't match
            if (password && passwordConfirmation && password !== passwordConfirmation) {
                e.preventDefault();
                alert('Passwords do not match');
                return false;
            }
        });
    });
</script>

@endsection