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
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col justify-center items-center px-6 py-6 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="mr-2 w-8 h-8" src="/img/PolinemaLogo.png" alt="logo">
                    PBL TOEIC
                </a>
                <div
                    class="w-full bg-white rounded-lg border border-gray-200 shadow-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700" data-aos="zoom-in-down">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold tracking-tight leading-tight text-gray-900 md:text-2xl dark:text-white">
                            {{ __('login.loginTitle') }}
                        </h1>

                        <!-- Error container untuk JavaScript validation -->
                        <div id="error-container" class="hidden p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <ul class="space-y-1" id="error-list">
                            </ul>
                        </div>

                        <!-- PHP validation errors (tetap dipertahankan sebagai fallback) -->
                        @if($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <ul class="space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="flex items-start">
                                            <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span>{{ $error }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="login-form" class="space-y-4 md:space-y-6" action="{{ route('login.process') }}" method="POST" novalidate>
                            @csrf
                            <div>
                                <div class="relative">
                                    <input type="email" id="floating_outlined" name="email"
                                    class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none border-1s dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('email') border-red-500 dark:border-red-500 @enderror"
                                    placeholder=" "
                                    value="{{ old('email') }}" />
                                <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('login.loginEmail') }}</label>
                                </div>
                                <p id="email-error" class="flex hidden items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                    <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span></span>
                                </p>
                                @error('email')
                                    <p class="flex items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                        <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <div class="relative">
                                    <input type="password" id="floating_outlined_password" name="password"
                                        class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg appearance-none border-1s dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('password') border-red-500 dark:border-red-500 @enderror"
                                        placeholder=" " />
                                    <label for="floating_outlined_password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('login.loginPassword') }}</label>
                                </div>
                                <p id="password-error" class="flex hidden items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                    <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span></span>
                                </p>
                                @error('password')
                                    <p class="flex items-start mt-1 text-xs text-red-600 sm:text-sm dark:text-red-400">
                                        <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <div class="flex flex-col justify-between items-start space-y-3 sm:flex-row sm:items-center sm:space-y-0">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                            class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-gray-300">
                                            {{ __('login.loginRemember') }}
                                        </label>
                                    </div>
                                </div>
                                <a href="/forgot-password"
                                    class="text-sm font-medium text-blue-600 whitespace-nowrap hover:underline dark:text-blue-500">
                                    {{ __('login.loginForgot') }}</a>
                            </div>
                            <button type="submit"
                                class="px-5 py-2.5 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg transition-colors duration-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                {{ __('login.loginButton') }}</button>
                            <p class="text-sm font-light text-center text-gray-500 dark:text-gray-400 sm:text-left">
                                {{ __('login.loginRegister') }}
                                <a href="{{ route('register') }}"
                                    class="font-medium text-blue-600 whitespace-nowrap hover:underline dark:text-blue-500">{{ __('login.loginRegisterButton') }}</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            easing: 'ease-out-quad',
            once: true
        });
    </script>

    <!-- Script untuk validasi form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('login-form');
            const emailInput = document.getElementById('floating_outlined');
            const passwordInput = document.getElementById('floating_outlined_password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            const errorContainer = document.getElementById('error-container');
            const errorList = document.getElementById('error-list');

            // Pesan error berdasarkan bahasa dari file validation.php
            const locale = document.documentElement.lang || 'en';
            const errorMessages = {
                en: {
                    emailRequired: '{{ __("validation.custom.email.required") }}',
                    emailInvalid: '{{ __("validation.custom.email.email") }}',
                    passwordRequired: '{{ __("validation.custom.password.required") }}',
                    passwordMinLength: '{{ __("validation.custom.password.min", ["min" => 8]) }}',
                    loginFailed: '{{ __("validation.custom.login_failed") }}'
                },
                id: {
                    emailRequired: '{{ __("validation.custom.email.required") }}',
                    emailInvalid: '{{ __("validation.custom.email.email") }}',
                    passwordRequired: '{{ __("validation.custom.password.required") }}',
                    passwordMinLength: '{{ __("validation.custom.password.min", ["min" => 8]) }}',
                    loginFailed: '{{ __("validation.custom.login_failed") }}'
                }
            };

            // Fungsi untuk menampilkan error
            function showError(element, message) {
                element.querySelector('span').textContent = message;
                element.classList.remove('hidden');
                element.parentElement.querySelector('input').classList.add('border-red-500');
                element.parentElement.querySelector('input').classList.add('dark:border-red-500');
            }

            // Fungsi untuk menghapus error
            function clearError(element) {
                element.classList.add('hidden');
                element.parentElement.querySelector('input').classList.remove('border-red-500');
                element.parentElement.querySelector('input').classList.remove('dark:border-red-500');
            }

            // Fungsi untuk menampilkan error umum
            function showGeneralError(message) {
                errorList.innerHTML = '';
                const li = document.createElement('li');
                li.className = 'flex items-start';
                li.innerHTML = `
                    <svg class="flex-shrink-0 mt-0.5 mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span>${message}</span>
                `;
                errorList.appendChild(li);
                errorContainer.classList.remove('hidden');
            }

            // Fungsi untuk menghapus semua error
            function clearAllErrors() {
                clearError(emailError);
                clearError(passwordError);
                errorContainer.classList.add('hidden');
                errorList.innerHTML = '';
            }

            // Validasi email
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(String(email).toLowerCase());
            }

            // Event listener untuk validasi saat submit
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                clearAllErrors();

                let isValid = true;
                const messages = errorMessages[locale] || errorMessages.en;

                // Validasi email
                if (!emailInput.value.trim()) {
                    showError(emailError, messages.emailRequired);
                    isValid = false;
                } else if (!validateEmail(emailInput.value.trim())) {
                    showError(emailError, messages.emailInvalid);
                    isValid = false;
                }

                // Validasi password
                if (!passwordInput.value.trim()) {
                    showError(passwordError, messages.passwordRequired);
                    isValid = false;
                } else if (passwordInput.value.length < 8) {
                    showError(passwordError, messages.passwordMinLength);
                    isValid = false;
                }

                if (isValid) {
                    // Jika valid, kirim form
                    form.submit();
                }
            });

            // Event listener untuk menghapus error saat input berubah
            emailInput.addEventListener('input', function() {
                clearError(emailError);
            });

            passwordInput.addEventListener('input', function() {
                clearError(passwordError);
            });
        });
    </script>
</body>

</html>
