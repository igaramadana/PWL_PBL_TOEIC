@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[['name' => 'Data Master', 'url' => '/admin'], ['name' => __('kampus.title'), 'url' => '/admin/kampus']]" />

    <div class="p-2 bg-gray-100 rounded-lg border border-gray-300 shadow-md dark:border-gray-700 dark:bg-gray-800">
        <div class="flex justify-between mb-4">
            <div class="mx-2 mt-2 text-center">
                <h1 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('kampus.title') }}</h1>
            </div>
            <button type="button"
                class="px-4 py-2 mt-2 text-sm font-medium text-gray-900 bg-blue-700 rounded-lg dark:text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                Tambah Data
            </button>
        </div>
        <livewire:kampus-table />
    </div>

    @include('admin.kampus.create')
@endsection
