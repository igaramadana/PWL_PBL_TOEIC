@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('ujian_hasil.title'), 'url' => '/admin/ujian_hasil'],
        ['name' => 'Detail Hasil Ujian', 'url' => '#'],
    ]" />

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Detail Hasil Ujian</h2>
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.EnterExamName') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $ujianHasil->nama_ujian }}</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.ExamSchedule') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($ujianHasil->jadwal_ujian)->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.ExamTime') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $ujianHasil->waktu_ujian_display }}</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.Quota') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ count($ujianHasil->pendaftar) }}/{{ $ujianHasil->kuota }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.Status') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $ujianHasil->status === 'Sudah Dilaksanakan' ? __('ujian_hasil.StatusOptions.Held') : __('ujian_hasil.StatusOptions.NotHeld') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Registrants</h3>
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-4">
                <select id="period" class="block p-2.5 w-48 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected>Select a period</option>
                    <option value="1">Last 7 Days</option>
                    <option value="2">Last 30 Days</option>
                    <option value="3">All Time</option>
                </select>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0 0 4-4m-4 4H9m-7 0a7 7 0 1 1 14 0 7 7 0 0 1-14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="search" class="block p-2.5 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search...">
                </div>
            </div>
        </div>
        @if ($ujianHasil->pendaftar->isEmpty())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Pendaftaran ID</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Jurusan</th>
                            <th scope="col" class="px-6 py-3">Tanggal Ujian</th>
                            <th scope="col" class="px-6 py-3">Skor Listening</th>
                            <th scope="col" class="px-6 py-3">Skor Reading</th>
                            <th scope="col" class="px-6 py-3">Total Skor</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="9" class="px-6 py-4 text-center">No records found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <p class="text-sm text-gray-500 dark:text-gray-400">Showing 0 to 0 of 0 Results</p>
            </div>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Pendaftaran ID</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Jurusan</th>
                            <th scope="col" class="px-6 py-3">Tanggal Ujian</th>
                            <th scope="col" class="px-6 py-3">Skor Listening</th>
                            <th scope="col" class="px-6 py-3">Skor Reading</th>
                            <th scope="col" class="px-6 py-3">Total Skor</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ujianHasil->pendaftar as $pendaftar)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $pendaftar->id }}</td>
                                <td class="px-6 py-4">{{ $pendaftar->pendaftaran_id ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $pendaftar->user->nama_lengkap ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $pendaftar->jurusan->nama_jurusan ?? '-' }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($ujianHasil->jadwal_ujian)->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $pendaftar->skor_listening ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $pendaftar->skor_reading ?? '-' }}</td>
                                <td class="px-6 py-4">{{ ($pendaftar->skor_listening ?? 0) + ($pendaftar->skor_reading ?? 0) }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.mahasiswa.detail', $pendaftar->user_id) }}"
                                        class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('ujian_hasil.View') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div>
                    <select id="entries" class="block p-2.5 w-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Showing 1 to {{ $ujianHasil->pendaftar->count() }} of {{ $ujianHasil->pendaftar->count() }} Results</p>
            </div>
        @endif
    </div>
@endsection