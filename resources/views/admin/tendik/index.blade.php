@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[['name' => 'Data Master', 'url' => '/admin'], ['name' => __('tendik.title'), 'url' => '/admin/tendik']]" />

    <div class="p-2 bg-gray-100 rounded-lg border border-gray-300 shadow-md dark:border-gray-700 dark:bg-gray-800">
        <div class="flex justify-between mb-4">
            <div class="mx-2 mt-2 text-center">
                <h1 class="text-lg font-bold text-gray-900 dark:text-white">{{ __('tendik.title') }}</h1>
            </div>
        </div>
        <livewire:tendik-table />
    </div>
@endsection
