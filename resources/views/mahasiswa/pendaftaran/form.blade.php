@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[
        ['name' => __('pendaftaran.title'), 'url' => '/mahasiswa/pendaftaran'],
        ['name' => __('pendaftaran.RegistrationDetail'), 'url' => '/mahasiswa/pendaftaran/form'],
    ]" />

    <div class="mb-6 space-y-6">
        {{-- Exam Details Card --}}
        <div class="w-full bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700"
            data-aos="fade-down">
            <div class="p-6">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('pendaftaran.ExamDetail') }}</h2>
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Nama Ujian -->
                    <div
                        class="flex items-start p-4 space-x-4 bg-gray-50 rounded-lg transition-colors dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamName') }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $ujian->nama_ujian }}</p>
                        </div>
                    </div>

                    <!-- Tanggal Ujian -->
                    <div
                        class="flex items-start p-4 space-x-4 bg-gray-50 rounded-lg transition-colors dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamDate') }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($ujian->jadwal_ujian)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Waktu Ujian -->
                    <div
                        class="flex items-start p-4 space-x-4 bg-gray-50 rounded-lg transition-colors dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamTime') }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $ujian->waktu_ujian_display }}
                            </p>
                        </div>
                    </div>

                    <!-- Kuota -->
                    <div
                        class="flex items-start p-4 space-x-4 bg-gray-50 rounded-lg transition-colors dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.Quota') }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                <span
                                    class="{{ count($ujian->pendaftar) >= $ujian->kuota ? 'text-red-600 dark:text-red-400' : 'text-green-600 dark:text-green-400' }}">
                                    {{ count($ujian->pendaftar) }}/{{ $ujian->kuota }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Form Card -->
        <div class="w-full bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700"
            data-aos="fade-up">
            <div class="p-6">
                <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">
                    {{ __('pendaftaran.RegistrationDetail') }}</h2>

                <form method="POST" action="{{ route('mahasiswa.pendaftaran.store', $ujian->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Student Information Section -->
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('pendaftaran.StudentInformation') }}</h3>
                        <div class="grid gap-6 md:grid-cols-2">
                            <!-- NIM -->
                            <div class="relative">
                                <input type="text" id="nim" name="nim"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required value="{{ old('nim', $mahasiswa->nim ?? '') }}" />
                                <label for="nim"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('pendaftaran.StudentID') }}</label>
                            </div>

                            <!-- Phone Input -->
                            <div class="relative">
                                <div class="flex absolute inset-y-0 top-0 items-center pointer-events-none start-0 ps-3.5">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                        <path
                                            d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                    </svg>
                                </div>
                                <input type="text" id="phone-input" name="no_telp"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer ps-10"
                                    placeholder=" " required value="{{ old('no_telp', $mahasiswa->no_telp ?? '') }}" />
                                <label for="phone-input"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-10">{{ __('pendaftaran.formPhone') }}</label>
                            </div>
                        </div>

                        <!-- Academic Information -->
                        <div class="grid gap-6 mt-6 md:grid-cols-3">
                            <!-- Kampus -->
                            <div class="relative">
                                <input type="text"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    value="{{ $mahasiswa->prodi->jurusan->kampus->kampus_nama ?? 'Data tidak tersedia' }}"
                                    readonly />
                                <label
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    {{ __('pendaftaran.formCampus') }}
                                </label>
                                <input type="hidden" name="kampus_id"
                                    value="{{ $mahasiswa->prodi->jurusan->kampus->id ?? '' }}">
                            </div>

                            <!-- Jurusan -->
                            <div class="relative">
                                <input type="text"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    value="{{ $mahasiswa->prodi->jurusan->jurusan_nama ?? 'Data tidak tersedia' }}"
                                    readonly />
                                <label
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    {{ __('pendaftaran.formDepartment') }}
                                </label>
                                <input type="hidden" name="jurusan_id"
                                    value="{{ $mahasiswa->prodi->jurusan->id ?? '' }}">
                            </div>

                            <!-- Program Studi -->
                            <div class="relative">
                                <input type="text"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    value="{{ $mahasiswa->prodi->prodi_nama ?? 'Data tidak tersedia' }}" readonly />
                                <label
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                    {{ __('pendaftaran.StudyProgram') }}
                                </label>
                                <input type="hidden" name="prodi_id" value="{{ $mahasiswa->prodi->id }}">
                            </div>
                        </div>
                    </div>

                    <hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

                    <!-- Personal Information Section -->
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('pendaftaran.PersonalData') }}</h3>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- NIK -->
                            <div class="relative">
                                <input type="text" id="nik" name="nik"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required value="{{ old('nik') }}" />
                                <label for="nik"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('pendaftaran.NationalID') }}</label>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="relative">
                                <input type="text" id="mahasiswa_nama" name="mahasiswa_nama"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required
                                    value="{{ old('mahasiswa_nama', $mahasiswa->mahasiswa_nama ?? '') }}" />
                                <label for="mahasiswa_nama"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('pendaftaran.FullName') }}</label>
                            </div>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="relative">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none dark:bg-gray-700 border-1 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ old('tanggal_lahir') }}" />
                            <label for="tanggal_lahir"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('pendaftaran.DateOfBirth') }}</label>
                        </div>
                    </div>

                    <hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

                    <!-- Address Information Section -->
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('pendaftaran.AddressAndDocuments') }}</h3>
                        <div class="mb-6">
                            <label for="alamat_sekarang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.CurrentAddress') }}</label>
                            <textarea id="alamat_sekarang" name="alamat_sekarang" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('pendaftaran.formCurrentAddressPlaceholder') }}" required>{{ old('alamat_sekarang') }}</textarea>
                        </div>

                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('pendaftaran.HomeAddress') }}</h3>
                        <div class="mb-6">
                            <label for="alamat_asal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.HomeAddress') }}</label>
                            <textarea id="alamat_asal" name="alamat_asal" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('pendaftaran.formHomeAddressPlaceholder') }}" required>{{ old('alamat_asal') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700">

                    <!-- Document Upload Section -->
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ __('pendaftaran.Documents') }}</h3>

                        <div class="grid gap-6 md:grid-cols-2">
                            <!-- KTP Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="foto_ktp">{{ __('pendaftaran.IDCard') }}</label>
                                <div class="flex justify-center items-center w-full">
                                    <label for="foto_ktp"
                                        class="flex relative flex-col justify-center items-center w-full h-32 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-gray-700 dark:bg-gray-600 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                        <!-- Preview container (hidden by default) -->
                                        <div id="ktp-preview-container"
                                            class="hidden overflow-hidden absolute inset-0 w-full h-full bg-gray-100 rounded-lg dark:bg-gray-700">
                                            <img id="ktp-preview" class="object-contain w-full h-full" src=""
                                                alt="{{ __('pendaftaran.IDCard') }} preview">
                                            <button type="button"
                                                class="absolute top-2 right-2 p-1 text-white bg-red-500 rounded-full hover:bg-red-600"
                                                onclick="removeImage('foto_ktp', 'ktp-preview-container', 'ktp-upload-ui')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Default upload UI -->
                                        <div id="ktp-upload-ui"
                                            class="flex flex-col justify-center items-center pt-5 pb-6">
                                            <svg class="mb-4 w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">{{ __('pendaftaran.formUploadClick') }}</span>
                                                {{ __('pendaftaran.formUploadDragDrop') }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ __('pendaftaran.formUploadFileTypes') }}</p>
                                        </div>
                                        <input id="foto_ktp" name="foto_ktp" type="file" class="hidden" required
                                            accept="image/*" />
                                    </label>
                                </div>
                            </div>

                            <!-- KTM Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="foto_ktm">{{ __('pendaftaran.StudentCard') }}</label>
                                <div class="flex justify-center items-center w-full">
                                    <label for="foto_ktm"
                                        class="flex relative flex-col justify-center items-center w-full h-32 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-gray-700 dark:bg-gray-600 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                        <!-- Preview container (hidden by default) -->
                                        <div id="ktm-preview-container"
                                            class="hidden overflow-hidden absolute inset-0 w-full h-full bg-gray-100 rounded-lg dark:bg-gray-700">
                                            <img id="ktm-preview" class="object-contain w-full h-full" src=""
                                                alt="{{ __('pendaftaran.StudentCard') }} preview">
                                            <button type="button"
                                                class="absolute top-2 right-2 p-1 text-white bg-red-500 rounded-full hover:bg-red-600"
                                                onclick="removeImage('foto_ktm', 'ktm-preview-container', 'ktm-upload-ui')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Default upload UI -->
                                        <div id="ktm-upload-ui"
                                            class="flex flex-col justify-center items-center pt-5 pb-6">
                                            <svg class="mb-4 w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">{{ __('pendaftaran.formUploadClick') }}</span>
                                                {{ __('pendaftaran.formUploadDragDrop') }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ __('pendaftaran.formUploadFileTypes') }}</p>
                                        </div>
                                        <input id="foto_ktm" name="foto_ktm" type="file" class="hidden" required
                                            accept="image/*" />
                                    </label>
                                </div>
                            </div>

                            <!-- Pas Foto Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="pas_foto">{{ __('pendaftaran.PassportPhoto') }}</label>
                                <div class="flex justify-center items-center w-full">
                                    <label for="pas_foto"
                                        class="flex relative flex-col justify-center items-center w-full h-32 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-gray-700 dark:bg-gray-600 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                        <!-- Preview container (hidden by default) -->
                                        <div id="pasfoto-preview-container"
                                            class="hidden overflow-hidden absolute inset-0 w-full h-full bg-gray-100 rounded-lg dark:bg-gray-700">
                                            <img id="pasfoto-preview" class="object-contain w-full h-full" src=""
                                                alt="{{ __('pendaftaran.PassportPhoto') }} preview">
                                            <button type="button"
                                                class="absolute top-2 right-2 p-1 text-white bg-red-500 rounded-full hover:bg-red-600"
                                                onclick="removeImage('pas_foto', 'pasfoto-preview-container', 'pasfoto-upload-ui')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Default upload UI -->
                                        <div id="pasfoto-upload-ui"
                                            class="flex flex-col justify-center items-center pt-5 pb-6">
                                            <svg class="mb-4 w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">{{ __('pendaftaran.formUploadClick') }}</span>
                                                {{ __('pendaftaran.formUploadDragDrop') }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ __('pendaftaran.formUploadFileTypes') }}</p>
                                        </div>
                                        <input id="pas_foto" name="pas_foto" type="file" class="hidden" required
                                            accept="image/*" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="px-5 py-3 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('pendaftaran.Save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Fungsi untuk preview gambar
            function readURL(input, previewId, previewContainerId, uploadUiId) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $(previewId).attr('src', e.target.result);
                        $(previewContainerId).removeClass('hidden');
                        $(uploadUiId).addClass('hidden');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Fungsi untuk menghapus gambar dan reset input
            function removeImage(inputId, previewContainerId, uploadUiId) {
                // Reset input file
                document.getElementById(inputId).value = '';

                // Sembunyikan preview dan tampilkan kembali UI upload
                $(`#${previewContainerId}`).addClass('hidden');
                $(`#${uploadUiId}`).removeClass('hidden');

                // Hapus preview gambar
                $(`#${previewContainerId} img`).attr('src', '');
            }

            // Event handler untuk KTP
            $("#foto_ktp").change(function() {
                readURL(this, '#ktp-preview', '#ktp-preview-container', '#ktp-upload-ui');
            });

            // Event handler untuk KTM
            $("#foto_ktm").change(function() {
                readURL(this, '#ktm-preview', '#ktm-preview-container', '#ktm-upload-ui');
            });

            // Event handler untuk Pas Foto
            $("#pas_foto").change(function() {
                readURL(this, '#pasfoto-preview', '#pasfoto-preview-container', '#pasfoto-upload-ui');
            });

            // Event handler untuk tombol close KTP
            $(document).on('click', '#ktp-preview-container button', function() {
                removeImage('foto_ktp', 'ktp-preview-container', 'ktp-upload-ui');
            });

            // Event handler untuk tombol close KTM
            $(document).on('click', '#ktm-preview-container button', function() {
                removeImage('foto_ktm', 'ktm-preview-container', 'ktm-upload-ui');
            });

            // Event handler untuk tombol close Pas Foto
            $(document).on('click', '#pasfoto-preview-container button', function() {
                removeImage('pas_foto', 'pasfoto-preview-container', 'pasfoto-upload-ui');
            });
        });
    </script>
@endpush
