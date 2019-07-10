<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', config('app.name', 'Tvg') )</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
</head>
<body>
<div class="login-wrapper">
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="header-inner">
                        <div class="logo"><a href="#"><h2>Nova</h2><h3>Jobs Data Management System</h3></a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
    <div class="login-block">
        <h1 class="text-center">Login</h1>
        <div class="form-group login-group">
            <span><img src="{{ URL::to('/') }}/img/envelope.svg"></span>
            <input type="text" name="" placeholder="Email">
        </div>
        <div class="form-group login-group">
            <span><img src="{{ URL::to('/') }}/img/locked-padlock.svg"></span>
            <input type="text" name="admin_password" placeholder="Password">
        </div>
        <div class="">
            <div class="form-group pull-left">
                <label class="checkbox-design">Remember Me
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                </label>

            </div>
            <div class="form-group pull-right">
                <a href="" class="">Forgot Password?</a>
            </div>
        </div>
        <div class="form-group">
            <button class="primary-button" type="submit">Login</button>
        </div>
    </div>

</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/main-script.js') }}"></script>
</body>
</html>