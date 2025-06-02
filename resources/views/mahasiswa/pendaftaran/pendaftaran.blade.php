@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[['name' => 'Pendaftaran Ujian', 'url' => '/mahasiswa/pendaftaran']]" />

    @if ($checkRegist)
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Anda sudah pernah mendaftar ujian 1x</h1>
            <p class="text-gray-600 dark:text-gray-300">
                Anda tidak dapat mendaftar ujian lagi karena sudah pernah mendaftar sebelumnya.
            </p>
        </div>
    @else
        @if ($pendaftaran->isEmpty())
            <h1 class="text-gray-900 dark:text-white">{{ __('pendaftaran.title') }} belum tersedia</h1>
        @else
            @foreach ($pendaftaran as $item)
                <div class="mb-2">
                    <a href="{{ route('pendaftaran.detail', $item->id) }}"
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
                                    <span
                                        class="font-medium">{{ __('pendaftaran.Quota') }}:</span>{{ count($item->pendaftar) }}/{{ $item->kuota }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    @endif
@endsection
