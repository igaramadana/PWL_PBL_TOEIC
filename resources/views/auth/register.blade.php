<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-white dark:bg-gray-900">

    <main>
        <section class="flex flex-col items-center justify-center min-h-screen p-4 my-6">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/img/PolinemaLogo.png" alt="logo">
                PBL TOEIC
            </a>
            <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" data-aos="zoom-in-down">
                <div class="p-6 space-y-4 overflow-y-auto md:space-y-6 sm:p-8">
                    <!-- Tabs -->
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" id="mahasiswa-tab" data-tabs-target="#mahasiswa" type="button" role="tab" aria-controls="mahasiswa" aria-selected="true">Mahasiswa</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 cursor-pointer" id="tendik-tab" data-tabs-target="#tendik" type="button" role="tab" aria-controls="tendik" aria-selected="false">Tendik</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab Content -->
                    <div id="default-tab-content">
                        <!-- Form Mahasiswa -->
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                            <h1 class="mb-6 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                {{ __('register.registerMhsTitle') }}
                            </h1>
                            <form class="space-y-4 md:space-y-6" action="#">
                                <div class="mb-6">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formName') }}</label>
                                    <input type="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Iga Ramadana" required />
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formNim') }}</label>
                                        <input type="text" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123456789" required />
                                    </div>
                                    <div>
                                        <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('register.formPhone')}}</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="campus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formCampus') }}</label>
                                        <select id="campus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>{{ __('register.formCampus') }}</option>
                                            <option value="main">Main Campus (Malang)</option>
                                            <option value="kediri">PSDKU Kediri</option>
                                            <option value="lumajang">PSDKU Lumajang</option>
                                            <option value="pamekasan">PSDKU Pamekasan</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formMajor') }}</label>
                                        <select id="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>{{ __('register.formMajor') }}</option>
                                            <option value="ti">Teknologi Informasi</option>
                                            <option value="ts">Teknik Sipil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formProdi') }}</label>
                                    <select id="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>{{ __('register.formProdi') }}</option>
                                        <option value="sib">D-IV Sistem Informasi Bisnis</option>
                                        <option value="ti">D-IV Teknik Informatika</option>
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formEmail') }}</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required />
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formPassword') }}</label>
                                    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                                </div>
                                <div class="mb-6">
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formConfirmPassword') }}</label>
                                    <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                                </div>
                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                                    </div>
                                    <label for="remember" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('register.buttonRegister') }}</button>
                                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    {{ __('register.haveAccount') }} <a href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('register.buttonloginHere') }}</a>
                                </p>
                            </form>
                        </div>

                        <!-- Form Tendik -->
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="tendik" role="tabpanel" aria-labelledby="tendik-tab">
                            <h1 class="mb-6 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                {{ __('register.registerTndTitle') }}
                            </h1>
                            <form class="space-y-4 md:space-y-6" action="#">
                                <div class="mb-6">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formName') }}</label>
                                    <input type="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Iga Ramadana" required />
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formNip') }}</label>
                                        <input type="text" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123456789" required />
                                    </div>
                                    <div>
                                        <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('register.formPhone')}}</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                                </svg>
                                            </div>
                                            <input type="text" id="phone-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="email_tendik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formEmail') }}</label>
                                    <input type="email" id="email_tendik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required />
                                </div>
                                <div class="mb-6">
                                    <label for="password_tendik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formPassword') }}</label>
                                    <input type="password" id="password_tendik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                                </div>
                                <div class="mb-6">
                                    <label for="confirm_password_tendik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.formConfirmPassword') }}</label>
                                    <input type="password" id="confirm_password_tendik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                                </div>
                                <div class="flex items-start mb-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember_tendik" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                                    </div>
                                    <label for="remember_tendik" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('register.buttonRegister') }}</button>
                                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    {{ __('register.haveAccount') }} <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('register.buttonloginHere') }}</a>
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
