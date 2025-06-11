@extends('layouts.admin.app')

@section('content')
    <div class="block mt-12 mb-6 shadow-sm">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6" data-aos="fade-down">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('admin_dashboard.welcome') }}, {{ auth()->user()->admin->admin_nama }}
            </h1>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-4">
            <!-- Total Peserta -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-up" data-aos-delay="100">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('admin_dashboard.total_students') }}</p>
                        <h3 class="text-2xl font-bold dark:text-white">{{ $mahasiswaCount }}</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full dark:bg-blue-900">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Ujian Mendatang -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-up" data-aos-delay="200">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('admin_dashboard.total_exam') }}</p>
                        <h3 class="text-2xl font-bold dark:text-white">{{ $ujianCount }}</h3>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full dark:bg-green-900">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pendaftar Approve -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-up" data-aos-delay="300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('admin_dashboard.total_regist') }}</p>
                        <h3 class="text-2xl font-bold dark:text-white">{{ $approveCount }}</h3>
                    </div>
                    <div class="p-3 bg-orange-100 rounded-full dark:bg-orange-900">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pendaftar Ujian -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-up" data-aos-delay="400">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('admin_dashboard.total_pending') }}</p>
                        <h3 class="text-2xl font-bold dark:text-white">{{ $pendingCount }}</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full dark:bg-purple-900">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dua Kolom Utama -->
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
            <!-- Daftar Peserta Terbaru -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-right">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">{{ __('admin_dashboard.new_regist') }}</h2>
                    <a href="{{ route('ujian.index') }}"
                        class="text-sm text-blue-600 hover:underline">{{ __('admin_dashboard.see_all') }}</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">{{ __('admin_dashboard.name') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('admin_dashboard.prodi') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('admin_dashboard.ujian') }}</th>
                                <th scope="col" class="px-4 py-3">{{ __('admin_dashboard.tanggal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendaftaranLatest as $daftar)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" data-aos="fade-right"
                                    data-aos-delay="{{ $loop->index * 100 }}">
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $daftar->mahasiswa->mahasiswa_nama ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $daftar->mahasiswa->prodi->prodi_nama ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $daftar->ujian->nama_ujian ?? 'Ujian Dihapus' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $daftar->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr data-aos="fade-right">
                                    <td colspan="4" class="px-4 py-3 text-center">
                                        {{ __('admin_dashboard.daftar_kosong') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Jadwal Ujian Mendatang -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-left">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold dark:text-white">{{ __('admin_dashboard.jadwal') }}</h2>
                    <a href="{{ route('ujian.index') }}"
                        class="text-sm text-blue-600 hover:underline">{{ __('admin_dashboard.see_all') }}</a>
                </div>
                <div class="space-y-4">
                    @forelse ($ujianOpen as $item)
                        <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700" data-aos="fade-left"
                            data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="font-medium dark:text-white">{{ $item->nama_ujian }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($item->jadwal_ujian)->translatedFormat('d M Y') }} •
                                        {{ $item->waktu_ujian_display }}
                                    </p>
                                </div>
                                @if ($item->pendaftar_count < $item->kuota)
                                    <span class="text-xs text-green-700 dark:text-green-500">
                                        {{ __('admin_dashboard.tersedia') }}
                                    </span>
                                @else
                                    <span class="text-xs text-yellow-800 dark:text-yellow-200">
                                        {{ __('admin_dashboard.penuh') }}
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center mt-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $item->pendaftar_count }}/{{ $item->kuota }} {{ __('admin_dashboard.peserta') }}
                                    <div class="mt-1 w-full h-2 bg-gray-200 rounded-full dark:bg-gray-700">
                                        @php
                                            $percentage =
                                                $item->kuota > 0
                                                    ? min(100, ($item->pendaftar_count / $item->kuota) * 100)
                                                    : 0;
                                        @endphp
                                        <div class="h-2 bg-blue-600 rounded-full" style="width: {{ $percentage }}%">
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 text-center text-gray-500 dark:text-gray-400" data-aos="fade-left">
                            {{ __('admin_dashboard.ujian_kosong') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Grafik Pendaftaran -->
        <div class="p-6 mb-6 bg-white rounded-lg shadow dark:bg-gray-800" data-aos="fade-up">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold dark:text-white">{{ __('admin_dashboard.stat_regist') }}</h2>
                <div class="flex space-x-2">
                    <button id="monthlyBtn"
                        class="px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-200">{{ __('admin_dashboard.bulanan') }}</button>
                    <button id="weeklyBtn"
                        class="px-3 py-1 text-sm text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ __('admin_dashboard.mingguan') }}</button>
                </div>
            </div>
            <div class="h-64">
                <canvas id="registrationChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari controller
            const chartData = @json($chartData);

            // Konfigurasi grafik
            const ctx = document.getElementById('registrationChart').getContext('2d');
            let chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.monthly.labels,
                    datasets: [{
                        label: 'Pendaftaran',
                        data: chartData.monthly.data,
                        backgroundColor: '#3B82F6',
                        borderColor: '#1D4ED8',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Toggle antara bulanan dan mingguan
            document.getElementById('monthlyBtn').addEventListener('click', function() {
                updateChart(chartData.monthly.labels, chartData.monthly.data);
                this.classList.add('text-blue-800', 'bg-blue-100', 'dark:bg-blue-900',
                    'dark:text-blue-200');
                this.classList.remove('text-gray-800', 'bg-gray-100', 'dark:bg-gray-700',
                    'dark:text-gray-300');
                document.getElementById('weeklyBtn').classList.remove('text-blue-800', 'bg-blue-100',
                    'dark:bg-blue-900', 'dark:text-blue-200');
                document.getElementById('weeklyBtn').classList.add('text-gray-800', 'bg-gray-100',
                    'dark:bg-gray-700', 'dark:text-gray-300');
            });

            document.getElementById('weeklyBtn').addEventListener('click', function() {
                updateChart(chartData.weekly.labels, chartData.weekly.data);
                this.classList.add('text-blue-800', 'bg-blue-100', 'dark:bg-blue-900',
                    'dark:text-blue-200');
                this.classList.remove('text-gray-800', 'bg-gray-100', 'dark:bg-gray-700',
                    'dark:text-gray-300');
                document.getElementById('monthlyBtn').classList.remove('text-blue-800', 'bg-blue-100',
                    'dark:bg-blue-900', 'dark:text-blue-200');
                document.getElementById('monthlyBtn').classList.add('text-gray-800', 'bg-gray-100',
                    'dark:bg-gray-700', 'dark:text-gray-300');
            });

            function updateChart(labels, data) {
                chart.data.labels = labels;
                chart.data.datasets[0].data = data;
                chart.update();
            }
        });
    </script>
@endpush
