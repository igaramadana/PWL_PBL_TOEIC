@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('pendaftaran.title'), 'url' => '/admin/pendaftaran'],
    ]" />

    <!-- Modal -->
    <div id="tambah-pendaftaran-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full backdrop-blur-sm md:inset-0 h-modal md:h-full bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ __('pendaftaran.addBtn') }}
                    </h3>
                    <button type="button"
                        class="inline-flex items-center p-1.5 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="tambah-pendaftaran-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">{{ __('pendaftaran.Close') }}</span>
                    </button>
                </div>
                <form action="{{ route('ujian.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="nama_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.EnterExamName') }}</label>
                            <input type="text" name="nama_ujian" id="nama_ujian"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ __('pendaftaran.EnterExamName') }}" required>
                        </div>
                        <div>
                            <label for="jadwal_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamSchedule') }}</label>
                            <input type="date" name="jadwal_ujian" id="jadwal_ujian"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                        <div>
                            <label for="waktu_ujian"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamTime') }}</label>
                            <input type="time" name="waktu_ujian" id="waktu_ujian"
                                value="{{ old('waktu_ujian', '09:00') }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                        <div>
                            <label for="kuota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.Quota') }}</label>
                            <input type="number" name="kuota" id="kuota" min="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('pendaftaran.Save') }}
                        </button>
                        <button type="button" data-modal-toggle="tambah-pendaftaran-modal"
                            class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            {{ __('pendaftaran.Cancel') }}
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
        <h1 class="text-gray-900 dark:text-white">{{ __('pendaftaran.title') }} belum tersedia</h1>
    @else
        @foreach ($pendaftaran as $item)
            <div class="mb-2">
                <a href="{{ route('ujian.edit', $item->id) }}"
                    class="block px-4 py-2 max-w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-start">
                        <div
                            class="flex-shrink-0 flex items-center justify-center w-12 h-12 bg-blue-600 rounded-full dark:bg-blue-600 mr-6">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->nama_ujian }}
                            </h5>
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium">{{ __('pendaftaran.ExamSchedule') }}:</span>
                                {{ \Carbon\Carbon::parse($item->jadwal_ujian)->format('d M Y') }}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium">{{ __('pendaftaran.ExamTime') }}:</span>
                                {{ $item->waktu_ujian_display }}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium">{{ __('pendaftaran.Quota') }}:</span> {{ $item->kuota }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
@endsection
