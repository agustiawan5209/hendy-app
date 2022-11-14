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
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('aset/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('aset/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('aset/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('aset/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('aset/css/color_2.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('aset/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('aset/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('aset/css/custom.css') }}" />
    <!--[if lt IE 9]>
      <script src="aset/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="aset/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="aset/index.html"><img class="logo_icon img-responsive"
                                    src="aset/images/logo/logo_icon.png" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive" src="aset/images/layout_img/user_img.jpg"
                                    alt="#" /></div>
                            <div class="user_info">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    @include('layouts.sidebar')
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="aset/index.html"><img class="img-responsive" src="aset/images/logo/logo.png"
                                        alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="aset/#"><i class="fa fa-bell-o"></i><span
                                                    class="badge">2</span></a></li>
                                        <li><a href="aset/#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="aset/#"><i class="fa fa-envelope-o"></i><span
                                                    class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="aset/images/layout_img/user_img.jpg" alt="#" /><span
                                                    class="name_user">John David</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="aset/profile.html">My Profile</a>
                                                <a class="dropdown-item" href="aset/settings.html">Settings</a>
                                                <a class="dropdown-item" href="aset/help.html">Help</a>
                                                <a class="dropdown-item" href="aset/#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid mt-10">
                        {{ $slot }}
                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                                Distributed By: <a href="aset/https://themewagon.com/">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('aset/js/popper.min.js') }}"></script>
    <script src="{{ asset('aset/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('aset/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('aset/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('aset/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('aset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('aset/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('aset/js/utils.js') }}"></script>
    <script src="{{ asset('aset/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('aset/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('aset/js/custom.js') }}"></script>
</body>

</html>
