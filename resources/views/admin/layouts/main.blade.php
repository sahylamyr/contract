<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link type="text/css" href="{{ asset('back/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        {{-- <link type="text/css" href="{{ asset('back/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet"> --}}
        <link type="text/css" href="{{ asset('back/css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('back/images/icons/css/font-awesome.css') }}" rel="stylesheet">
        {{-- <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'> --}}



    </head>

<body onload="loading()">



    <div class="loading">
        <div class="loadingio-spinner-dual-ring-dwys0ausuxo">
            <div class="ldio-vq4gpnvplme">
                <div></div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="/admin">ADMIN </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li><a href="/"><i class="icon-eye-open"></i></a></li>
                    </ul>

                    <ul class="nav pull-right">
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('back/images/user.png') }}" class="nav-avatar" />
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @auth
                                    <li><a href="#">{{ auth()->user()->name }}</a></li>
                                    <li><a href="{{ route('auth.logout') }}">Çıxış</a></li>

                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            @php
                                $route = Route::currentRouteName();
                            @endphp
                            <style>
                                .s-active {
                                    color: white !important;
                                }

                                .s-active i {
                                    color: white !important;
                                }
                            </style>
                            <li><a @if ($route == 'admin.categories.index' || $route == 'admin.categories.create' || $route == 'admin.categories.edit') class="s-active" @endif
                                    href="{{ route('admin.categories.index') }}"><i
                                        class="menu-icon icon-list"></i>Kateqoriyalar
                                </a></li>
                            <li><a @if ($route == 'admin.contracts.index' || $route == 'admin.contracts.create' || $route == 'admin.contracts.edit') class="s-active" @endif
                                    href="{{ route('admin.contracts.index') }}"><i
                                        class="menu-icon icon-book"></i>Müqavilələr </a></li>
                        </ul>
                        <!--/.widget-nav-->



                        <ul class="widget widget-menu unstyled">
                            <li><a href="{{ route('auth.logout') }}"><i class="menu-icon icon-signout"></i>Çıxış </a>
                            </li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9">

                    @yield('content')
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    {{-- <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
        </div>
    </div> --}}
    <script src="{{ asset('back/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('back/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('back/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/scripts/common.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/scripts/slugify/slugify.js') }}"></script>
    @stack('scripts')


    <script>


        




        function loading() {
            var loading = document.querySelector('.loading')

            loading.style.display = 'none'

        }
    </script>
</body>
