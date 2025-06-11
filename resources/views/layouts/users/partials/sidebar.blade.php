<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 pt-20 w-64 h-screen bg-white border-r border-gray-200 shadow-sm transition-transform -translate-x-full sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="overflow-y-auto px-3 pb-4 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('mahasiswa.index') }}" id="menu-dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">{{ __('sidebar.dashboard') }}</span>
                </a>
            </li>

            <!-- Pendaftaran -->
            <li>
                <a href="{{ route('pendaftaran.index') }}" id="menu-ujian"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM8.5 5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM5 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">{{ __('sidebar.pendaftaran') }}</span>
                </a>
            </li>

            <!-- Hasil Ujian TOEIC -->
            <li>
                <a href="{{ route('mahasiswa.hasil_ujian.index') }}" id="menu-hasil-toeic"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">{{ __('sidebar.hasil_ujian') }}</span>
                </a>
            </li>

            <!-- Pengumuman -->
            <li>
                <a href="{{ route('mahasiswa.pengumuman.index') }}" id="menu-pengumuman"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.133 12.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.933.933 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.391A1.001 1.001 0 1 1 6.854 5.8a7.43 7.43 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 17.146 5.8a1 1 0 0 1 1.471-1.354 9.424 9.424 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">{{ __('sidebar.pengumuman') }}</span>
                </a>
            </li>

            {{-- Settings Profile --}}
            <li>
                <a href="{{ route('mahasiswa.profile') }}" id="menu-profile"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 whitespace-nowrap ms-3">{{ __('sidebar.profile') }}</span>
                </a>
            </li>

            <!-- Sign Out -->
            <li>
                <button type="button" id="menu-signout" data-modal-target="popup-signout"
                    data-modal-toggle="popup-signout"
                    class="flex items-center p-2 w-full text-red-700 rounded-lg dark:text-red-600 hover:bg-red-100 dark:hover:bg-red-900 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 transition duration-75 dark:text-red-600 group-hover:text-red-700 dark:group-hover:text-red-400"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="flex-1 text-left whitespace-nowrap ms-3">{{ __('sidebar.sign_out') }}</span>
                </button>
            </li>
        </ul>
    </div>
</aside>
<!-- Modal konfirmasi sign out -->
<div id="popup-signout" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="inline-flex absolute right-2.5 top-3 justify-center items-center ml-auto w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-signout">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-12 h-12 text-red-600 dark:text-red-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    {{ __('sidebar.confirmationTitle') }}</h3>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mr-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                        {{ __('sidebar.buttonYes') }}
                    </button>
                </form>
                <button data-modal-hide="popup-signout" type="button"
                    class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ __('sidebar.buttonNo') }}</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setActiveMenu();

        // Untuk dropdown yang menggunakan data-collapse-toggle
        const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');
        dropdownButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-collapse-toggle');
                const target = document.getElementById(targetId);
                target.classList.toggle('hidden');

                // Rotate arrow icon
                const arrow = this.querySelector('svg:last-child');
                arrow.classList.toggle('rotate-180');
            });
        });
    });

    function setActiveMenu() {
        const currentPath = window.location.pathname;
        const currentUrl = window.location.href;

        // Reset all menu items
        document.querySelectorAll('#logo-sidebar a').forEach(item => {
            item.classList.remove('bg-blue-500', 'text-white', 'dark:bg-blue-600');
        });

        // Check for detail pages first
        if (currentPath.includes('/mahasiswa/hasil_ujian/') && currentPath !== '/mahasiswa/hasil_ujian') {
            const hasilUjianMenu = document.getElementById('menu-hasil-toeic');
            if (hasilUjianMenu) {
                hasilUjianMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                return;
            }
        }

        if (currentPath.includes('/pendaftaran/') && currentPath !== '/pendaftaran') {
            const pendaftaranMenu = document.getElementById('menu-ujian');
            if (pendaftaranMenu) {
                pendaftaranMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                return;
            }
        }

        // Check exact matches first
        let activeFound = false;
        document.querySelectorAll('#logo-sidebar a[id^="menu-"]').forEach(item => {
            if (item.getAttribute('href') === currentPath || item.href === currentUrl) {
                item.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                activeFound = true;

                // Ubah warna ikon menjadi putih
                const icon = item.querySelector('svg');
                if (icon) {
                    icon.classList.remove('text-gray-500', 'dark:text-gray-400');
                    icon.classList.add('text-white', 'dark:text-white');
                }
            }
        });

        // If no exact match found, check for partial matches
        if (!activeFound) {
            document.querySelectorAll('#logo-sidebar a[id^="menu-"]').forEach(item => {
                const itemPath = new URL(item.href).pathname;
                if (currentPath.startsWith(itemPath) && itemPath !== '/') {
                    item.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');

                    // Ubah warna ikon menjadi putih
                    const icon = item.querySelector('svg');
                    if (icon) {
                        icon.classList.remove('text-gray-500', 'dark:text-gray-400');
                        icon.classList.add('text-white', 'dark:text-white');
                    }
                }
            });
        }
    }

    // Re-run when navigating with Turbolinks or similar
    document.addEventListener('turbolinks:load', setActiveMenu);
    window.addEventListener('load', setActiveMenu);
</script>
