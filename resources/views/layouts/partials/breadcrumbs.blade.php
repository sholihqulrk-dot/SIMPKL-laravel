@php
    use App\Helpers\Breadcrumbs;
    
    $breadcrumbs = Breadcrumbs::generate();
@endphp

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium">
        <!-- Home Icon -->
        <li class="inline-flex items-center">
            <a href="{{ url('/dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-blue-600 dark:text-neutral-400 dark:hover:text-blue-500 transition-colors duration-200">
                <svg class="w-4 h-4 me-1.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Dashboard
            </a>
        </li>

        @if(count($breadcrumbs) > 0)
            @foreach($breadcrumbs as $breadcrumb)
                <!-- Separator -->
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                        
                        @if($breadcrumb['is_active'])
                            <!-- Active Page -->
                            <span class="text-gray-700 dark:text-neutral-300 ms-1 font-medium">
                                {{ $breadcrumb['label'] }}
                            </span>
                        @else
                            <!-- Inactive Link -->
                            <a href="{{ url($breadcrumb['url']) }}" class="text-gray-500 hover:text-blue-600 ms-1 dark:text-neutral-400 dark:hover:text-blue-500 transition-colors duration-200">
                                {{ $breadcrumb['label'] }}
                            </a>
                        @endif
                    </div>
                </li>
            @endforeach
        @else
            <!-- Show only "Dashboard" as active when on main dashboard -->
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                    <span class="text-gray-700 dark:text-neutral-300 ms-1 font-medium">
                        Overview
                    </span>
                </div>
            </li>
        @endif
    </ol>
</nav>