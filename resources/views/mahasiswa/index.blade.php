@extends('layouts.users.app')
@section('content')
    <x-breadcrumb :pages="[['name' => 'Dashboard', 'url' => '/mahasiswa']]" />

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Kolom Profile Card --}}
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"
            data-aos="fade-left">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start mb-6 gap-4">
                <div class="flex items-center">
                    <img src="/img/PolinemaLogo.png" class="h-10 sm:h-12 mr-3 sm:mr-4" alt="Polinema Logo" />
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">UJIAN TOEIC BATCH 1
                        </h2>
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">Politeknik Negeri Malang</p>
                    </div>
                </div>
                <div class="sm:text-right">
                    <span
                        class="bg-green-100 text-green-800 text-xs sm:text-sm font-semibold px-3 py-1 rounded-full dark:bg-green-200 dark:text-green-900">TERDAFTAR</span>
                    <p class="mt-1 sm:mt-2 text-xs text-gray-500 dark:text-gray-400">ID: TOEIC-2024-01234</p>
                </div>
            </div>

            <!-- Divider -->
            <hr class="h-px my-4 sm:my-6 bg-gray-200 border-0 dark:bg-gray-700">

            <!-- Student Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
                <div class="space-y-3 sm:space-y-4">
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">NAMA PESERTA</p>
                        <p class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">Iga Ramadana S.</p>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">NOMOR INDUK
                            MAHASISWA
                        </p>
                        <p class="text-lg sm:text-xl font-mono font-bold text-blue-600 dark:text-blue-400">2141720123
                        </p>
                    </div>
                </div>

                <div class="space-y-3 sm:space-y-4">
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">PROGRAM STUDI</p>
                        <p class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">D4 Sistem Informasi
                            Bisnis</p>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">SEMESTER</p>
                        <p class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">4 (Empat)</p>
                    </div>
                </div>
            </div>

            <!-- Exam Information -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 sm:p-6 rounded-lg mb-6 sm:mb-8">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-3 sm:mb-4 flex items-center">
                    <svg class="w-4 sm:w-5 h-4 sm:h-5 text-gray-800 dark:text-white mr-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z" />
                    </svg>
                    INFORMASI UJIAN
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">TANGGAL</p>
                        <p class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">12 Feb 2024</p>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">WAKTU</p>
                        <p class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">08.00-11.00 WIB</p>
                    </div>
                    <div class="sm:col-span-2 lg:col-span-1">
                        <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">LOKASI</p>
                        <p class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">UPA Bahasa Lt. 3
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    <span class="font-semibold">Catatan:</span> Harap membawa ID Card ini saat ujian beserta kartu
                    identitas asli (KTM/KTP).
                </p>
            </div>
        </div>

        {{-- Kolom Pengumuman --}}
        <div data-aos="fade-right" class="space-y-4">
            @foreach ($pengumuman as $item)
                <a href="#"
                    class="block w-full px-6 py-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M17.133 12.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.933.933 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.391A1.001 1.001 0 1 1 6.854 5.8a7.43 7.43 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 17.146 5.8a1 1 0 0 1 1.471-1.354 9.424 9.424 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>
                        <span class="text-gray-900 dark:text-white ml-1">Pengumuman</span>
                    </div>

                    <h4 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $item->judul }}</h4>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-4">{{ $item->isi }}</p>

                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <div class="flex items-center">
                            <img src="{{ $avatar }}" class="h-6 mr-1 mt-1" alt="Polinema Logo" />
                            <span
                                class="text-gray-900 dark:text-white mt-1">{{ $item->admin->admin_nama ?? 'Admin' }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-gray-900 dark:text-white ml-1">{{ $item->created_at ? $item->created_at->format('D, d M Y | H.i') : 'N/A' }}
                                WIB</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
