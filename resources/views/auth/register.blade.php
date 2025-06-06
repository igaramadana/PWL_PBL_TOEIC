<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="92x92" href="{{ asset('favicon/favicon-96x96.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/web-app-manifest-192x192.png') }}">
    <meta name="theme-color" content="#ffffff">

    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-white dark:bg-gray-900">
    <main>
        <section class="flex flex-col justify-center items-center p-4 my-6 min-h-screen">
            <a href="#" class="flex items-center mb-6 text-xl font-semibold text-gray-900 dark:text-white">
                <img src="/img/SistemLogo.png" alt="logo" style="width: 60px; height: auto;">
                TOEIC
            </a>
            <div class="w-full max-w-2xl bg-white rounded-lg border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700"
                data-aos="zoom-in-down">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="mb-6 text-xl font-bold tracking-tight leading-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('register.registerMhsTitle') }}
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="MHS">

                        <!-- Nama -->
                        <div class="mb-6">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formName') }}</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Iga Ramadana" required />
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIM dan No Telp -->
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="nim"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formNim') }}</label>
                                <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123456789" required />
                                @error('nim')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <div class="mx-auto max-w-sm">
                                    <label for="no_telp"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formPhone') }}</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 top-0 items-center pointer-events-none start-0 ps-3.5">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 19 18">
                                                <path
                                                    d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                            </svg>
                                        </div>
                                        <input type="number" name="no_telp" id="no_telp"
                                            aria-describedby="helper-text-explanation"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 ps-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                                        @error('no_telp')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kampus, Jurusan, Prodi -->
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="kampus_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formCampus') }}</label>
                                <select name="kampus_id" id="kampus_id"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                    <option value="">Pilih Kampus</option>
                                    @foreach ($kampuses as $kampus)
                                        <option value="{{ $kampus->id }}">{{ $kampus->kampus_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="jurusan_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formMajor') }}</label>
                                <select name="jurusan_id" id="jurusan_id"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required disabled>
                                    <option value="">Pilih Jurusan</option>
                                </select>
                            </div>
                            <div>
                                <label for="prodi_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formProdi') }}</label>
                                <select name="prodi_id" id="prodi_id"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required disabled>
                                    <option value="">Pilih Program Studi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Angkatan -->
                        <div class="mb-6">
                            <div>
                                <label for="angkatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Angkatan') }}</label>
                                <input type="number" name="angkatan" id="angkatan" value="{{ old('angkatan') }}"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="2023" required />
                                @error('angkatan')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-6">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Status') }}</label>
                            <select name="status" id="status"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="Aktif">{{ __('Aktif') }}</option>
                                <option value="Alumni">{{ __('Alumni') }}</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formEmail') }}</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formPassword') }}</label>
                            <input type="password" name="password" id="password"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required />
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <label for="confirm_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formConfirmPassword') }}</label>
                            <input type="password" name="password_confirmation" id="confirm_password"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required />
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="remember" name="terms" type="checkbox" value="1"
                                    class="w-4 h-4 bg-gray-50 rounded-sm border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                    required />
                            </div>
                            <label for="remember" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">I
                                agree with
                                the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms
                                    and
                                    conditions</a>.</label>
                            @error('terms')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-5 py-2.5 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('register.buttonRegister') }}</button>

                        <!-- Login Link -->
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            {{ __('register.haveAccount') }} <a href="{{ route('login') }}"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('register.buttonloginHere') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        $(document).ready(function() {
            $('#kampus_id').change(function() {
                var kampus_id = $(this).val();
                $('#jurusan_id').empty().append('<option value="">Pilih Jurusan</option>').prop('disabled',
                    true);
                $('#prodi_id').empty().append('<option value="">Pilih Program Studi</option>').prop(
                    'disabled', true);

                if (kampus_id) {
                    $.get('/get-jurusan/' + kampus_id, function(data) {
                        $('#jurusan_id').prop('disabled', false);
                        $.each(data, function(key, value) {
                            $('#jurusan_id').append('<option value="' + value.id + '">' +
                                value.jurusan_nama + '</option>');
                        });
                    });
                }
            });

            $('#jurusan_id').change(function() {
                var jurusan_id = $(this).val();
                $('#prodi_id').empty().append('<option value="">Pilih Program Studi</option>').prop(
                    'disabled', true);

                if (jurusan_id) {
                    $.get('/get-prodi/' + jurusan_id, function(data) {
                        $('#prodi_id').prop('disabled', false);
                        $.each(data, function(key, value) {
                            $('#prodi_id').append('<option value="' + value.id + '">' +
                                value.prodi_nama + '</option>');
                        });
                    });
                }
            });
        });
    </script>
</body>

</html>
