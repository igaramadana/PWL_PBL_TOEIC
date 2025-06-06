@extends('layouts.admin.app')
@section('content')
    <x-breadcrumb :pages="[
        ['name' => 'Data Master', 'url' => '/admin'],
        ['name' => __('pendaftaran.title'), 'url' => '/admin/pendaftaran'],
        ['name' => __('pendaftaran.ExamDetail'), 'url' => '#'],
    ]" />

    <div class="mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('pendaftaran.ExamDetail') }}</h2>

            <div class="flex space-x-3">
                @if ($ujian->ujian_status === 'Open')
                    <!-- Edit Button -->
                    <button type="button" data-modal-target="editModal" data-modal-toggle="editModal"
                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                            </path>
                        </svg>
                        {{ __('pendaftaran.EditExam') }}
                    </button>

                    <!-- Close Registration Button -->
                    <button type="button" data-modal-target="closeModal" data-modal-toggle="closeModal"
                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ __('pendaftaran.CloseRegistration') }}
                    </button>
                    <!-- Modal -->
                    <div id="closeModal" tabindex="-1" aria-hidden="true"
                        class="flex hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="inline-flex absolute right-2.5 top-3 items-center p-1.5 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="closeModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('pendaftaran.ConfirmCloseRegistration') }}</h3>
                                    <form action="{{ route('ujian.close', $ujian->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="inline-flex items-center px-5 py-2.5 mr-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                            {{ __('pendaftaran.CloseRegistration') }}
                                        </button>
                                        <button type="button"
                                            class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                            data-modal-hide="closeModal">{{ __('Cancel') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        <svg class="mr-2 w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                clip-rule="evenodd" />
                        </svg>

                        {{ __('pendaftaran.deleteExam') }}
                    </button>
                    <!-- Delete Modal -->
                    <div id="deleteModal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="inline-flex absolute right-2.5 top-3 items-center p-1.5 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="deleteModal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('pendaftaran.ConfirmDeleteExam') }}
                                    </h3>
                                    <form action="{{ route('ujian.delete', $ujian->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-5 py-2.5 mr-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                            {{ __('pendaftaran.DeleteExam') }}
                                        </button>
                                        <button type="button" data-modal-hide="deleteModal"
                                            class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            {{ __('Cancel') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="px-4 py-2 text-sm font-medium text-white bg-gray-500 rounded-lg dark:bg-gray-600">
                        {{ __('pendaftaran.RegistrationClosed') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.ExamDate') }}
                        </p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($ujian->jadwal_ujian)->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.Quota') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ count($ujian->pendaftar) }}/{{ $ujian->kuota }}
                        </p>
                        <div class="mt-2 w-full h-2.5 bg-gray-200 rounded-full dark:bg-gray-700">
                            @php
                                $percentage =
                                    $ujian->kuota > 0 ? min(100, (count($ujian->pendaftar) / $ujian->kuota) * 100) : 0;
                            @endphp
                            <div class="h-2.5 bg-blue-600 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('pendaftaran.Status') }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            @if ($ujian->ujian_status === 'Open')
                                <span
                                    class="px-2.5 py-0.5 text-sm font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-200">
                                    {{ $ujian->ujian_status }}
                                </span>
                            @else
                                <span
                                    class="px-2.5 py-0.5 text-sm font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-200">
                                    {{ $ujian->ujian_status }}
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6">
        @livewire('pendaftar-table', ['ujianId' => $ujian->id])
    </div>
@endsection

<!-- Edit Modal -->
<div id="editModal" tabindex="-1" aria-hidden="true"
    class="flex hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ __('pendaftaran.EditExam') }}
                </h3>
                <button type="button"
                    class="inline-flex items-center p-1.5 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('ujian.update', $ujian->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="nama_ujian"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamName') }}</label>
                    <input type="text" name="nama_ujian" id="nama_ujian" value="{{ $ujian->nama_ujian }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="jadwal_ujian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamDate') }}</label>
                        <input type="date" name="jadwal_ujian" id="jadwal_ujian"
                            value="{{ $ujian->jadwal_ujian }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="waktu_ujian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.ExamTime') }}</label>
                        <input type="time" name="waktu_ujian" id="waktu_ujian" value="{{ $ujian->waktu_ujian }}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                </div>
                <div>
                    <label for="kuota"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('pendaftaran.Quota') }}</label>
                    <input type="number" name="kuota" id="kuota" min="1" value="{{ $ujian->kuota }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    <input type="hidden" name="ujian_status" value="Open">
                </div>
                <div
                    class="flex justify-end items-center p-6 space-x-3 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" data-modal-hide="editModal"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('pendaftaran.SaveChanges') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
