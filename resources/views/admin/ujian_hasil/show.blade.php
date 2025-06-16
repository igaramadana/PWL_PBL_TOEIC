@extends('layouts.admin.app')
@section('content')
<x-breadcrumb :pages="[
        ['name' => __('ujian_hasil.title'), 'url' => '/admin/ujian_hasil'],
        ['name' => __('ujian_hasil.editTitle'), 'url' => '#'],
    ]" />

<div class="mb-6">
    <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">{{ __('ujian_hasil.title') }}
        {{ $ujian->nama_ujian }}</h2>

    <!-- Informasi Ujian -->
    <div
        class="p-6 mb-6 w-full bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Nama Ujian -->
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
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __('ujian_hasil.exam_name') }}</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $ujian->nama_ujian }}</p>
                </div>
            </div>

            <!-- Jadwal Ujian -->
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
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('ujian_hasil.ExamSchedule') }}
                    </p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::parse($ujian->jadwal_ujian)->format('d M Y') }}
                    </p>
                </div>
            </div>

            <!-- Waktu Ujian -->
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
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $ujian->waktu_ujian_display }}
                    </p>
                </div>
            </div>

            <!-- Kuota -->
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
                        {{ $pendaftars->count() }}/{{ $ujian->kuota }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Peserta dan Nilai -->
    <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
        @if (session('errors'))
        <div class="p-4 mb-4 text-sm text-red-800 bg-red-50 rounded-lg dark:bg-gray-800 dark:text-red-400">
            <ul class="pl-5 list-disc">
                @foreach (session('errors') as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="flex justify-between mb-4">
            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('ujian_hasil.participant_name') }}
                {{ __('ujian_hasil.total_score') }}</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.ujian_hasil.format') }}"
                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="mr-2 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" />
                    </svg>
                    {{ __('ujian_hasil.view_format') }}
                </a>
                <a href="{{ route('admin.ujian_hasil.template') }}"
                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-600 rounded-lg dark:bg-green-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:hover:bg-green-800 dark:focus:ring-green-800">
                    <svg class="mr-2 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4" />
                    </svg>
                    {{ __('ujian_hasil.download_template') }}
                </a>
                <form action="{{ route('admin.ujian_hasil.import', $ujian) }}" method="POST"
                    enctype="multipart/form-data" class="inline-flex">
                    @csrf
                    <input type="file" name="file" id="fileImport" class="hidden" accept=".xlsx,.xls" required>
                    <label for="fileImport"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="mr-2 w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('ujian_hasil.import_data') }}
                    </label>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.no') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.participant_name') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.registration_number') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.listening') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.reading') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.total_score') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $key => $pendaftar)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $pendaftar->user->name ?? ($pendaftar->mahasiswa->mahasiswa_nama ?? '-') }}
                        </td>
                        <td class="px-6 py-4">{{ $pendaftar->no_pendaftaran }}</td>
                        <td class="px-6 py-4">{{ $pendaftar->hasilUjian->skor_listening ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pendaftar->hasilUjian->skor_reading ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $pendaftar->hasilUjian->total_skor ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('fileImport').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || '{{ __('ujian_hasil.import_data') }}';
            const label = e.target.nextElementSibling;

            // Update label text
            const icon = label.querySelector('svg').outerHTML;
            label.innerHTML = icon + ' ' + fileName;

            // Submit form automatically after file selection
            if (e.target.files.length > 0) {
                e.target.closest('form').submit();
            }
        });
</script>
@endpush