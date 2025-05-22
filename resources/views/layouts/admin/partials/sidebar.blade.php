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
                        <a href="#" id="menu-prodi"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Prodi
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/mahasiswa') }}" id="menu-mahasiswa"
                            class="flex items-center p-2 pl-11 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Data Mahasiswa
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pendaftaran -->
            <li>
                <a href="#" id="menu-pendaftaran"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Pendaftaran</span>
                </a>
            </li>

            <!-- Hasil Ujian TOEIC -->
            <li>
                <a href="#" id="menu-hasil-toeic"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Hasil Ujian TOEIC</span>
                </a>
            </li>

            <!-- Pengumuman -->
            <li>
                <a href="#" id="menu-pengumuman"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
                    const button = document.querySelector([aria-controls="${dropdownId}"]);
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
                        const button = document.querySelector([aria-controls="${dropdownId}"]);
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