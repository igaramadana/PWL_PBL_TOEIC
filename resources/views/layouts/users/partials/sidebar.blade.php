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
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Pendaftaran -->
            <li>
                <a href="{{ route('pendaftaran.index') }}" id="menu-ujian"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Pendaftaran Ujian</span>
                </a>
            </li>

            <!-- Hasil Ujian TOEIC -->
            <li>
                <a href="{{ route('mahasiswa.hasil_ujian.index') }}" id="menu-hasil-toeic"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
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
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="flex-1 whitespace-nowrap ms-3">Pengumuman</span>
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
                    <span class="flex-1 text-left whitespace-nowrap ms-3">Sign Out</span>
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin keluar
                    dari sistem?</h3>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mr-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                        Ya, keluar
                    </button>
                </form>
                <button data-modal-hide="popup-signout" type="button"
                    class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
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
