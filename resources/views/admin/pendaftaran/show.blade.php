@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('pendaftaran.title'), 'url' => '/admin/pendaftaran'],
        ['name' => 'Detail Ujian', 'url' => '#'],
    ]" />

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Ujian</h2>
        <div class="mt-4 bg-white rounded-lg shadow dark:bg-gray-800 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 dark:text-gray-300">Nama Ujian:</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $ujian->nama_ujian }}</p>
                </div>
                <div>
                    <p class="text-gray-600 dark:text-gray-300">Tanggal Ujian:</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($ujian->jadwal_ujian)->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-gray-600 dark:text-gray-300">Waktu Ujian:</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $ujian->waktu_ujian_display }}</p>
                </div>
                <div>
                    <p class="text-gray-600 dark:text-gray-300">Kuota:</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $ujian->kuota }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Daftar Pendaftar</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No Pendaftaran</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ujian->pendaftar as $pendaftar)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $pendaftar->no_pendaftaran }}</td>
                            <td class="px-6 py-4">{{ $pendaftar->user->name }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d M Y') }}</td>
                            <td class="px-6 py-4">{{ $pendaftar->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">Belum ada pendaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection