@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[['name' => 'Data Master', 'url' => '/admin'], ['name' => 'Data Mahasiswa', 'url' => '/mahasiswa']]" />

    <div class="p-2 bg-gray-100 rounded-lg border border-gray-300 shadow-md dark:border-gray-700 dark:bg-gray-800">
        <livewire:kampus-table />
    </div>
@endsection
