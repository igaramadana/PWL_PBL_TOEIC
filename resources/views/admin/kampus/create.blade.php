<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ __('kampus.modalHeader') }}
                </h3>
                <button type="button"
                    class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="kampus-form" class="p-4 md:p-5" action="{{ route('kampus.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="kampus_nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('kampus.modalFormName') }}</label>
                        <input type="text" name="kampus_nama" id="kampus_nama"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="{{ __('kampus.formNamePlaceholder') }}">
                        <p id="nama-error"
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
                        <label for="kampus_alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('kampus.modalFormAddress') }}</label>
                        <textarea name="kampus_alamat" id="kampus_alamat" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder={{ __('kampus.formAddressPlaceholder') }}></textarea>
                        <p id="alamat-error"
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
                    {{ __('kampus.modalFooter') }}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('kampus-form');
        const namaInput = document.getElementById('kampus_nama');
        const alamatInput = document.getElementById('kampus_alamat');
        const namaError = document.getElementById('nama-error');
        const alamatError = document.getElementById('alamat-error');

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
            e.preventDefault();
            clearError(namaError);
            clearError(alamatError);

            let isValid = true;

            if (!namaInput.value.trim()) {
                showError(namaError, errorMessages.namaRequired);
                isValid = false;
            }

            if (!alamatInput.value.trim()) {
                showError(alamatError, errorMessages.alamatRequired);
                isValid = false;
            }

            if (isValid) {
                form.submit();
            }
        });

        namaInput.addEventListener('input', function() {
            clearError(namaError);
        });

        alamatInput.addEventListener('input', function() {
            clearError(alamatError);
        });
    });
</script>
