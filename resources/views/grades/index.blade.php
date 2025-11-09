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
                Grades
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Manage student grades, provide feedback, and track academic performance.
            </p>
            </div>

            <div>
            <div class="inline-flex gap-x-2">

                <!-- Export Dropdown -->
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                    Export
                </button>
                </div>
                <!-- End Export Dropdown -->

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none" href="">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Add Grade
                </a>
            </div>
            </div>
        </div>
        <!-- End Header -->

        @if($grades->count() > 0)
        <!-- Table -->
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" data-searchable="true">
            <thead class="bg-gray-50 dark:bg-neutral-900">
            <tr>
                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Student
                    </span>
                    <div class="hs-tooltip">
                    <div class="hs-tooltip-toggle">
                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                        Student information
                        </span>
                    </div>
                    </div>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Teacher
                    </span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Score
                    </span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Grade
                    </span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Feedback
                    </span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                    Placement
                    </span>
                </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach($grades as $grade)
            <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    <div class="flex items-center gap-x-3">
                        <div class="size-8 bg-red-100 rounded-full flex items-center justify-center dark:bg-red-500/20">
                        <span class="text-sm font-medium text-red-800 dark:text-red-400">
                            {{ substr($grade->student->user->name ?? 'N/A', 0, 1) }}
                        </span>
                        </div>
                        <div class="grow">
                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $grade->student->user->name ?? 'N/A' }}</span>
                        <span class="block text-xs text-gray-600 dark:text-neutral-400">{{ $grade->student->ni ?? 'N/A' }}</span>
                        </div>
                    </div>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $grade->teacher->name ?? 'N/A' }}</span>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    <span class="text-2xl font-bold 
                        @if($grade->score >= 85) text-green-600 dark:text-green-400
                        @elseif($grade->score >= 70) text-red-600 dark:text-red-400
                        @elseif($grade->score >= 60) text-yellow-600 dark:text-yellow-400
                        @else text-red-600 dark:text-red-400
                        @endif">
                        {{ $grade->score }}
                    </span>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    @php
                        $gradeLetter = '';
                        $gradeColor = '';
                        if ($grade->score >= 85) {
                            $gradeLetter = 'A';
                            $gradeColor = 'bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-500';
                        } elseif ($grade->score >= 70) {
                            $gradeLetter = 'B';
                            $gradeColor = 'bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500';
                        } elseif ($grade->score >= 60) {
                            $gradeLetter = 'C';
                            $gradeColor = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500';
                        } else {
                            $gradeLetter = 'D';
                            $gradeColor = 'bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500';
                        }
                    @endphp
                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $gradeColor }}">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                        {{ $gradeLetter }}
                    </span>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ Str::limit($grade->feedback, 30) ?: 'No feedback' }}
                    </span>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-grade-modal-{{ $grade->id }}" data-hs-overlay="#hs-grade-modal-{{ $grade->id }}">
                    <span class="block px-6 py-2">
                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ $grade->company->name ?? 'N/A' }}
                    </span>
                    </span>
                </button>
                </td>
                <td class="size-px whitespace-nowrap">
                <div class="px-6 py-1.5 flex justify-end gap-x-2">
                    <a href="" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-2xs align-middle hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-red-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    View
                    </a>
                    <a href="" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-2xs align-middle hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-red-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    Edit
                    </a>
                </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- End Table -->

        @else
        <!-- No Data State -->
        <div class="max-w-sm w-full min-h-100 flex flex-col justify-center mx-auto px-6 py-4">
            <div class="flex justify-center items-center size-11 bg-gray-100 rounded-lg dark:bg-neutral-800">
            <svg class="shrink-0 size-6 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
            </div>

            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
            No grades found
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
            Add grades to track student academic performance.
            </p>
            <div>
            <a class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-red-500" href="#">
                Learn more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
            </div>
        </div>
        <!-- End No Data State -->

        @endif
        </div>
    </div>
    </div>
</div>
<!-- End Card -->
</div>
<!-- End Table Section -->
@endsection