@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[['name' => __('pengumuman.title'), 'url' => '#']]" />

    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('pengumuman.title') }}</h2>

        @if ($pengumuman->isEmpty())
            <div class="p-4 text-sm text-blue-800 bg-blue-50 rounded-lg dark:bg-gray-800 dark:text-blue-400">
                {{ __('pengumuman.noAnnouncements') }}
            </div>
        @else
            @foreach ($pengumuman as $item)
                <div class="mb-4">
                    <div
                        class="p-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 items-center p-3 mt-1 bg-blue-100 rounded-full dark:bg-blue-900">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4 w-full">
                                <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->judul }}
                                </h5>
                                <div class="flex items-center mt-1">
                                    <img src="{{ (new \Laravolt\Avatar\Avatar())->create($item->admin->admin_nama ?? 'Admin')->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64() }}"
                                        class="mr-1 w-5 h-5" alt="Admin Avatar" />
                                    <p class="font-normal text-gray-700 dark:text-gray-400">
                                        {{ __('pengumuman.publishedBy') }}: {{ $item->admin->admin_nama ?? 'Admin' }}
                                    </p>
                                </div>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $item->isi }}</p>
                                <div class="mt-3 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="mr-1 fas fa-clock"></i>
                                    {{ __('pengumuman.publishedAt') }}: {{ $item->created_at->format('d M Y, H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
