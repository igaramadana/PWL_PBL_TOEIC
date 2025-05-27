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
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('pengumuman.btnUpdate') }}
                </button>
                <a href="{{ route('pengumuman.index') }}"
                    class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    {{ __('pengumuman.btnBack') }}
                </a>
            </div>
        </form>
    </div>
@endsection
