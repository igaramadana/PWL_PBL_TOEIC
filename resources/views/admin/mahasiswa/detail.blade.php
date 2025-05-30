@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => __('Data Master'), 'url' => '/admin'],
        ['name' => __('Students Data'), 'url' => '/admin/mahasiswa'],
        ['name' => __('Student Detail'), 'url' => '#'],
    ]" />

    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('mahasiswa.Student Detail') }}</h2>
            <span class="px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-full">{{ __('mahasiswa.NIM') }}:
                {{ $mahasiswa_nim }}</span>
        </div>

        <div class="flex flex-col gap-8 md:flex-row">
            <!-- Profile Photo Section -->
            <div class="flex flex-col items-center w-full md:w-1/3">
                <div class="relative mb-6 group">
                    @if ($mahasiswa_foto_profile)
                        <img src="{{ asset($mahasiswa_foto_profile) }}"
                            class="object-cover w-32 h-32 rounded-full border-4 border-blue-500 shadow-lg transition-transform duration-300 group-hover:scale-105"
                            alt="Profile Photo">
                    @elseif($avatar)
                        <img src="{{ $avatar }}" class="w-32 h-32 rounded-full border-4 border-blue-500"
                            alt="Generated Avatar">
                    @else
                        <div
                            class="flex justify-center items-center w-32 h-32 bg-gray-200 rounded-full border-4 border-blue-500 dark:bg-gray-700">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    @endif
                    <div
                        class="flex absolute -right-2 -bottom-2 justify-center items-center w-10 h-10 bg-blue-600 rounded-full border-2 border-white shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>

                <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">{{ $mahasiswa_nama }}</h3>
                <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">Mahasiswa</p>

                <div class="p-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    <div class="flex items-center mb-4">
                        <svg class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span
                            class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $mahasiswa_email ?? 'Email tidak tersedia' }}</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <svg class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span
                            class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $mahasiswa_no_telp ?: 'Telepon tidak tersedia' }}</span>
                    </div>

                    <div class="flex items-center">
                        <svg class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ $mahasiswa_status }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-2/3">
                <div class="p-6 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                    <h3
                        class="pb-2 mb-4 text-lg font-semibold text-gray-900 border-b border-gray-200 dark:text-white dark:border-gray-600">
                        {{ __('mahasiswa.Detail Information') }}
                    </h3>

                    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                        <!-- Nama Lengkap -->
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('mahasiswa.Nama Lengkap') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $mahasiswa_nama }}" disabled>
                            </div>
                        </div>

                        <!-- NIM -->
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('mahasiswa.NIM') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $mahasiswa_nim }}" disabled>
                            </div>
                        </div>

                        <!-- Program Studi -->
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('mahasiswa.Program Studi') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $mahasiswa_prodi }}" disabled>
                            </div>
                        </div>

                        <!-- Angkatan -->
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('mahasiswa.Angkatan') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $mahasiswa_angkatan ?? 'Data angkatan tidak tersedia' }}" disabled>
                            </div>
                        </div>

                        <!-- Status Daftar Ujian -->
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('mahasiswa.Status Daftar Ujian') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2.5 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $mahasiswa_daftar_ujian }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{ route('admin.mahasiswa.index') }}"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            {{ __('mahasiswa.Back to List') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
