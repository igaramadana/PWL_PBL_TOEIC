<div>
    <button data-modal-target="edit-modal-{{ $prodi_id }}" data-modal-toggle="edit-modal-{{ $prodi_id }}"
        type="button"
        class="p-2 text-gray-900 bg-yellow-500 rounded-lg dark:text-gray-50 dark:bg-yellow-500 hover:text-white hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 dark:hover:text-white dark:hover:bg-yellow-500">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
        </svg>
        <span class="sr-only">Edit</span>
    </button>

    <!-- Modal Edit -->
    <div id="edit-modal-{{ $prodi_id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-gray-900/50 dark:bg-gray-900/80">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center p-4 rounded-t border-b border-gray-200 md:p-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ __('prodi.modalEditHeader') }}
                    </h3>
                    <button type="button"
                        class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-modal-{{ $prodi_id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="prodi-edit-form-{{ $prodi_id }}" class="p-4 md:p-5"
                    action="{{ route('prodi.update', $prodi_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="prodi_kode_{{ $prodi_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('prodi.modalFormCode') }}</label>
                            <input type="text" name="prodi_kode" id="prodi_kode_{{ $prodi_id }}"
                                value="{{ $prodi_kode ?? '' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('prodi.formCodePlaceholder') }}">
                            <p id="kode-error-{{ $prodi_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="kode-error-message-{{ $prodi_id }}"></span>
                            </p>
                        </div>
                        <div>
                            <label for="prodi_nama_{{ $prodi_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('prodi.modalFormName') }}</label>
                            <input type="text" name="prodi_nama" id="prodi_nama_{{ $prodi_id }}"
                                value="{{ $prodi_nama ?? '' }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ __('prodi.formNamePlaceholder') }}">
                            <p id="nama-error-{{ $prodi_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="nama-error-message-{{ $prodi_id }}"></span>
                            </p>
                        </div>
                        <div>
                            <label for="jurusan_id_{{ $prodi_id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('prodi.modalFormJurusan') }}</label>
                            <select name="jurusan_id" id="jurusan_id_{{ $prodi_id }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">{{ __('prodi.formJurusanPlaceholder') }}</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ $j->id == $jurusan_id ? 'selected' : '' }}>
                                        {{ $j->jurusan_nama }}</option>
                                @endforeach
                            </select>
                            <p id="jurusan-error-{{ $prodi_id }}"
                                class="hidden mt-1 text-xs text-red-600 dark:text-red-400">
                                <span id="jurusan-error-message-{{ $prodi_id }}"></span>
                            </p>
                        </div>
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('prodi.modalFooterUpdate') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('prodi-edit-form-{{ $prodi_id }}');
            const kodeInput = document.getElementById('prodi_kode_{{ $prodi_id }}');
            const namaInput = document.getElementById('prodi_nama_{{ $prodi_id }}');
            const jurusanInput = document.getElementById('jurusan_id_{{ $prodi_id }}');
            const kodeError = document.getElementById('kode-error-{{ $prodi_id }}');
            const namaError = document.getElementById('nama-error-{{ $prodi_id }}');
            const jurusanError = document.getElementById('jurusan-error-{{ $prodi_id }}');

            const errorMessages = {
                kodeRequired: '{{ __('prodi.codeRequired') }}',
                namaRequired: '{{ __('prodi.nameRequired') }}',
                jurusanRequired: '{{ __('prodi.jurusanRequired') }}'
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

                if (!jurusanInput.value.trim()) {
                    showError(jurusanError, errorMessages.jurusanRequired);
                    isValid = false;
                } else {
                    clearError(jurusanError);
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

            jurusanInput.addEventListener('change', function() {
                if (jurusanInput.value.trim()) {
                    clearError(jurusanError);
                }
            });
        });
    </script>
</div>
