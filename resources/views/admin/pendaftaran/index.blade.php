@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[['name' => __('pendaftaran.title'), 'url' => '/admin/pendaftaran']]" />

    <!-- Modal -->
    <div id="tambah-pendaftaran-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full backdrop-blur-sm md:inset-0 h-modal md:h-full bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ __('pendaftaran.addBtn') }}
                    </h3>
                    <button type="button"
                        class="inline-flex items-center p-1.5 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="tambah-pendaftaran-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('ujian.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="col-span-2">
                            <label for="nama_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.EnterExamName') }}</label>
                            <input type="text" name="nama_ujian" id="nama_ujian"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('pendaftaran.EnterExamName') }}" required>
                        </div>
                        <div>
                            <label for="jadwal_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamSchedule') }}</label>
                            <input type="date" name="jadwal_ujian" id="jadwal_ujian"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="waktu_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamTime') }}</label>
                            <input type="time" name="waktu_ujian" id="waktu_ujian" value="09:00"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="col-span-2">
                            <label for="kuota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.Quota') }}</label>
                            <input type="number" name="kuota" id="kuota" min="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <input type="hidden" name="ujian_status" value="Open">
                        </div>
                    </div>
                    <div
                        class="flex justify-end items-center p-6 space-x-3 rounded-b border-t border-gray-200 dark:border-gray-700">
                        <button type="button" data-modal-toggle="tambah-pendaftaran-modal"
                            class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            {{ __('pendaftaran.Cancel') }}
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('pendaftaran.Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('pendaftaran.title') }}</h2>
        <button type="button" data-modal-target="tambah-pendaftaran-modal" data-modal-toggle="tambah-pendaftaran-modal"
            class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            {{ __('pendaftaran.addBtn') }}
        </button>
    </div>

    @if ($pendaftaran->isEmpty())
        <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
            <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.title') }} belum tersedia
            </h3>
            <p class="mt-1 text-gray-500 dark:text-gray-400">Silakan tambahkan ujian baru dengan menekan tombol "Tambah
                Ujian" di atas.</p>
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
                                        <div class="h-2.5 bg-blue-600 rounded-full" style="width: {{ $percentage }}%">
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('ujian.detail', $item->id) }}"
                                class="flex gap-2 justify-center items-center px-4 py-3 w-full text-base font-semibold text-white bg-blue-600 rounded-lg shadow transition-all duration-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('pendaftaran.ViewDetails') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
