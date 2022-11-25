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
    <!--[if lt IE 9]>
      <script src="aset/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="aset/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styindex.css') }}">
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</head>

<body class="overflow-x-hidden overflow-y-auto h-screen">
    <div class="animation bg-info opacity-90">
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
        </div>
    </div>
    @include('sweetalert::alert')
    <div class=" hidden md:flex md:w-1/4 lg:w-[15%] h-full items-start pt-20 bg-info absolute left-0 shadow-sm shadow-white z-20">
        @include('layouts.sidebar')
    </div>
    <main class=" md:ml-[25%] lg:ml-[15%] overflow-x-hidden overflow-y-auto h-screen">
        <div class="navbar bg-info">
            <div class="flex-1">
                <a class="btn btn-ghost normal-case text-xl text-white">{{ $page }}</a>
            </div>
            <div class="flex-none gap-2">
                <div class="form-control">
                    <input type="text" placeholder="Search" class="input input-bordered" />
                </div>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-2 py-4 w-full relative box-border">
            {{ $slot }}
        </div>
    </main>
    <!-- jQuery -->
    <!-- wow animation -->
    <script src="{{ asset('aset/js/animate.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('aset/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('aset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('aset/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/matrix.js') }}"></script>
    <script src="{{ asset('js/matrixAlternatif.js') }}"></script>
</body>

</html>
