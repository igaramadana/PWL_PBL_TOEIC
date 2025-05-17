<div>
    <button data-tooltip-target="tooltip-edit" data-modal-target="edit-modal-{{ $kampus_id }}"
        data-modal-toggle="edit-modal-{{ $kampus_id }}" type="button"
        class="p-2 text-gray-900 bg-yellow-500 rounded-lg dark:text-gray-50 dark:bg-yellow-500 hover:text-white hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 dark:hover:text-white dark:hover:bg-yellow-500">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
        </svg>
        <span class="sr-only">Edit</span>
    </button>

    <!-- Modal Edit -->
    <div id="edit-modal-{{ $kampus_id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ __('kampus.modalEditHeader') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-modal-{{ $kampus_id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="kampus-edit-form-{{ $kampus_id }}" class="p-4 md:p-5"
                    action="{{ route('kampus.update', $kampus_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="kampus_nama_{{ $kampus_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('kampus.modalFormName') }}</label>
                            <input type="text" name="kampus_nama" id="kampus_nama_{{ $kampus_id }}"
                                value="{{ $kampus_nama ?? '' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('kampus.formNamePlaceholder') }}">
                            <p id="nama-error-{{ $kampus_id }}"
                                class="flex hidden items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span></span>
                            </p>
                        </div>
                        <div>
                            <label for="kampus_alamat_{{ $kampus_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('kampus.modalFormAddress') }}</label>
                            <textarea name="kampus_alamat" id="kampus_alamat_{{ $kampus_id }}" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('kampus.formAddressPlaceholder') }}">{{ $kampus_alamat ?? '' }}</textarea>
                            <p id="alamat-error-{{ $kampus_id }}"
                                class="flex hidden items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span></span>
                            </p>
                        </div>
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('kampus.modalEditFooter') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('kampus-edit-form-{{ $kampus_id }}');
            const namaInput = document.getElementById('kampus_nama_{{ $kampus_id }}');
            const alamatInput = document.getElementById('kampus_alamat_{{ $kampus_id }}');
            const namaError = document.getElementById('nama-error-{{ $kampus_id }}');
            const alamatError = document.getElementById('alamat-error-{{ $kampus_id }}');

            const errorMessages = {
                namaRequired: '{{ __('kampus.nameRequired') }}',
                alamatRequired: '{{ __('kampus.addressRequired') }}'
            };

            function showError(element, message) {
                element.querySelector('span').textContent = message;
                element.classList.remove('hidden');
                element.parentElement.querySelector('input, textarea').classList.add('border-red-500');
            }

            function clearError(element) {
                element.classList.add('hidden');
                element.parentElement.querySelector('input, textarea').classList.remove('border-red-500');
            }

            form.addEventListener('submit', function(e) {
                let isValid = true;

                if (!namaInput.value.trim()) {
                    showError(namaError, errorMessages.namaRequired);
                    isValid = false;
                } else {
                    clearError(namaError);
                }

                if (!alamatInput.value.trim()) {
                    showError(alamatError, errorMessages.alamatRequired);
                    isValid = false;
                } else {
                    clearError(alamatError);
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });

            namaInput.addEventListener('input', function() {
                if (namaInput.value.trim()) {
                    clearError(namaError);
                }
            });

            alamatInput.addEventListener('input', function() {
                if (alamatInput.value.trim()) {
                    clearError(alamatError);
                }
            });
        });
    </script>
</div>
