<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKRIPSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="{{ asset('css/styindex.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body  class="overflow-y-auto overflow-x-hidden">
    <div class="navbar bg-info">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ url('/') }}">Home</a></li>
                    <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ route('artikel') }}">Artikel</a></li>
                    <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ route('Usaha.index') }}">Info Usaha</a></li>

                </ul>
            </div>
            <a class="btn btn-ghost normal-case text-xl text-white">SPK</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ url('/') }}">Home</a></li>
                <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ route('artikel') }}">Artikel</a></li>
                <li class="text-white"><a class="text-whte hover:text-gray-100" href="{{ route('Usaha.index') }}">Info Usaha</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="{{ route('login') }}" class="btn btn-primary text-white">Masuk</a>
        </div>
    </div>
    <main class="contents">
        @yield('content')
    </main>
    <br>

    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color:darkslategray;">
            <h5 style="color: floralwhite">© 2020 Copyright:</h5>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
