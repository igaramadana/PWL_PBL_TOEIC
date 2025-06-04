@extends('layouts.admin.app')

@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('ujian_hasil.title'), 'url' => '/admin/ujian_hasil'],
        ['name' => 'Detail Hasil Ujian', 'url' => '#'],
    ]" />
    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Format Import Data Hasil Ujian</h2>

        <div class="mb-6">
            <p class="mb-2 text-gray-600 dark:text-gray-300">Pastikan file Excel Anda mengikuti format berikut:</p>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">No Pendaftaran</th>
                            <th class="px-4 py-2 border">Listening (0-495)</th>
                            <th class="px-4 py-2 border">Reading (0-495)</th>
                            <th class="px-4 py-2 border">Total Skor (0-990)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border">REG-001</td>
                            <td class="px-4 py-2 border">350</td>
                            <td class="px-4 py-2 border">400</td>
                            <td class="px-4 py-2 border">750</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">REG-002</td>
                            <td class="px-4 py-2 border">300</td>
                            <td class="px-4 py-2 border">450</td>
                            <td class="px-4 py-2 border">750</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Catatan:</h3>
            <ul class="pl-5 list-disc text-gray-600 dark:text-gray-300">
                <li>Pastikan No Pendaftaran sesuai dengan data yang terdaftar</li>
                <li>Nilai Listening dan Reading harus antara 0-495</li>
                <li>Total Skor harus antara 0-990</li>
                <li>File harus dalam format .xlsx atau .xls</li>
                <li>Kolom header harus persis seperti contoh di atas</li>
            </ul>
        </div>

        <a href="#" onclick="window.history.back()"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Kembali
        </a>
    </div>
@endsection
