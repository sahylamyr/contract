<!DOCTYPE html>
<html lang="az">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link type="text/css" href="{{ asset('back/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        {{-- <link type="text/css" href="{{ asset('back/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet"> --}}
        <link type="text/css" href="{{ asset('back/css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('back/images/icons/css/font-awesome.css') }}" rel="stylesheet">


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
    @php
        $segment = request()->segment(2);
        
    @endphp
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class=""><a href="{{ route('index') }}"
                                    style="{{ $segment === null ? 'color: white;' : '' }}"><i
                                        class="menu-icon icon-circle"></i>Bütün kateqoriyalar
                                </a></li>


                            @foreach ($categories as $item)
                                <li><a style="{{ $segment === $item->slug ? 'color: white;' : '' }}"
                                        href="{{ route('categories.contracts', $item->slug) }}"><i
                                            class="menu-icon icon-circle"
                                            style="{{ $segment === $item->slug ? 'color: white;' : '' }}"></i>{{ $item->name }}
                                    </a></li>
                            @endforeach



                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9" style="">

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
    @stack('scripts')
    <script>
        function loading() {
            var loading = document.querySelector('.loading')

            loading.style.display = 'none'

        }
    </script>
</body>
