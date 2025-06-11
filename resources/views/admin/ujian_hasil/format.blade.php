@extends('layouts.admin.app')

@section('content')
    <x-breadcrumb :pages="[
        ['name' => __('ujian_hasil.title'), 'url' => '/admin/ujian_hasil'],
        ['name' => __('ujian_hasil.editTitle'), 'url' => '#'],
    ]" />
    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('ujian_hasil.import_format_title') }}</h2>

        <div class="mb-6">
            <p class="mb-2 text-gray-600 dark:text-gray-300">{{ __('ujian_hasil.import_format_instruction') }}</p>

            <div class="overflow-x-auto">
                <table class="min-w-full text-gray-900 border border-gray-200 dark:text-white dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">{{ __('ujian_hasil.registration_number') }}</th>
                            <th class="px-4 py-2 border">{{ __('ujian_hasil.listening') }}</th>
                            <th class="px-4 py-2 border">{{ __('ujian_hasil.reading') }}</th>
                            <th class="px-4 py-2 border">{{ __('ujian_hasil.total_score') }}</th>
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
            <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">{{ __('ujian_hasil.import_format_note') }}
            </h3>
            <ul class="pl-5 list-disc text-gray-600 dark:text-gray-300">
                <li>{{ __('ujian_hasil.import_format_registration_match') }}</li>
                <li>{{ __('ujian_hasil.import_format_score_range') }}</li>
                <li>{{ __('ujian_hasil.import_format_total_range') }}</li>
                <li>{{ __('ujian_hasil.import_format_file_types') }}</li>
                <li>{{ __('ujian_hasil.import_format_header_required') }}</li>
            </ul>
        </div>

        <a href="#" onclick="window.history.back()"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('ujian_hasil.btnBackTo') }}
        </a>
    </div>
@endsection
