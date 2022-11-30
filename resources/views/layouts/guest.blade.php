<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->

    <link rel="stylesheet" href="{{ asset('build/assets/app.08b0e096.css') }}">


    {{-- Animasi --}}
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script>
        new WOW().init();
    </script>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased overflow-x-hidden">
        {{ $slot }}
    </div>
    <script defer src="{{ asset('build/assets/app.ccef2707.js') }}"></script>

</body>

</html>
