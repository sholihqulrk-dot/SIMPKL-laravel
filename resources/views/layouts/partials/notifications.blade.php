@if (session('success') || session('error') || session('warning'))
    @php
        $type = session('success') ? 'success' : (session('error') ? 'error' : 'warning');
        $message = session($type);

        $colors = [
            'success' => 'green',
            'error' => 'red',
            'warning' => 'yellow',
        ];
        $titles = [
            'success' => 'Success!',
            'error' => 'Error!',
            'warning' => 'Warning!',
        ];
        $color = $colors[$type];
        $title = $titles[$type];
    @endphp

    <!-- Toast Container -->
    <div 
        id="toast-container"
        class="fixed top-[5rem] right-5 z-[9999] flex flex-col items-end space-y-3"
    >
        <!-- Toast Notification -->
        <div
            id="toast-notification"
            class="pointer-events-auto opacity-0 translate-y-5 transition-all duration-500 ease-out
                   bg-white border border-gray-200 shadow-2xl rounded-lg dark:bg-neutral-900 dark:border-neutral-800
                   w-full max-w-sm overflow-hidden"
        >
            <div class="flex items-start gap-3 p-4">
                <!-- Icon -->
                <span class="shrink-0 inline-flex justify-center items-center size-9 rounded-full border-4 border-{{ $color }}-50 bg-{{ $color }}-100 text-{{ $color }}-500 dark:bg-{{ $color }}-700 dark:border-{{ $color }}-600 dark:text-{{ $color }}-100">
                    @if ($type === 'success')
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 9.439 6.03 7.97a.75.75 0 0 0-1.06 1.06l2 2z"/>
                        </svg>
                    @elseif ($type === 'error')
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    @else
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM8 4a.905.905 0 0 1 .9.995L8.55 8.5a.55.55 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    @endif
                </span>

                <!-- Text -->
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $title }}</h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">{{ $message }}</p>
                </div>

                <!-- Close Button -->
                <button id="close-toast" type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-neutral-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Progress bar -->
            <div class="relative w-full h-1 bg-gray-200 dark:bg-neutral-700">
                <div id="toast-progress" class="absolute left-0 top-0 h-1 bg-{{ $color }}-500 w-0"></div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toast-notification');
            const progress = document.getElementById('toast-progress');
            const closeBtn = document.getElementById('close-toast');

            // Animasi muncul
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-y-5');
                toast.classList.add('opacity-100', 'translate-y-0');

                // Progress bar jalan
                progress.style.transition = 'width 3s linear';
                progress.style.width = '100%';

                // Auto hide setelah 3 detik
                setTimeout(() => {
                    toast.classList.add('opacity-0', 'translate-y-5');
                    setTimeout(() => toast.remove(), 500);
                }, 3000);
            }, 100);

            // Tutup manual
            closeBtn.addEventListener('click', () => {
                toast.classList.add('opacity-0', 'translate-y-5');
                setTimeout(() => toast.remove(), 500);
            });
        });
    </script>
@endif
