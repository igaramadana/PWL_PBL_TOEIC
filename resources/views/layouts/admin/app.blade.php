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

    <title>{{ $page->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="flex flex-col min-h-screen bg-white dark:bg-gray-900">
    @include('layouts.admin.partials.header')
    @include('layouts.admin.partials.sidebar')

    <main class="flex-grow px-6 mt-8 mb-8 sm:ml-64">
        @yield('content')
    </main>

    @include('layouts.admin.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
    @if (session('toast_success'))
        <script>
            Toastify({
                text: "{{ session('toast_success') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#0E9F6E",
                    color: "#ffffff",
                    borderRadius: "0.5rem",
                    boxShadow: "0 1px 3px rgba(0, 0, 0, 0.1)",
                    padding: "1rem",
                    display: "flex",
                    alignItems: "center",
                    gap: "0.75rem"
                },
                avatar: "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0iY3VycmVudENvbG9yIj48cGF0aCBkPSJNMTAgLjVhOS41IDkuNSAwIDEgMCA5LjUgOS41QTEwIDEwIDAgMCAwIDEwIC41Wk0xMy43MDcgOC43MDdsLTQgNGEuOTk5Ljk5OSAwIDAgMS0xLjQxNCAwbC0yLTJhLjk5OS45OTkgMCAwIDEgMS40MTQtMS40MTRMOSAxMC41ODZsMy4yOTMtMy4yOTNhLjk5OS45OTkgMCAwIDEgMS40MTQgMS40MTRaIi8+PC9zdmc+"
            }).showToast();
        </script>
    @endif

    @if (session('toast_error'))
        <script>
            Toastify({
                text: "{{ session('toast_error') }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#C81E1E",
                    color: "#ffffff",
                    borderRadius: "0.5rem",
                    boxShadow: "0 1px 3px rgba(0, 0, 0, 0.1)",
                    padding: "1rem",
                    display: "flex",
                    alignItems: "center",
                    gap: "0.75rem"
                },
                avatar: "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0iY3VycmVudENvbG9yIj48cGF0aCBkPSJNMTAgLjVhOS41IDkuNSAwIDEgMCA5LjUgOS41QTEwIDEwIDAgMCAwIDEwIC41Wk0xMy43MDcgMTEuNzkzYTEgMSAwIDEgMS0xLjQxNCAxLjQxNEwxMCAxMS40MTRsLTIuMjkzIDIuMjkzYTEgMSAwIDAgMS0xLjQxNC0xLjQxNEw4LjU4NiAxMCA2LjI5MyA3LjcwN2ExIDEgMCAwIDEgMS40MTQtMS40MTRMMTAgOC41ODZsMi4yOTMtMi4yOTNhMSAxIDAgMCAxIDEuNDE0IDEuNDE0TDExLjQxNCAxMGwyLjI5MyAyLjI5M1oiLz48L3N2Zz4="
            }).showToast();
        </script>
    @endif
</body>

</html>
