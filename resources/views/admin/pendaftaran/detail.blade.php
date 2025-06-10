@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('pendaftaran.title'), 'url' => '/admin/pendaftaran'],
        ['name' => __('pendaftaran.RegistrationDetail'), 'url' => '#'],
    ]" />

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('pendaftaran.RegistrationDetail') }}</h2>
        <a href="{{ route('ujian.index') }}"
            class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            {{ __('pendaftaran.btnBack') }}
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <!-- Informasi Ujian -->
        <div class="col-span-1">
            <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ __('pendaftaran.ExamInformation') }}</h3>

                <div class="space-y-4">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamName') }}</p>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->ujian->nama_ujian }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamSchedule') }}</p>
                        <p class="text-sm text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($pendaftaran->ujian->jadwal_ujian)->format('d M Y') }}
                            pukul {{ $pendaftaran->ujian->waktu_ujian_display }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.RegistrationNumber') }}</p>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->no_pendaftaran }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.RegistrationDate') }}</p>
                        <p class="text-sm text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d M Y H:i') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.Status') }}</p>
                        <span
                            class="px-2 py-1 text-xs font-medium rounded-full
                            @if ($pendaftaran->status == 'Non Verified') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                            @elseif($pendaftaran->status == 'Verified') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                            {{ ucfirst($pendaftaran->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Mahasiswa -->
        <div class="col-span-2">
            <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ __('pendaftaran.StudentInformation') }}</h3>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Data Pribadi -->
                    <div>
                        <h4 class="mb-3 font-medium text-gray-700 dark:text-gray-300">{{ __('pendaftaran.PersonalData') }}</h4>

                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.FullName') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">
                                    {{ $pendaftaran->mahasiswa->mahasiswa_nama ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.StudentID') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->mahasiswa->nim ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.StudyProgram') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">
                                    {{ $pendaftaran->mahasiswa->prodi->prodi_nama ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.DateOfBirth') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">
                                    {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d M Y') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.NationalID') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->nik }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat dan Dokumen -->
                    <div>
                        <h4 class="mb-3 font-medium text-gray-700 dark:text-gray-300">{{ __('pendaftaran.AddressAndDocuments') }}</h4>

                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.HomeAddress') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->alamat_asal }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.CurrentAddress') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">{{ $pendaftaran->alamat_sekarang }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.Documents') }}</p>
                                <div class="flex mt-1 space-x-2">
                                    @if ($pendaftaran->foto_ktp)
                                        <button type="button"
                                            onclick="openImageModal('{{ asset('storage/' . $pendaftaran->foto_ktp) }}', '{{ __('pendaftaran.IDCard') }}')"
                                            class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            KTP
                                        </button>
                                    @endif

                                    @if ($pendaftaran->foto_ktm)
                                        <button type="button"
                                            onclick="openImageModal('{{ asset('storage/' . $pendaftaran->foto_ktm) }}', '{{ __('pendaftaran.StudentCard') }}')"
                                            class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            KTM
                                        </button>
                                    @endif

                                    @if ($pendaftaran->pas_foto)
                                        <button type="button"
                                            onclick="openImageModal('{{ asset('storage/' . $pendaftaran->pas_foto) }}', '{{ __('pendaftaran.PassportPhoto') }}')"
                                            class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-center text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                            Pas Foto
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                @if ($pendaftaran->status == 'Non Verified')
                    <div class="flex justify-end pt-6 mt-6 space-x-3 border-t border-gray-200 dark:border-gray-700">
                        <form action="{{ route('admin.detail.pendaftaran.approve', $pendaftaran->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                {{ __('pendaftaran.Approve') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan gambar -->
    <div id="imageModal" class="hidden overflow-y-auto fixed inset-0 z-50 bg-black bg-opacity-75">
        <div class="flex justify-center items-center px-4 py-8 min-h-screen">
            <div class="relative max-w-4xl max-h-full bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modalTitle">
                        {{ __('pendaftaran.Document') }}
                    </h3>
                    <button type="button" onclick="closeImageModal()"
                        class="inline-flex justify-center items-center ml-auto w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-6">
                    <div class="flex justify-center">
                        <img id="modalImage" src="" alt="{{ __('pendaftaran.Document') }}"
                            class="object-contain max-w-full max-h-96 rounded-lg">
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="flex items-center p-6 space-x-3 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" onclick="closeImageModal()"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        {{ __('pendaftaran.Close') }}
                    </button>
                    <a id="downloadLink" href="" download
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('pendaftaran.Download') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openImageModal(imageSrc, title) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const downloadLink = document.getElementById('downloadLink');

            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            downloadLink.href = imageSrc;
            downloadLink.download = title + '.jpg';

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
@endsection
