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
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div class="relative">
                                <input type="email" id="floating_outlined" class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none border-1s dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('login.loginEmail') }}</label>
                            </div>
                            <div class="relative">
                                <input type="password" id="floating_outlined" class="block px-2.5 pt-4 pb-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 appearance-none border-1s dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ __('login.loginPassword') }}</label>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                            class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                            required="">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-gray-300">
                                            {{ __('login.loginRemember') }}
                                        </label>
                                    </div>
                                </div>
                                <a href="/forgot-password"
                                    class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                    {{ __('login.loginForgot') }}</a>
                            </div>
                            <button type="submit"
                                class="px-5 py-2.5 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                {{ __('login.loginButton') }}</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">{{ __('login.loginRegister') }}
                                <a href="{{ route('register') }}"
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('login.loginRegisterButton') }}</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
