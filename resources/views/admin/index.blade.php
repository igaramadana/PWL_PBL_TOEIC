@extends('layouts.admin.app')

@section('content')
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen p-6">
        <x-breadcrumb :pages="[['name' => __('admin_dashboard.title'), 'url' => '/home']]" />

        <!-- Statistik -->
        <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-4" data-aos="fade-right">
            <!-- Card Statistik Total Mahasiswa -->
            <a href="{{ route('admin.mahasiswa.index') }}"
               class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('admin_dashboard.total_students') }}</h2>
                    <div class="p-2 bg-blue-100 rounded-full dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $totalMahasiswa ?? 120 }}</p>
            </a>

            <!-- Card Statistik Total Pendaftaran TOEIC -->
            <a href="{{ route('ujian.index') }}"
               class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('admin_dashboard.total_toeic_registrations') }}</h2>
                    <div class="p-2 bg-purple-100 rounded-full dark:bg-purple-900">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2-1h8a1 1 0 011 1v12a1 1 0 01-1 1H6a1 1 0 01-1-1V4a1 1 0 011-1zm1 3h6v1H7V6zm0 3h6v1H7V9zm0 3h6v1H7v1H7v-1z" />
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $totalPendaftaranToeic ?? 4 }}</p>
            </a>

            <!-- Card Statistik Pendaftar Pending -->
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('admin_dashboard.pending_registrants') }}</h2>
                    <div class="p-2 bg-red-100 rounded-full dark:bg-red-900">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">29</p>
            </div>

            <!-- Card Statistik Pendaftar Approve -->
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('admin_dashboard.approved_registrants') }}</h2>
                    <div class="p-2 bg-green-100 rounded-full dark:bg-green-900">
                        <svg class="w-5 h-5 text-green-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">12</p>
            </div>
        </div>

        <h1 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('admin_dashboard.latest_exam_registration_table') }}</h1>
        <!-- Tabel Responsif -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5" data-aos="fade-down">
            <div class="overflow-hidden col-span-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 whitespace-nowrap sm:px-6 sm:py-3">{{ __('admin_dashboard.table_date') }}</th>
                                <th scope="col" class="px-4 py-3 whitespace-nowrap sm:px-6 sm:py-3">{{ __('admin_dashboard.table_name') }}</th>
                                <th scope="col" class="px-4 py-3 whitespace-nowrap sm:px-6 sm:py-3">{{ __('admin_dashboard.table_email') }}</th>
                                <th scope="col" class="px-4 py-3 whitespace-nowrap sm:px-6 sm:py-3">{{ __('admin_dashboard.table_status') }}</th>
                                <th scope="col" class="px-4 py-3 text-center whitespace-nowrap sm:px-6 sm:py-3">{{ __('admin_dashboard.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data 1 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    19/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Iga Ramadana Sahputra</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">igaramadana@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-sm me-2 dark:bg-yellow-900 dark:text-yellow-300">{{ __('admin_dashboard.status_pending') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 2 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    18/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Ahmad Fauzi</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">ahmadfauzi@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded-sm me-2 dark:bg-green-900 dark:text-green-300">{{ __('admin_dashboard.status_approved') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 3 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    17/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Dewi Lestari</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">dewilestari@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-red-800 bg-red-100 rounded-sm me-2 dark:bg-red-900 dark:text-red-300">{{ __('admin_dashboard.status_rejected') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 4 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    16/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Budi Santoso</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">budisantoso@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-blue-800 bg-blue-100 rounded-sm me-2 dark:bg-blue-900 dark:text-blue-300">{{ __('admin_dashboard.status_verification') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 5 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    15/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Citra Ayu</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">citraayu@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-purple-800 bg-purple-100 rounded-sm me-2 dark:bg-purple-900 dark:text-purple-300">{{ __('admin_dashboard.status_completed') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 6 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    14/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Eko Prasetyo</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">ekoprasetyo@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-sm me-2 dark:bg-yellow-900 dark:text-yellow-300">{{ __('admin_dashboard.status_pending') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data 7 -->
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-6 sm:py-4 dark:text-white">
                                    13/10/2025</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">Fitri</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">fitri@example.com</td>
                                <td class="px-4 py-2 whitespace-nowrap sm:px-6 sm:py-4">
                                    <span class="px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded-sm me-2 dark:bg-green-900 dark:text-green-300">{{ __('admin_dashboard.status_approved') }}</span>
                                </td>
                                <td class="px-4 py-2 text-right whitespace-nowrap sm:px-6 sm:py-4">
                                    <div class="flex justify-center space-x-2">
                                        <button type="button"
                                                class="px-3 py-1.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ __('admin_dashboard.view_button') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center items-center mt-4 mb-2">
                    <a href="#"
                       class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-blue-700 rounded-lg border border-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">{{ __('admin_dashboard.details_button') }}</a>
                </div>
            </div>

            <div class="sticky top-4 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 lg:col-start-5 sm:col-start-2 h-fit">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ __('admin_dashboard.current_time') }}</h2>
                    <div class="p-2 bg-blue-100 rounded-full dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.642L11 8.586V6z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 space-y-1">
                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400" id="current-date"></p>
                    <p class="text-4xl font-bold text-blue-700 dark:text-blue-300" id="current-time"></p>
                </div>
            </div>
        </div>

        <!-- JavaScript for real-time clock -->
        <script>
            function updateClock() {
                const now = new Date();
                const locale = '{{ app()->getLocale() }}'; // Get current locale (en or id)
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    timeZone: 'Asia/Jakarta'
                };

                const dateString = now.toLocaleDateString(locale === 'id' ? 'id-ID' : 'en-US', options);
                const timeString = now.toLocaleTimeString(locale === 'id' ? 'id-ID' : 'en-US', {
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    timeZone: 'Asia/Jakarta'
                });

                document.getElementById('current-date').textContent = dateString;
                document.getElementById('current-time').textContent = timeString;
            }

            // Update clock every second
            updateClock();
            setInterval(updateClock, 1000);
        </script>
    </div>
@endsection