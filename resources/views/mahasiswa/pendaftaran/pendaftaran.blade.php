@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[['name' => 'Pendaftaran Ujian', 'url' => '/mahasiswa/pendaftaran']]" />

    @if ($checkRegist)
        <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Anda sudah pernah mendaftar ujian 1x</h1>
            <p class="text-gray-600 dark:text-gray-300">
                Anda tidak dapat mendaftar ujian lagi karena sudah pernah mendaftar sebelumnya. Jika ingin mengikuti ujian
                kembali, silakan daftar melalui jalur ujian mandiri
            </p>
            <div class="mt-4">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Ujian Mandiri</h2>
                <p class="mb-4 text-gray-600 dark:text-gray-300">
                    Untuk Ujian Mandiri, Anda dapat melakukan pendaftaran dan pembayaran melalui ITC.
                    Harga untuk TOEIC Listening and Reading adalah <strong>Rp. 675,000</strong>.
                </p>
                <a href="https://smartcart.id/product/toeic-listening-reading"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Daftar Ujian Mandiri
                </a>
            </div>
        </div>
    @else
        @if ($pendaftaran->isEmpty())
            <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.title') }} belum
                    tersedia</h3>
                <p class="mt-1 text-gray-500 dark:text-gray-400">Silakan tunggu ujian baru dibuka oleh admin.</p>
            </div>
        @else
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($pendaftaran as $item)
                    <div
                        class="relative bg-white rounded-lg shadow-md transition-shadow duration-300 dark:bg-gray-800 hover:shadow-lg">
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            @if ($item->ujian_status === 'Open')
                                <span
                                    class="px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-200">
                                    {{ $item->ujian_status }}
                                </span>
                            @else
                                <span
                                    class="px-2.5 py-0.5 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-200">
                                    {{ $item->ujian_status }}
                                </span>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="flex-shrink-0 mr-4">
                                    <div
                                        class="flex justify-center items-center w-12 h-12 bg-blue-100 rounded-full dark:bg-blue-900">
                                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">{{ $item->nama_ujian }}
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamID') }}:
                                        {{ $item->id }}</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">
                                        {{ \Carbon\Carbon::parse($item->jadwal_ujian)->translatedFormat('l, d F Y') }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">
                                        {{ $item->waktu_ujian_display }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                    </svg>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">
                                        {{ count($item->pendaftar) }} / {{ $item->kuota }}
                                        {{ __('pendaftaran.Participants') }}
                                        <div class="mt-1 w-full h-2.5 bg-gray-200 rounded-full dark:bg-gray-700">
                                            @php
                                                $percentage =
                                                    $item->kuota > 0
                                                        ? min(100, (count($item->pendaftar) / $item->kuota) * 100)
                                                        : 0;
                                            @endphp
                                            <div class="h-2.5 bg-blue-600 rounded-full"
                                                style="width: {{ $percentage }}%"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-6">
                                @if ($item->ujian_status === 'Open')
                                    <a href="{{ route('pendaftaran.detail', $item->id) }}"
                                        class="flex gap-2 justify-center items-center px-4 py-3 w-full text-base font-semibold text-white bg-blue-600 rounded-lg shadow transition-all duration-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ __('pendaftaran.ViewDetails') }}
                                    </a>
                                @else
                                    <div
                                        class="flex flex-col justify-center items-center px-4 py-3 w-full bg-red-50 rounded-lg border border-red-200 dark:bg-red-900 dark:border-red-700">
                                        <span class="text-base font-semibold text-red-700 dark:text-red-200">Ujian Telah
                                            Ditutup</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
@endsection
