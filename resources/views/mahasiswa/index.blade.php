@extends('layouts.users.app')
@section('content')
    <x-breadcrumb :pages="[['name' => 'Dashboard', 'url' => '/mahasiswa']]" />

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        {{-- Kolom Profile Card --}}
        @if ($mahasiswa && $mahasiswa->daftar_ujian && $pendaftaran && $ujian)
            {{-- Tampilkan kartu ujian jika sudah terdaftar --}}
            <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700"
                data-aos="fade-left">
                <!-- Header Section -->
                <div class="flex flex-col gap-4 justify-between items-start mb-6 sm:flex-row">
                    <div class="flex items-center">
                        <img src="/img/PolinemaLogo.png" class="mr-3 h-10 sm:h-12 sm:mr-4" alt="Polinema Logo" />
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 sm:text-2xl dark:text-white">{{ $ujian->nama_ujian }}
                            </h2>
                            <p class="text-xs text-gray-500 sm:text-sm dark:text-gray-400">Politeknik Negeri Malang</p>
                        </div>
                    </div>
                    <div class="sm:text-right">
                        <span
                            class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full sm:text-sm dark:bg-green-200 dark:text-green-900">
                            {{ strtoupper($pendaftaran->status) }}
                        </span>
                        <p class="mt-1 text-xs text-gray-500 sm:mt-2 dark:text-gray-400">ID:
                            {{ $pendaftaran->no_pendaftaran }}</p>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="my-4 h-px bg-gray-200 border-0 sm:my-6 dark:bg-gray-700">

                <!-- Student Information -->
                <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2 sm:gap-6 sm:mb-8">
                    <div class="space-y-3 sm:space-y-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">NAMA PESERTA</p>
                            <p class="text-lg font-bold text-gray-900 sm:text-xl dark:text-white">
                                {{ $mahasiswa->mahasiswa_nama }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">NOMOR INDUK MAHASISWA
                            </p>
                            <p class="font-mono text-lg font-bold text-blue-600 sm:text-xl dark:text-blue-400">
                                {{ $mahasiswa->nim }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">PROGRAM STUDI</p>
                            <p class="text-base font-semibold text-gray-900 sm:text-lg dark:text-white">
                                {{ $mahasiswa->prodi->prodi_nama ?? 'Belum diisi' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">SEMESTER</p>
                            <p class="text-base font-semibold text-gray-900 sm:text-lg dark:text-white">
                                {{ $mahasiswa->semester ?? 'Belum diisi' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Exam Information -->
                <div class="p-4 mb-6 bg-gray-50 rounded-lg dark:bg-gray-700 sm:p-6 sm:mb-8">
                    <h3
                        class="flex items-center mb-3 text-base font-semibold text-gray-900 sm:text-lg dark:text-white sm:mb-4">
                        <svg class="mr-2 w-4 h-4 text-gray-800 sm:w-5 sm:h-5 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z" />
                        </svg>
                        INFORMASI UJIAN
                    </h3>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">TANGGAL</p>
                            <p class="text-base font-semibold text-gray-900 sm:text-lg dark:text-white">
                                {{ \Carbon\Carbon::parse($ujian->tanggal_ujian)->translatedFormat('d F Y') }}
                                {{-- {{ $ujian->tanggal_ujian->format('d M Y') }}</p> --}}
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">WAKTU</p>
                            <p class="text-base font-semibold text-gray-900 sm:text-lg dark:text-white">
                                {{ \Carbon\Carbon::parse($ujian->waktu_ujian)->translatedFormat('h:i') }} WIB</p>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1">
                            <p class="text-xs font-medium text-gray-500 sm:text-sm dark:text-gray-400">Kuota</p>
                            <p class="text-base font-semibold text-gray-900 sm:text-lg dark:text-white">
                                {{ $ujian->kuota }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Note -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Catatan:</span> Harap membawa ID Card ini saat ujian beserta kartu
                        identitas asli (KTM/KTP).
                    </p>
                </div>
            </div>
        @else
            {{-- Tampilkan card informasi belum mendaftar --}}
            <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700"
                data-aos="fade-left">
                <!-- Header Section -->
                <div class="flex flex-col gap-4 justify-between items-start mb-6 sm:flex-row">
                    <div class="flex items-center">
                        <img src="/img/PolinemaLogo.png" class="mr-3 h-10 sm:h-12 sm:mr-4" alt="Polinema Logo" />
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 sm:text-2xl dark:text-white">Pendaftaran Ujian</h2>
                            <p class="text-xs text-gray-500 sm:text-sm dark:text-gray-400">Politeknik Negeri Malang</p>
                        </div>
                    </div>
                    <div class="sm:text-right">
                        <span
                            class="px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full sm:text-sm dark:bg-red-200 dark:text-red-900">BELUM
                            TERDAFTAR</span>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="my-4 h-px bg-gray-200 border-0 sm:my-6 dark:bg-gray-700">

                <!-- Information Content -->
                <div class="mb-6 space-y-4 sm:mb-8">
                    <div class="p-4 bg-blue-50 rounded-lg dark:bg-blue-900/30">
                        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Anda belum mendaftar ujian</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Silakan mendaftar ujian terlebih dahulu untuk mendapatkan kartu ujian dan informasi lengkap.
                        </p>
                    </div>

                    <div class="p-4 bg-yellow-50 rounded-lg dark:bg-green-500/30">
                        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Persyaratan Pendaftaran</h3>
                        <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                            <li>Isi formulir pendaftaran dengan lengkap</li>
                            <li>Upload foto KTP dan KTM yang valid</li>
                            <li>Upload pas foto terbaru</li>
                            <li>Pastikan data diri sudah benar</li>
                        </ul>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('pendaftaran.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Daftar Ujian Sekarang
                        <svg class="w-3.5 h-3.5 rtl:rotate-180 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endif

        {{-- Kolom Pengumuman --}}
        <div data-aos="fade-right" class="space-y-4">
            @foreach ($pengumuman as $item)
                <a href="#"
                    class="block px-6 py-4 w-full bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M17.133 12.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.933.933 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.391A1.001 1.001 0 1 1 6.854 5.8a7.43 7.43 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 17.146 5.8a1 1 0 0 1 1.471-1.354 9.424 9.424 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>
                        <span class="ml-1 text-gray-900 dark:text-white">Pengumuman</span>
                    </div>

                    <h4 class="mb-2 text-xl font-bold tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ $item->judul }}</h4>
                    <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">{{ $item->isi }}</p>

                    <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="flex flex-col gap-2 justify-between items-start sm:flex-row sm:items-center">
                        <div class="flex items-center">
                            <img src="{{ $avatar }}" class="mt-1 mr-1 h-6" alt="Polinema Logo" />
                            <span
                                class="mt-1 text-gray-900 dark:text-white">{{ $item->admin->admin_nama ?? 'Admin' }}</span>
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
                                class="ml-1 text-gray-900 dark:text-white">{{ $item->created_at ? $item->created_at->format('D, d M Y | H.i') : 'N/A' }}
                                WIB</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
