@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('tendik.title'), 'url' => '/admin/tendik'],
        ['name' => __('tendik.detailTitle'), 'url' => '/admin/tendik'],
    ]" />

    <div
        class="p-6 bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg border border-gray-700 shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">{{ __('tendik.detailHeader') }}</h2>
            <span class="px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-full">NIP: {{ $tendik->nip }}</span>
        </div>

        <div class="flex flex-col gap-8 md:flex-row">
            <!-- Profile Photo Section -->
            <div class="flex flex-col items-center w-full md:w-1/3">
                <div class="relative mb-6 group">
                    @if ($tendik->user->foto_profile)
                        <img src="{{ asset($tendik->user->foto_profile) }}"
                            class="object-cover w-32 h-32 rounded-full border-4 border-blue-500 shadow-lg transition-transform duration-300 group-hover:scale-105"
                            alt="Profile Photo">
                    @else
                        <div>
                            <img src="{{ $avatar }}" style="width: 140px; height: auto;" alt="">
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

                <h3 class="mb-1 text-xl font-bold text-white">{{ $tendik->tendik_nama }}</h3>
                <p class="mb-4 text-sm text-gray-300">Tenaga Pendidik</p>

                <div
                    class="flex justify-center p-4 w-full max-w-xs rounded-lg border border-gray-600 backdrop-blur-sm bg-gray-700/50">
                    <div class="flex items-center mb-4">
                        <svg class="mr-2 w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-300">Email: {{ $tendik->user->email }}</span>
                    </div>

                    <div class="flex items-center mb-4">
                        <svg class="mr-2 w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-300">Telepon:
                            {{ $tendik->no_telp ?: 'Tidak tersedia' }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-2/3">
                <div class="p-6 rounded-lg border border-gray-600 backdrop-blur-sm bg-gray-700/30">
                    <h3 class="pb-2 mb-4 text-lg font-semibold text-white border-b border-gray-600">Informasi Detail</h3>

                    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                        <!-- Full Name -->
                        <div class="group">
                            <label for="fullname"
                                class="block mb-2 text-sm font-medium text-gray-300 transition-colors duration-300 group-hover:text-blue-400">{{ __('tendik.formNama') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 transition-colors duration-300 group-hover:text-blue-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="fullname"
                                    class="block p-2.5 pl-10 w-full text-sm text-white bg-gray-800 rounded-lg border border-gray-600 transition-colors duration-300 focus:ring-blue-500 focus:border-blue-500 group-hover:border-blue-400"
                                    value="{{ $tendik->tendik_nama }}" disabled>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="group">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-300 transition-colors duration-300 group-hover:text-blue-400">Email</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 transition-colors duration-300 group-hover:text-blue-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="email" id="email"
                                    class="block p-2.5 pl-10 w-full text-sm text-white bg-gray-800 rounded-lg border border-gray-600 transition-colors duration-300 focus:ring-blue-500 focus:border-blue-500 group-hover:border-blue-400"
                                    value="{{ $tendik->user->email }}" disabled>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="group">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-300 transition-colors duration-300 group-hover:text-blue-400">{{ __('tendik.formPhone') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 transition-colors duration-300 group-hover:text-blue-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="tel" id="phone"
                                    class="block p-2.5 pl-10 w-full text-sm text-white bg-gray-800 rounded-lg border border-gray-600 transition-colors duration-300 focus:ring-blue-500 focus:border-blue-500 group-hover:border-blue-400"
                                    value="{{ $tendik->no_telp }}" disabled>
                            </div>
                        </div>

                        <!-- Kampus -->
                        <div class="group">
                            <label for="kampus"
                                class="block mb-2 text-sm font-medium text-gray-300 transition-colors duration-300 group-hover:text-blue-400">{{ __('tendik.formCampus') }}</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 transition-colors duration-300 group-hover:text-blue-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" id="kampus"
                                    class="block p-2.5 pl-10 w-full text-sm text-white bg-gray-800 rounded-lg border border-gray-600 transition-colors duration-300 focus:ring-blue-500 focus:border-blue-500 group-hover:border-blue-400"
                                    value="{{ $tendik->kampus->kampus_nama }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{ route('admin.tendik.index') }}"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-lg transition-all duration-300 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 hover:shadow-blue-500/30">
                            <div class="flex items-center">
                                <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                {{ __('tendik.backButton') }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
