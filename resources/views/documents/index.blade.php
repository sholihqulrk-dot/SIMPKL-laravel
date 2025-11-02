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
                Documents
              </h2>
              <p class="text-sm text-gray-600 dark:text-neutral-400">
                Manage student documents, review submissions, and track document status.
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

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none" href="">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <path d="M12 18v-6"/>
                    <path d="M9 15h6"/>
                  </svg>
                  Upload Document
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->

          @if($documents->count() > 0)
          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" data-searchable="true">
            <thead class="bg-gray-50 dark:bg-neutral-900">
              <tr>
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                      Document
                    </span>
                    <div class="hs-tooltip">
                      <div class="hs-tooltip-toggle">
                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10"/>
                          <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                          <path d="M12 17h.01"/>
                        </svg>
                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                          Document title and information
                        </span>
                      </div>
                    </div>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                      Student
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                      Category
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                      Status
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                      Reviewed
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
              @foreach($documents as $document)
              <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      <div class="flex items-center gap-x-3">
                        @php
                          $fileIcon = '';
                          $fileColor = '';
                          $fileExtension = pathinfo($document->filename, PATHINFO_EXTENSION);
                          
                          switch(strtolower($fileExtension)) {
                            case 'pdf':
                              $fileIcon = '📄';
                              $fileColor = 'bg-red-100 text-red-800 dark:bg-red-500/20 dark:text-red-400';
                              break;
                            case 'doc':
                            case 'docx':
                              $fileIcon = '📝';
                              $fileColor = 'bg-teal-100 text-teal-800 dark:bg-teal-500/20 dark:text-teal-400';
                              break;
                            case 'xls':
                            case 'xlsx':
                              $fileIcon = '📊';
                              $fileColor = 'bg-green-100 text-green-800 dark:bg-green-500/20 dark:text-green-400';
                              break;
                            case 'jpg':
                            case 'jpeg':
                            case 'png':
                            case 'gif':
                              $fileIcon = '🖼️';
                              $fileColor = 'bg-purple-100 text-purple-800 dark:bg-purple-500/20 dark:text-purple-400';
                              break;
                            default:
                              $fileIcon = '📎';
                              $fileColor = 'bg-gray-100 text-gray-800 dark:bg-gray-500/20 dark:text-gray-400';
                          }
                        @endphp
                        <div class="size-10 {{ $fileColor }} rounded-lg flex items-center justify-center text-lg">
                          {{ $fileIcon }}
                        </div>
                        <div class="grow">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $document->title }}</span>
                          <span class="block text-xs text-gray-600 dark:text-neutral-400">{{ $document->filename }}</span>
                        </div>
                      </div>
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $document->student->user->name ?? 'N/A' }}</span>
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      @php
                        $categoryColor = '';
                        switch($document->category) {
                          case 'proposal':
                            $categoryColor = 'bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500';
                            break;
                          case 'report':
                            $categoryColor = 'bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-500';
                            break;
                          case 'presentation':
                            $categoryColor = 'bg-purple-100 text-purple-800 dark:bg-purple-500/10 dark:text-purple-500';
                            break;
                          case 'certificate':
                            $categoryColor = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500';
                            break;
                          default:
                            $categoryColor = 'bg-gray-100 text-gray-800 dark:bg-gray-500/10 dark:text-gray-500';
                        }
                      @endphp
                      <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $categoryColor }}">
                        {{ ucfirst($document->category) }}
                      </span>
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      @if($document->status === 'approved')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>
                          Approved
                        </span>
                      @elseif($document->status === 'rejected')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                          </svg>
                          Rejected
                        </span>
                      @elseif($document->status === 'pending_review')
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                          Pending Review
                        </span>
                      @else
                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full dark:bg-gray-500/10 dark:text-gray-500">
                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                          </svg>
                          Draft
                        </span>
                      @endif
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      @if($document->reviewed_at)
                        <span class="text-sm text-gray-600 dark:text-neutral-400">{{ \Carbon\Carbon::parse($document->reviewed_at)->format('d M Y') }}</span>
                        <span class="block text-xs text-gray-500 dark:text-neutral-500">by {{ $document->reviewer->name ?? 'N/A' }}</span>
                      @else
                        <span class="text-sm text-gray-400 dark:text-neutral-500">Not reviewed</span>
                      @endif
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <button type="button" class="block text-start" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-document-modal-{{ $document->id }}" data-hs-overlay="#hs-document-modal-{{ $document->id }}">
                    <span class="block px-6 py-2">
                      <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $document->pklPlacement->company->name ?? 'N/A' }}</span>
                    </span>
                  </button>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5 flex justify-end gap-x-2">
                    @if($document->file_path)
                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-2xs align-middle hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-teal-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                      </svg>
                      Download
                    </a>
                    @endif
                    <a href="" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-2xs align-middle hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-teal-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                      View
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
                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </div>

            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
              No documents found
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
              Upload documents to manage student submissions.
            </p>
            <div>
              <a class="inline-flex items-center gap-x-1 text-sm text-teal-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-teal-500" href="#">
                Learn more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
              </a>
            </div>

            <div class="mt-5 flex flex-col sm:flex-row gap-2">
              <a href="" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                  <polyline points="14 2 14 8 20 8"/>
                </svg>
                Upload document
              </a>
              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                  <polyline points="7 10 12 15 17 10"/>
                  <line x1="12" x2="12" y1="15" y2="3"/>
                </svg>
                Import Documents
              </button>
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