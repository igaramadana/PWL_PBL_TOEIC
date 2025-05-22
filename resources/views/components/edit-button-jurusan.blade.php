<div>
    <button data-tooltip-target="tooltip-edit" data-modal-target="edit-modal-{{ $jurusan_id }}"
        data-modal-toggle="edit-modal-{{ $jurusan_id }}" type="button"
        class="p-2 text-gray-900 bg-yellow-500 rounded-lg dark:text-gray-50 dark:bg-yellow-500 hover:text-white hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 dark:hover:text-white dark:hover:bg-yellow-500">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
        </svg>
        <span class="sr-only">Edit</span>
    </button>

    <!-- Modal Edit -->
    <div id="edit-modal-{{ $jurusan_id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ __('jurusan.modalEditHeader') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-modal-{{ $jurusan_id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="jurusan-edit-form-{{ $jurusan_id }}" class="p-4 md:p-5"
                    action="{{ route('jurusan.update', $jurusan_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="jurusan_kode_{{ $jurusan_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormCode') }}</label>
                            <input type="text" name="jurusan_kode" id="jurusan_kode_{{ $jurusan_id }}"
                                value="{{ $jurusan_kode ?? '' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('jurusan.formCodePlaceholder') }}">
                            <p id="kode-error-{{ $jurusan_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="kode-error-message-{{ $jurusan_id }}"></span>
                            </p>
                        </div>
                        <div>
                            <label for="jurusan_nama_{{ $jurusan_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormName') }}</label>
                            <input type="text" name="jurusan_nama" id="jurusan_nama_{{ $jurusan_id }}"
                                value="{{ $jurusan_nama ?? '' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('jurusan.formNamePlaceholder') }}">
                            <p id="nama-error-{{ $jurusan_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="nama-error-message-{{ $jurusan_id }}"></span>
                            </p>
                        </div>
                        <div>
                            <label for="kampus_id_{{ $jurusan_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('jurusan.modalFormKampus') }}</label>
                            <select name="kampus_id" id="kampus_id_{{ $jurusan_id }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">{{ __('jurusan.formKampusPlaceholder') }}</option>
                                @foreach ($kampus as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == $kampus_id ? 'selected' : '' }}>
                                        {{ $k->kampus_nama }}</option>
                                @endforeach
                            </select>
                            <p id="kampus-error-{{ $jurusan_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="kampus-error-message-{{ $jurusan_id }}"></span>
                            </p>
                        </div>
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('jurusan.modalFooterUpdate') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('jurusan-edit-form-{{ $jurusan_id }}');
            const kodeInput = document.getElementById('jurusan_kode_{{ $jurusan_id }}');
            const namaInput = document.getElementById('jurusan_nama_{{ $jurusan_id }}');
            const kampusInput = document.getElementById('kampus_id_{{ $jurusan_id }}');
            const kodeError = document.getElementById('kode-error-{{ $jurusan_id }}');
            const namaError = document.getElementById('nama-error-{{ $jurusan_id }}');
            const kampusError = document.getElementById('kampus-error-{{ $jurusan_id }}');

            const errorMessages = {
                kodeRequired: '{{ __('jurusan.codeRequired') }}',
                namaRequired: '{{ __('jurusan.nameRequired') }}',
                kampusRequired: '{{ __('jurusan.kampusRequired') }}'
            };

            function showError(element, message) {
                if (element) {
                    element.querySelector('span').textContent = message;
                    element.classList.remove('hidden');
                    const input = element.previousElementSibling;
                    if (input) input.classList.add('border-red-500');
                }
            }

            function clearError(element) {
                if (element) {
                    element.querySelector('span').textContent = '';
                    element.classList.add('hidden');
                    const input = element.previousElementSibling;
                    if (input) input.classList.remove('border-red-500');
                }
            }

            form.addEventListener('submit', function(e) {
                let isValid = true;

                if (!kodeInput.value.trim()) {
                    showError(kodeError, errorMessages.kodeRequired);
                    isValid = false;
                } else {
                    clearError(kodeError);
                }

                if (!namaInput.value.trim()) {
                    showError(namaError, errorMessages.namaRequired);
                    isValid = false;
                } else {
                    clearError(namaError);
                }

                if (!kampusInput.value.trim()) {
                    showError(kampusError, errorMessages.kampusRequired);
                    isValid = false;
                } else {
                    clearError(kampusError);
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });

            kodeInput.addEventListener('input', function() {
                if (kodeInput.value.trim()) {
                    clearError(kodeError);
                }
            });

            namaInput.addEventListener('input', function() {
                if (namaInput.value.trim()) {
                    clearError(namaError);
                }
            });

            kampusInput.addEventListener('change', function() {
                if (kampusInput.value.trim()) {
                    clearError(kampusError);
                }
            });
        });
    </script>
</div>
