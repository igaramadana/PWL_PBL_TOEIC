<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ __('jurusan.modalHeader') }}
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
            <form id="jurusan-form" class="p-4 md:p-5" action="{{ route('jurusan.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="jurusan_kode"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormCode') }}</label>
                        <input type="text" name="jurusan_kode" id="jurusan_kode"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="{{ __('jurusan.formCodePlaceholder') }}">
                        <p id="kode-error" class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                            <span id="kode-error-message"></span>
                        </p>
                    </div>
                    <div>
                        <label for="jurusan_nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormName') }}</label>
                        <input type="text" name="jurusan_nama" id="jurusan_nama"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="{{ __('jurusan.formNamePlaceholder') }}">
                        <p id="nama-error" class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                            <span id="nama-error-message"></span>
                        </p>
                    </div>
                    <div>
                        <label for="kampus_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormKampus') }}</label>
                        <select name="kampus_id" id="kampus_id"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">{{ __('jurusan.formKampusPlaceholder') }}</option>
                            @foreach ($kampus as $k)
                                <option value="{{ $k->id }}">{{ $k->kampus_nama }}</option>
                            @endforeach
                        </select>
                        <p id="kampus-error" class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                            <span id="kampus-error-message"></span>
                        </p>
                    </div>
                </div>
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('jurusan.modalFooter') }}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('jurusan-form');

        if (!form) {
            console.error('Form not found');
            return;
        }

        const elements = {
            kodeInput: document.getElementById('jurusan_kode'),
            namaInput: document.getElementById('jurusan_nama'),
            kampusInput: document.getElementById('kampus_id'),
            kodeError: document.getElementById('kode-error'),
            namaError: document.getElementById('nama-error'),
            kampusError: document.getElementById('kampus-error'),
            kodeErrorMessage: document.getElementById('kode-error-message'),
            namaErrorMessage: document.getElementById('nama-error-message'),
            kampusErrorMessage: document.getElementById('kampus-error-message')
        };

        // Pastikan semua elemen ada
        for (const [key, element] of Object.entries(elements)) {
            if (!element) {
                console.error(`Element ${key} not found`);
            }
        }

        const errorMessages = {
            kodeRequired: '{{ __('jurusan.codeRequired') }}',
            namaRequired: '{{ __('jurusan.nameRequired') }}',
            kampusRequired: '{{ __('jurusan.kampusRequired') }}'
        };

        function showError(element, messageElement, message) {
            if (element && messageElement) {
                messageElement.textContent = message;
                element.classList.remove('hidden');
                const input = element.previousElementSibling;
                if (input) input.classList.add('border-red-500');
            }
        }

        function clearError(element, messageElement) {
            if (element && messageElement) {
                messageElement.textContent = '';
                element.classList.add('hidden');
                const input = element.previousElementSibling;
                if (input) input.classList.remove('border-red-500');
            }
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            clearError(elements.kodeError, elements.kodeErrorMessage);
            clearError(elements.namaError, elements.namaErrorMessage);
            clearError(elements.kampusError, elements.kampusErrorMessage);

            let isValid = true;

            if (!elements.kodeInput.value.trim()) {
                showError(elements.kodeError, elements.kodeErrorMessage, errorMessages.kodeRequired);
                isValid = false;
            }

            if (!elements.namaInput.value.trim()) {
                showError(elements.namaError, elements.namaErrorMessage, errorMessages.namaRequired);
                isValid = false;
            }

            if (!elements.kampusInput.value.trim()) {
                showError(elements.kampusError, elements.kampusErrorMessage, errorMessages
                    .kampusRequired);
                isValid = false;
            }

            if (isValid) {
                form.submit();
            }
        });

        // Clear error saat input diisi
        if (elements.kodeInput) {
            elements.kodeInput.addEventListener('input', function() {
                clearError(elements.kodeError, elements.kodeErrorMessage);
            });
        }

        if (elements.namaInput) {
            elements.namaInput.addEventListener('input', function() {
                clearError(elements.namaError, elements.namaErrorMessage);
            });
        }

        if (elements.kampusInput) {
            elements.kampusInput.addEventListener('change', function() {
                clearError(elements.kampusError, elements.kampusErrorMessage);
            });
        }
    });
</script>
