<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('auth/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('auth/css/default.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="login-cover">
        <div class="login-cover-image"><img src="{{ asset('img/bg-6.jpg') }}" data-id="login-cover-image" alt="auth cover image" /></div>
        <div class="login-cover-bg"></div>
    </div>

    <div id="page-container">
        @yield('content')
    </div>
    <!-- Scripts -->
</body>
</html>
