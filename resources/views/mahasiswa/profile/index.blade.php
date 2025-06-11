@extends('layouts.users.app')

@section('content')
    <x-breadcrumb :pages="[
        ['name' => __('profile.title'), 'url' => '/profile'],
        ['name' => auth()->user()->mahasiswa->mahasiswa_nama, 'url' => '/profile'],
    ]" />

    <!-- Hero Section with Flowbite Colors -->
    <div class="overflow-hidden relative mb-8 bg-white rounded-lg border shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="relative px-6 py-8 sm:px-8 sm:py-12">
            <div class="flex flex-col items-center space-y-6 md:flex-row md:space-y-0 md:space-x-8">
                <!-- Profile Avatar -->
                <div class="relative">
                    <div class="overflow-hidden w-32 h-32 rounded-full ring-4 md:w-40 md:h-40 ring-white/50">
                        <img class="object-cover w-full h-full" src="{{ $avatar }}"
                            alt="{{ __('profile.title') }} image" />
                        @if (auth()->user()->mahasiswa->foto_profile)
                            <button type="button" data-modal-target="deletePhotoModal" data-modal-toggle="deletePhotoModal"
                                class="absolute right-0 bottom-0 p-2 text-white bg-red-600 rounded-full cursor-pointer hover:bg-red-700">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="text-center text-gray-900 dark:text-white md:text-left">
                    <h1 class="mb-2 text-3xl font-bold md:text-4xl">
                        {{ auth()->user()->mahasiswa->mahasiswa_nama }}
                    </h1>
                    <p class="mb-6 text-lg text-blue-600 dark:text-blue-400">{{ auth()->user()->email }}</p>

                    <!-- Action Buttons with Flowbite Style -->
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="#" data-modal-target="editProfileModal" data-modal-toggle="editProfileModal"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-800 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800">
                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.17-2.139 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852 1.168 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                            </svg>
                            {{ __('profile.edit_profile_label') }}
                        </a>

                        <a href="#" data-modal-target="changePasswordModal" data-modal-toggle="changePasswordModal"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-transparent hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.89l7.778-7.778" />
                            </svg>
                            {{ __('profile.change_password_label') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Cards Grid -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Academic Information Card -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <!-- Card Header -->
            <div class="flex justify-between items-center p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="flex justify-center items-center w-10 h-10 bg-blue-100 rounded-lg dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 3v4a1 1 0 0 1-1 1H5m8-2h3m-3 3h3m-6 3v4a1 1 0 0 1-1 1H5m11-4h3m-6 0h3M7 3L4 6v11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V9h-3a1 1 0 0 1-1-1V3H7Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('profile.academic_information') }}
                    </h3>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 space-y-6">
                <!-- NIM -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div class="flex justify-center items-center w-10 h-10 bg-gray-100 rounded-lg dark:bg-gray-600 me-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5h9M5 9h5m8-8H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h4l3.5 4 3.5-4h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('profile.student_id') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ auth()->user()->mahasiswa->nim }}
                        </p>
                    </div>
                </div>

                <!-- Program Studi -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div class="flex justify-center items-center w-10 h-10 bg-green-100 rounded-lg dark:bg-green-900 me-3">
                        <svg class="w-5 h-5 text-green-500 dark:text-green-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9V4a3 3 0 0 0-6 0v5m9.92 10H2.08a1 1 0 0 1-1-1.077L2 6h14l.917 11.923A1 1 0 0 1 15.92 19Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('profile.study_program') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ auth()->user()->mahasiswa->prodi->prodi_nama ?? 'N/A' }}</p>
                        @if (auth()->user()->mahasiswa->prodi)
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->mahasiswa->prodi->jurusan->jurusan_nama ?? '' }}</p>
                        @endif
                    </div>
                </div>

                <!-- Angkatan -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div
                        class="flex justify-center items-center w-10 h-10 bg-purple-100 rounded-lg dark:bg-purple-900 me-3">
                        <svg class="w-5 h-5 text-purple-500 dark:text-purple-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1v3m5-3v3m5-3v3M1 7h18M5 11h10M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('profile.academic_year') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ auth()->user()->mahasiswa->angkatan }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact & Status Information Card -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <!-- Card Header -->
            <div class="flex justify-between items-center p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="flex justify-center items-center w-10 h-10 bg-green-100 rounded-lg dark:bg-green-900">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m16.344 12.168-1.4-1.4a1.98 1.98 0 0 0-2.8 0l-.7.7a1.98 1.98 0 0 1-2.8 0l-2.1-2.1a1.98 1.98 0 0 1 0-2.8l.7-.7a1.98 1.98 0 0 0 0-2.8l-1.4-1.4a1.828 1.828 0 0 0-2.59 0L-.99 5.168a3.988 3.988 0 0 0 0 5.64l2.1 2.1a6.793 6.793 0 0 0 9.6 0l2.1-2.1a3.988 3.988 0 0 0 0-5.64Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('profile.contact_status') }}
                    </h3>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 space-y-6">
                <!-- Phone -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div class="flex justify-center items-center w-10 h-10 bg-blue-100 rounded-lg dark:bg-blue-900 me-3">
                        <svg class="w-5 h-5 text-blue-500 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m16.344 12.168-1.4-1.4a1.98 1.98 0 0 0-2.8 0l-.7.7a1.98 1.98 0 0 1-2.8 0l-2.1-2.1a1.98 1.98 0 0 1 0-2.8l.7-.7a1.98 1.98 0 0 0 0-2.8l-1.4-1.4a1.828 1.828 0 0 0-2.59 0L-.99 5.168a3.988 3.988 0 0 0 0 5.64l2.1 2.1a6.793 6.793 0 0 0 9.6 0l2.1-2.1a3.988 3.988 0 0 0 0-5.64Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('profile.phone_number') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">+62
                            {{ auth()->user()->mahasiswa->no_telp ?? __('profile.not_provided') }}</p>
                    </div>
                </div>

                <!-- Status -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div
                        class="flex justify-center items-center w-10 h-10 bg-yellow-100 rounded-lg dark:bg-yellow-900 me-3">
                        <svg class="w-5 h-5 text-yellow-500 dark:text-yellow-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('profile.student_status') }}
                        </p>
                        <span
                            class="px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                            {{ auth()->user()->mahasiswa->status }}
                        </span>
                    </div>
                </div>

                <!-- Exam Registration -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <div
                        class="flex justify-center items-center w-10 h-10 bg-indigo-100 rounded-lg dark:bg-indigo-900 me-3">
                        <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 2V1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V2Zm0 0H1a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H5V2Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            {{ __('profile.exam_registration') }}</p>
                        @if (auth()->user()->mahasiswa->daftar_ujian)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                {{ __('profile.registered') }}
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                </svg>
                                {{ __('profile.not_registered') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-4 rounded-t border-b md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ __('profile.edit_profile') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editProfileModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">{{ __('profile.close_modal') }}</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                    <form id="editProfileForm" action="{{ route('profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture -->
                        <div class="flex flex-col items-center mb-6">
                            <div class="relative mb-4">
                                <img id="profileImagePreview"
                                    class="object-cover w-32 h-32 rounded-full border-4 border-white shadow-md dark:border-gray-600"
                                    src="{{ $avatar }}" alt="{{ __('profile.title') }} preview">
                                <label for="foto_profile"
                                    class="absolute right-0 bottom-0 p-2 text-white bg-blue-600 rounded-full cursor-pointer hover:bg-blue-700">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 12.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm0 3.5a7 7 0 1 0 0-14 7 7 0 0 0 0 14Zm0-17v3m0 14v3" />
                                    </svg>
                                    <input id="foto_profile" name="foto_profile" type="file" class="hidden"
                                        accept="image/*">
                                </label>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('profile.profile_picture_instruction') }}</p>
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.full_name') }}</label>
                            <input type="text" id="name" name="name"
                                value="{{ auth()->user()->mahasiswa->mahasiswa_nama }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.phone_number') }}</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    +62
                                </span>
                                <input type="tel" id="phone" name="phone"
                                    value="{{ auth()->user()->mahasiswa->no_telp ?? '' }}"
                                    class="block flex-1 p-2.5 w-full min-w-0 text-sm text-gray-900 bg-gray-50 rounded-none border border-gray-300 rounded-e-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="81234567890">
                            </div>
                        </div>

                        <!-- Academic Information (readonly) -->
                        <div class="mb-4">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.student_id') }}</label>
                            <input type="text" value="{{ auth()->user()->mahasiswa->nim }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400"
                                readonly>
                        </div>

                        <div class="mb-4">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.study_program') }}</label>
                            <input type="text" value="{{ auth()->user()->mahasiswa->prodi->prodi_nama ?? 'N/A' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400"
                                readonly>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 rounded-b border-t border-gray-200 md:p-5 dark:border-gray-600">
                    <button type="submit" form="editProfileForm"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('profile.save_changes') }}</button>
                    <button data-modal-hide="editProfileModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 ms-3 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ __('profile.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="changePasswordModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-4 rounded-t border-b md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ __('profile.change_password') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="changePasswordModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">{{ __('profile.close_modal') }}</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form id="changePasswordForm" action="{{ route('profile.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mb-4">
                            <label for="current_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.current_password') }}</label>
                            <div class="relative">
                                <input type="password" id="current_password" name="current_password"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <button type="button"
                                    class="flex absolute inset-y-0 right-0 items-center pr-3 text-gray-400 hover:text-gray-500"
                                    onclick="togglePasswordVisibility('current_password', this)">
                                    <svg class="w-5 h-5 eye-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                    </svg>
                                    <svg class="hidden w-5 h-5 eye-slash-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m2 2 15 15M5.188 5.612A8.539 8.539 0 0 0 1 9c3 0 5 3 9 3 1.669 0 3.1-.6 4.25-1.562M10 13c-4 0-6-3-9-3a9.1 9.1 0 0 1 1.5-1.5m10.5-1.5A9.1 9.1 0 0 0 10 4c-4 0-6 3-9 3a9.1 9.1 0 0 1 5.39-1.92M10 5.375C12.5 3.417 15 5.5 15 9" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="mb-4">
                            <label for="new_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.new_password') }}</label>
                            <div class="relative">
                                <input type="password" id="new_password" name="new_password"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <button type="button"
                                    class="flex absolute inset-y-0 right-0 items-center pr-3 text-gray-400 hover:text-gray-500"
                                    onclick="togglePasswordVisibility('new_password', this)">
                                    <svg class="w-5 h-5 eye-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                    </svg>
                                    <svg class="hidden w-5 h-5 eye-slash-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m2 2 15 15M5.188 5.612A8.539 8.539 0 0 0 1 9c3 0 5 3 9 3 1.669 0 3.1-.6 4.25-1.562M10 13c-4 0-6-3-9-3a9.1 9.1 0 0 1 1.5-1.5m10.5-1.5A9.1 9.1 0 0 0 10 4c-4 0-6 3-9 3a9.1 9.1 0 0 1 5.39-1.92M10 5.375C12.5 3.417 15 5.5 15 9" />
                                    </svg>
                                </button>
                            </div>
                            <p id="password-strength" class="mt-1 text-xs"></p>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-6">
                            <label for="new_password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('profile.confirm_new_password') }}</label>
                            <div class="relative">
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <button type="button"
                                    class="flex absolute inset-y-0 right-0 items-center pr-3 text-gray-400 hover:text-gray-500"
                                    onclick="togglePasswordVisibility('new_password_confirmation', this)">
                                    <svg class="w-5 h-5 eye-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                    </svg>
                                    <svg class="hidden w-5 h-5 eye-slash-icon" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m2 2 15 15M5.188 5.612A8.539 8.539 0 0 0 1 9c3 0 5 3 9 3 1.669 0 3.1-.6 4.25-1.562M10 13c-4 0-6-3-9-3a9.1 9.1 0 0 1 1.5-1.5m10.5-1.5A9.1 9.1 0 0 0 10 4c-4 0-6 3-9 3a9.1 9.1 0 0 1 5.39-1.92M10 5.375C12.5 3.417 15 5.5 15 9" />
                                    </svg>
                                </button>
                            </div>
                            <p id="password-match" class="mt-1 text-xs"></p>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 rounded-b border-t border-gray-200 md:p-5 dark:border-gray-600">
                    <button type="submit" form="changePasswordForm"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('profile.update_password') }}</button>
                    <button data-modal-hide="changePasswordModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 ms-3 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ __('profile.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Photo Modal -->
    <div id="deletePhotoModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deletePhotoModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 6 6-6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">{{ __('profile.close_modal') }}</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-900">
                        {{ __('profile.delete_photo_confirmation') }}</h3>
                    <form action="{{ route('profile.deletephoto') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 me-2">
                            {{ __('profile.yes_sure') }}
                        </button>
                        <button type="button" data-modal-hide="deletePhotoModal"
                            class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-1 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">
                            {{ __('profile.no_cancel') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this script section at the bottom of your file -->
    @push('scripts')
        <script>
            // Pass translations to JavaScript
            const translations = {
                very_weak: "{{ __('profile.password_strength_very_weak') }}",
                weak: "{{ __('profile.password_strength') }}",
                medium: "{{ __('profile.password_strength_medium') }}",
                strong: "{{ __('profile.password_strength_strong') }}",
                passwords_match: "{{ __('profile.passwords_match') }}",
                passwords_do_not_match: "{{ __('profile.passwords_do_not_match') }}"
            };

            // Function to preview profile image before upload
            document.getElementById('foto_profile').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('profileImagePreview').src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Function to toggle password visibility
            function togglePasswordVisibility(inputId, button) {
                const input = document.getElementById(inputId);
                const eyeIcon = button.querySelector('.eye-icon');
                const eyeSlashIcon = button.querySelector('.eye-slash-icon');

                if (input.type === 'password') {
                    input.type = 'text';
                    eyeIcon.classList.add('hidden');
                    eyeSlashIcon.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eyeIcon.classList.remove('hidden');
                    eyeSlashIcon.classList.add('hidden');
                }
            }

            // Password strength indicator
            document.getElementById('new_password').addEventListener('input', function() {
                const password = this.value;
                const strengthText = document.getElementById('password-strength');

                if (password.length === 0) {
                    strengthText.textContent = '';
                    strengthText.className = 'mt-1 text-xs';
                    return;
                }

                // Very weak
                if (password.length < 6) {
                    strengthText.textContent = translations.very_weak;
                    strengthText.className = 'mt-1 text-xs text-red-600';
                    return;
                }

                // Check complexity
                const hasUpperCase = /[A-Z]/.test(password);
                const hasLowerCase = /[a-z]/.test(password);
                const hasNumbers = /\d/.test(password);
                const hasSpecialChars = /[!@#$%^&*(),.?":{}|<>]/.test(password);

                let strength = 0;
                if (hasUpperCase) strength++;
                if (hasLowerCase) strength++;
                if (hasNumbers) strength++;
                if (hasSpecialChars) strength++;

                if (password.length < 8 && strength < 3) {
                    strengthText.textContent = translations.weak;
                    strengthText.className = 'mt-1 text-xs text-orange-500';
                } else if (password.length >= 8 && strength >= 3) {
                    strengthText.textContent = translations.strong;
                    strengthText.className = 'mt-1 text-xs text-green-600';
                } else {
                    strengthText.textContent = translations.medium;
                    strengthText.className = 'mt-1 text-xs text-yellow-500';
                }
            });

            // Password match indicator
            document.getElementById('new_password_confirmation').addEventListener('input', function() {
                const password = document.getElementById('new_password').value;
                const confirmPassword = this.value;
                const matchText = document.getElementById('password-match');

                if (confirmPassword.length === 0) {
                    matchText.textContent = '';
                    matchText.className = 'mt-1 text-xs';
                    return;
                }

                if (password === confirmPassword) {
                    matchText.textContent = translations.passwords_match;
                    matchText.className = 'mt-1 text-xs text-green-600';
                } else {
                    matchText.textContent = translations.passwords_do_not_match;
                    matchText.className = 'mt-1 text-xs text-red-600';
                }
            });
        </script>
    @endpush
@endsection
