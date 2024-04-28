<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
</head>

<body class="">
    <div class="">
        @include('layouts.flash')
        <nav class="fixed top-0 left-0 right-0 z-50">
            @include('layouts.navbar')
        </nav>
        <!-- Page Content -->
        <main class="w-full mt-[11vh]">
            {{ $slot }}
        </main>

        <footer>
            @include('layouts.footer')
        </footer>

    </div>
</body>

</html>
