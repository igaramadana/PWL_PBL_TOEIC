<div>
    <button data-modal-target="detail-modal-{{ $jurusan_id }}" data-modal-toggle="detail-modal-{{ $jurusan_id }}"
        type="button"
        class="p-2 text-gray-900 bg-blue-600 rounded-lg dark:text-gray-50 dark:bg-blue-600 hover:text-white hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 dark:hover:text-white dark:hover:bg-blue-500">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="sr-only">Detail</span>
    </button>

    <!-- Modal Detail -->
    <div id="detail-modal-{{ $jurusan_id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ __('jurusan.modalDetailHeader') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="detail-modal-{{ $jurusan_id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="grid gap-4 mb-5">
                        <div class="p-2 bg-white rounded-md border border-gray-600 dark:bg-gray-700">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('jurusan.modalFormId') }}</h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $jurusan_id ?? '-' }}</p>
                        </div>
                        <div class="p-2 bg-white rounded-md border border-gray-600 dark:bg-gray-700">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('jurusan.modalFormCode') }}</h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $jurusan_kode ?? '-' }}</p>
                        </div>
                        <div class="p-2 bg-white rounded-md border border-gray-600 dark:bg-gray-700">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('jurusan.modalFormName') }}</h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $jurusan_nama ?? '-' }}</p>
                        </div>
                        <div class="p-2 bg-white rounded-md border border-gray-600 dark:bg-gray-700">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('jurusan.modalFormKampus') }}</h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $kampus_nama ?? '-' }}</p>
                        </div>
                    </div>
                    <button type="button" data-modal-toggle="detail-modal-{{ $jurusan_id }}"
                        class="flex justify-end px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg ms-auto hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        {{ __('jurusan.modalDetailClose') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
