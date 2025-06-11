@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[['name' => __('ujian_hasil.title'), 'url' => '#']]" />

    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('ujian_hasil.my_exam_results') }}</h2>

        @if ($pendaftarans->isEmpty())
            <div class="p-4 text-sm text-blue-800 bg-blue-50 rounded-lg dark:bg-gray-800 dark:text-blue-400">
                {{ __('ujian_hasil.my_exam_results_notice') }}
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.no') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.exam_name') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.exam_date') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.listening') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.reading') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.total_score') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('ujian_hasil.status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $key => $pendaftaran)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $key + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $pendaftaran->ujian->nama_ujian }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($pendaftaran->ujian->jadwal_ujian)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">{{ $pendaftaran->hasilUjian->skor_listening }}</td>
                                <td class="px-6 py-4">{{ $pendaftaran->hasilUjian->skor_reading }}</td>
                                <td class="px-6 py-4 font-bold">
                                    {{ $pendaftaran->hasilUjian->total_skor }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $total = $pendaftaran->hasilUjian->total_skor;
                                        $status =
                                            $total >= 550
                                                ? __('ujian_hasil.status_passed')
                                                : __('ujian_hasil.status_failed');
                                        $color = $total >= 550 ? 'green' : 'red';
                                    @endphp
                                    <span
                                        class="px-2 py-1 text-xs font-semibold leading-tight text-{{ $color }}-700 bg-{{ $color }}-100 rounded-full dark:bg-{{ $color }}-700 dark:text-{{ $color }}-100">
                                        {{ $status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
