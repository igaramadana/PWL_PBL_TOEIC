@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[['name' => __('ujian_hasil.title'), 'url' => '/admin/ujian_hasil']]" />

    @if ($ujian->isEmpty())
        <h1 class="text-gray-900 dark:text-white">{{ __('ujian_hasil.no_results_available') }}</h1>
    @else
        @foreach ($ujian as $item)
            <div class="mb-2">
                <a href="{{ route('ujian_hasil.detail', $item->id) }}"
                    class="block px-4 py-2 max-w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-start">
                        <div
                            class="flex flex-shrink-0 justify-center items-center mr-6 w-12 h-12 bg-blue-600 rounded-full dark:bg-blue-600">
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
                                <span class="font-medium">{{ __('ujian_hasil.ExamSchedule') }}:</span>
                                {{ \Carbon\Carbon::parse($item->jadwal_ujian)->format('d M Y') }}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium">{{ __('ujian_hasil.ExamTime') }}:</span>
                                {{ $item->waktu_ujian_display }}
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium">{{ __('ujian_hasil.Quota') }}:</span>
                                {{ $item->pendaftar_count }}/{{ $item->kuota }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
@endsection
