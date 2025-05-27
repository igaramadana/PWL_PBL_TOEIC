@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('pengumuman.title'), 'url' => '/admin/pengumuman'],
        ['name' => __('pengumuman.editTitle'), 'url' => '#'],
    ]" />

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('pengumuman.editTitle') }}</h2>
    </div>

    <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('pengumuman.title') }}
                    </label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('pengumuman.EnterAnnouncementTitle') }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="isi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('pengumuman.AnnouncementContent') }}
                    </label>
                    <textarea id="isi" name="isi" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('pengumuman.AnnouncementPlaceholder') }}">{{ old('isi', $pengumuman->isi) }}</textarea>
                </div>
            </div>
            <div class="flex justify-between items-center space-x-4">
                <div class="flex space-x-4">
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('pengumuman.btnUpdate') }}
                    </button>

                    <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        {{ __('pengumuman.btnDelete') }}
                    </button>
                </div>
                <a href="{{ route('pengumuman.index') }}"
                    class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    {{ __('pengumuman.btnBack') }}
                </a>
            </div>
        </form>
    </div>
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <button type="button"
                    class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ __('pengumuman.deleteConfirmation') }}</h3>
                    <div class="flex justify-between">
                        <form id="delete-form" action="{{ route('pengumuman.delete', $pengumuman->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-modal-hide="popup-modal"
                                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                {{ __('pengumuman.btnYesDelete') }}
                            </button>
                        </form>
                        <button data-modal-hide="popup-modal" type="button"
                            class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 ms-3 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            {{ __('pengumuman.btnNoCancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
