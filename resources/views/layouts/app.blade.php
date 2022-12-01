<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SPK - {{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('aset/images/fevicon.png') }}" type="image/png" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('aset/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styindex.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('build/assets/app.6fd1fe47.css') }}">


    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>

</head>

<body class="overflow-x-hidden overflow-y-auto h-screen bg-base-200">
    <div class="animation-loading bg-info opacity-90">
        <div class="flip-to-square ">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="md:w-0 lg:w-0 w-0 -translate-x-64"></div>
        </div>
    </div>
    @include('sweetalert::alert')
    <div id="Sidebar"
        class="wow slideIn hidden md:flex  md:w-1/4 lg:w-[15%] h-full items-start bg-info flex-wrap absolute left-0 shadow-sm shadow-white z-20 transition-all ease-in-out">
        <div class=" flex md:hidden w-full justify-end">
            <button type="button" class="btn btn-info text-white btnSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="flex w-full justify-center items-center flex-wrap md:mt-10">
            <div class="avatar online hidden md:block">
                <div class="w-24 rounded-full">
                    <img src="{{ asset('img/ben-sweet-2LowviVHZ-E-unsplash.jpg') }}" />
                </div>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
    <main  id="content"
        class=" md:ml-[25%] lg:ml-[15%] overflow-x-hidden overflow-y-auto h-screen transition-all ease-in-out">
        <div class="navbar bg-info">
            <div class="flex-1">
                <button type="button" class="btn btn-info text-white btnSidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <a class="btn btn-ghost normal-case text-xl text-white hidden md:flex">{{ $page }}</a>
            </div>
            <div class="flex-none gap-2">
                <div class="form-control hidden md:flex">
                    <input type="text" placeholder="Search" class="input input-bordered" />
                </div>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('img/ben-sweet-2LowviVHZ-E-unsplash.jpg') }}" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between" href="{{ route('profile.index') }}">
                                Profile
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="md:container mx-auto md:px-2 md:py-4 w-full relative box-border overflow-x-auto">
            {{ $slot }}
        </div>
    </main>
    <!-- jQuery -->

    <!-- wow animation -->
    <script src="{{ asset('aset/js/animate.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('aset/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('build/assets/app.98245433.js') }}"></script>

</body>

</html>
