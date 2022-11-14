<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKRIPSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="{{ asset('css/styindex.css') }}">

</head>

<body style="background-image: url('img/3.png'); ">
    <div>
        <div class="header-dark"style="background-color:darkslategray;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><img src="img/18.png" width="80" height="80" role="img"
                        border-radius="50%" style="
                    border-radius: 50%;"><button
                        class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span
                            class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('Usaha.index')}}">Info
                                    Usaha</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('artikel')}}">Minuman
                                    Boba</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('profile.index')}}">Profile</a>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input
                                    class="form-control search-field" type="search" name="search" id="search-field">
                            </div>
                        </form><span class="navbar-text"><a class="btn btn-light action-button" role="button"
                                href="{{route('login')}}">Masuk</a></span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <br>

   <main>
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
