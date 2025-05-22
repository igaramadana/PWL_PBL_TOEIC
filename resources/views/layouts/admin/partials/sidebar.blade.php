<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 pt-20 w-64 h-screen bg-white border-r border-gray-200 transition-transform -translate-x-full sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="overflow-y-auto px-3 pb-4 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.index') }}" id="menu-dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Data Master Dropdown -->
            <li>
                <button type="button" id="menu-data-master"
                    class="flex items-center p-2 w-full text-base text-gray-900 rounded-lg transition duration-75 cursor-pointer group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-data-master" data-collapse-toggle="dropdown-data-master">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 text-left whitespace-nowrap ms-3 rtl:text-right">Data Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-data-master" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('/mahasiswa') }}" id="menu-mahasiswa"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tendik') }}" id="menu-tendik"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Tendik
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kampus.index') }}" id="menu-kampus"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Kampus
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jurusan.index') }}" id="menu-jurusan"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Jurusan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('prodi.index') }}" id="menu-prodi"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Prodi
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Ujian -->
            <li>
                <a href="#" id="menu-ujian"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Ujian</span>
                </a>
            </li>

            <!-- Verifikasi Pendaftar -->
            <li>
                <a href="#" id="menu-verifikasi"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 12 2 2 5-5m4.5 5.5 1-.938a2 2 0 0 0 .375-2.309L20 5m-2 2-3.5-3.5M2 5l3.5 3.5L5 7l3 3M18 5l-3.5 3.5L14 7l-3 3" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Verifikasi Pendaftar</span>
                </a>
            </li>

            <!-- Pembayaran -->
            <li>
                <a href="#" id="menu-pembayaran"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 12v-1m8 1v-1m-8 4v-1m8 1v-1M3 4h18v9a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V4Zm0 0v9a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V4H3Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Pembayaran</span>
                </a>
            </li>

            <!-- Hasil Ujian -->
            <li>
                <a href="#" id="menu-hasil-ujian"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10V6a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4m0 0a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h4ZM4 9h16v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Hasil Ujian</span>
                </a>
            </li>

            <!-- Setting Roles -->
            <li>
                <a href="#" id="menu-roles"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14v3m4-6V7a3 3 0 1 1 6 0v4M5 11h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Setting Roles</span>
                </a>
            </li>

            <!-- Pengumuman -->
            <li>
                <a href="#" id="menu-pengumuman"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8v1a7 7 0 1 1-14 0V8m0 0a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v0Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Pengumuman</span>
                </a>
            </li>

            <!-- Sign Out -->
            <li>
                <a href="{{ route('logout') }}" id="menu-signout" data-modal-target="popup-signout"
                    data-modal-toggle="popup-signout"
                    class="flex items-center p-2 text-red-700 rounded-lg dark:text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 transition duration-75 dark:text-red-600 group-hover:text-red-600 dark:group-hover:text-red-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

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
            item.classList.remove('bg-gray-100', 'dark:bg-gray-700');
        });

        // Reset dropdown buttons
        document.querySelectorAll('[data-collapse-toggle]').forEach(button => {
            button.classList.remove('bg-gray-100', 'dark:bg-gray-700');
        });

        // Check exact matches first
        let activeFound = false;
        document.querySelectorAll('#logo-sidebar a[id^="menu-"]').forEach(item => {
            if (item.getAttribute('href') === currentPath || item.href === currentUrl) {
                item.classList.add('bg-gray-100', 'dark:bg-gray-700');
                activeFound = true;

                // If this is a dropdown item, highlight the parent button
                if (item.closest('[id^="dropdown-"]')) {
                    const dropdownId = item.closest('ul').id;
                    const button = document.querySelector(`[aria-controls="${dropdownId}"]`);
                    if (button) {
                        button.classList.add('bg-gray-100', 'dark:bg-gray-700');
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
                    item.classList.add('bg-gray-100', 'dark:bg-gray-700');

                    // If this is a dropdown item, highlight the parent button
                    if (item.closest('[id^="dropdown-"]')) {
                        const dropdownId = item.closest('ul').id;
                        const button = document.querySelector(`[aria-controls="${dropdownId}"]`);
                        if (button) {
                            button.classList.add('bg-gray-100', 'dark:bg-gray-700');
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
