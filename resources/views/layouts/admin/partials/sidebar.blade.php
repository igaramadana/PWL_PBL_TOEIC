<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 pt-20 w-64 h-screen bg-white border-r border-gray-200 shadow-sm transition-transform -translate-x-full sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="overflow-y-auto px-3 pb-4 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.index') }}" id="menu-dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">{{ __('sidebar.dashboard') }}</span>
                </a>
            </li>

            <!-- Data Master Dropdown -->
            <li>
                <button type="button" id="menu-data-master"
                    class="flex items-center p-2 w-full text-base text-gray-900 rounded-lg transition duration-75 cursor-pointer group hover:bg-blue-500 hover:text-white dark:text-white dark:hover:bg-blue-600"
                    aria-controls="dropdown-data-master" data-collapse-toggle="dropdown-data-master">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm9 13H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span
                        class="flex-1 text-left whitespace-nowrap ms-3 rtl:text-right">{{ __('sidebar.data_master') }}</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-data-master" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('kampus.index') }}" id="menu-kampus"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white dark:text-white dark:hover:bg-blue-600">
                            <svg class="mr-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M10.915 2.345a2 2 0 0 1 2.17 0l7 4.52A2 2 0 0 1 21 8.544V9.5a1.5 1.5 0 0 1-1.5 1.5H19v6h1a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h1v-6h-.5A1.5 1.5 0 0 1 3 9.5v-.955a2 2 0 0 1 .915-1.68l7-4.52ZM17 17v-6h-2v6h2Zm-6-6h2v6h-2v-6Zm-2 6v-6H7v6h2Z"
                                    clip-rule="evenodd" />
                                <path d="M2 21a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z" />
                            </svg>

                            {{ __('sidebar.kampus') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jurusan.index') }}" id="menu-jurusan"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white dark:text-white dark:hover:bg-blue-600">
                            <svg class="mr-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                            </svg>

                            {{ __('sidebar.jurusan') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('prodi.index') }}" id="menu-prodi"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white dark:text-white dark:hover:bg-blue-600">
                            <svg class="mr-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                            </svg>

                            {{ __('sidebar.prodi') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mahasiswa.index') }}" id="menu-mahasiswa"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-blue-500 hover:text-white dark:text-white dark:hover:bg-blue-600">
                            <svg class="mr-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.4472 2.10557c-.2815-.14076-.6129-.14076-.8944 0L5.90482 4.92956l.37762.11119c.01131.00333.02257.00687.03376.0106L12 6.94594l5.6808-1.89361.3927-.13363-5.6263-2.81313ZM5 10V6.74803l.70053.20628L7 7.38747V10c0 .5523-.44772 1-1 1s-1-.4477-1-1Zm3-1c0-.42413.06601-.83285.18832-1.21643l3.49538 1.16514c.2053.06842.4272.06842.6325 0l3.4955-1.16514C15.934 8.16715 16 8.57587 16 9c0 2.2091-1.7909 4-4 4-2.20914 0-4-1.7909-4-4Z" />
                                <path
                                    d="M14.2996 13.2767c.2332-.2289.5636-.3294.8847-.2692C17.379 13.4191 19 15.4884 19 17.6488v2.1525c0 1.2289-1.0315 2.1428-2.2 2.1428H7.2c-1.16849 0-2.2-.9139-2.2-2.1428v-2.1525c0-2.1409 1.59079-4.1893 3.75163-4.6288.32214-.0655.65589.0315.89274.2595l2.34883 2.2606 2.3064-2.2634Z" />
                            </svg>

                            {{ __('sidebar.mahasiswa') }}
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pendaftaran -->
            <li>
                <a href="{{ route('ujian.index') }}" id="menu-ujian"
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
                <a href="{{ route('ujian_hasil.index') }}" id="menu-hasil-toeic"
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
                <a href="{{ route('pengumuman.index') }}" id="menu-pengumuman"
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
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
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

        // Reset dropdown buttons
        document.querySelectorAll('[data-collapse-toggle]').forEach(button => {
            button.classList.remove('bg-blue-500', 'text-white', 'dark:bg-blue-600');
        });

        // Check for detail pages first
        if (currentPath.includes('/admin/mahasiswa/') && currentPath !== '/admin/mahasiswa') {
            const mahasiswaMenu = document.getElementById('menu-mahasiswa');
            if (mahasiswaMenu) {
                mahasiswaMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                // Highlight parent dropdown
                const dataMasterButton = document.getElementById('menu-data-master');
                if (dataMasterButton) {
                    dataMasterButton.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                    document.getElementById('dropdown-data-master').classList.remove('hidden');
                }
                return;
            }
        }

        // Check for Detail pages pendaftaran Ujian
        if (currentPath.includes('/admin/ujian/') && currentPath !== '/admin/ujian') {
            const pendaftaranMenu = document.getElementById('menu-ujian');
            if (pendaftaranMenu) {
                pendaftaranMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                return;
            }
        }

        // Check for Detail pages hasil Ujian
        if (currentPath.includes('/admin/ujian_hasil/') && currentPath !== '/admin/ujian_hasil') {
            const hasilUjianMenu = document.getElementById('menu-hasil-toeic');
            if (hasilUjianMenu) {
                hasilUjianMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
                return;
            }
        }

        // Check for edit pages first
        if (currentPath.includes('/admin/pengumuman') && currentPath !== '/admin/pengumuman') {
            const pengumumanMenu = document.getElementById('menu-pengumuman');
            if (pengumumanMenu) {
                pengumumanMenu.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');
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

                // If this is a dropdown item, highlight the parent button
                if (item.closest('[id^="dropdown-"]')) {
                    const dropdownId = item.closest('ul').id;
                    const button = document.querySelector(`[aria-controls="${dropdownId}"]`);
                    if (button) {
                        button.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');

                        // Ubah warna ikon dropdown menjadi putih
                        const buttonIcon = button.querySelector('svg');
                        if (buttonIcon) {
                            buttonIcon.classList.remove('text-gray-500', 'dark:text-gray-400');
                            buttonIcon.classList.add('text-white', 'dark:text-white');
                        }

                        // Ensure dropdown is visible
                        document.getElementById(dropdownId).classList.remove('hidden');
                    }
                }
            }
        });

        // If no exact match found, check for partial matches (useful for Laravel routes with parameters)
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

                    // If this is a dropdown item, highlight the parent button
                    if (item.closest('[id^="dropdown-"]')) {
                        const dropdownId = item.closest('ul').id;
                        const button = document.querySelector(`[aria-controls="${dropdownId}"]`);
                        if (button) {
                            button.classList.add('bg-blue-500', 'text-white', 'dark:bg-blue-600');

                            // Ubah warna ikon dropdown menjadi putih
                            const buttonIcon = button.querySelector('svg');
                            if (buttonIcon) {
                                buttonIcon.classList.remove('text-gray-500', 'dark:text-gray-400');
                                buttonIcon.classList.add('text-white', 'dark:text-white');
                            }

                            // Ensure dropdown is visible
                            document.getElementById(dropdownId).classList.remove('hidden');
                        }
                    }
                }
            });
        }
    }

    // Re-run when navigating with Turbolinks or similar
    document.addEventListener('turbolinks:load', setActiveMenu);
    window.addEventListener('load', setActiveMenu);
</script>
