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
    <script>
        // Cek tema saat pertama kali load
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
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
                                placeholder="{{ __('register.formName') }}" required />
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
                                <label for="no_telp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formPhone') }}</label>
                                <div class="flex">
                                    <div class="relative w-32">
                                        <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone"
                                            class="inline-flex z-10 items-center px-4 py-2.5 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 shrink-0 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                            type="button">
                                            <img src="{{ asset('img/indoFlag.svg') }}" class="w-4 h-4 me-2"
                                                alt="indo flag">
                                            +62
                                        </button>
                                        <div id="dropdown-phone"
                                            class="hidden z-10 w-52 bg-white rounded-lg divide-y divide-gray-100 shadow-sm dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdown-phone-button">
                                                <li>
                                                    <button type="button"
                                                        class="inline-flex px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">
                                                        <span class="inline-flex items-center">
                                                            <svg fill="none" aria-hidden="true" class="w-4 h-4 me-2"
                                                                viewBox="0 0 20 15">
                                                                <rect width="19.6" height="14" y=".5"
                                                                    fill="#fff" rx="2" />
                                                                <mask id="a" style="mask-type:luminance"
                                                                    width="20" height="15" x="0" y="0"
                                                                    maskUnits="userSpaceOnUse">
                                                                    <rect width="19.6" height="14" y=".5"
                                                                        fill="#fff" rx="2" />
                                                                </mask>
                                                                <g mask="url(#a)">
                                                                    <path fill="#D02F44" fill-rule="evenodd"
                                                                        d="M19.6.5H0v.933h19.6V.5zm0 1.867H0V3.3h19.6v-.933zM0 4.233h19.6v.934H0v-.934zM19.6 6.1H0v.933h19.6V6.1zM0 7.967h19.6V8.9H0v-.933zm19.6 1.866H0v.934h19.6v-.934zM0 11.7h19.6v.933H0V11.7zm19.6 1.867H0v.933h19.6v-.933z"
                                                                        clip-rule="evenodd" />
                                                                    <path fill="#46467F" d="M0 .5h8.4v6.533H0z" />
                                                                </g>
                                                            </svg>
                                                            Indonesia (+62)
                                                        </span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="number" name="no_telp" id="no_telp"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-e-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="81234567890" required />
                                    @error('no_telp')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
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
