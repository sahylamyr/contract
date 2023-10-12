<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edmin</title>
    <link type="text/css" href="{{ asset('/back/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/back/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/back/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/back/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
</head>

<body>


    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <form action="{{ route('auth.login') }}" method="POST" class="form-vertical">
                        @csrf
                        <div class="module-head">
                            <h3>Daxil ol</h3>
                        </div>
                        <div class="module-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" name="email" type="text" id="inputEmail"
                                        placeholder="Username">
                                    @error('email')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" name="password" id="inputPassword"
                                        placeholder="Şifrə">
                                    @error('password')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Daxil ol</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->


    <script src="{{ asset('back/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
