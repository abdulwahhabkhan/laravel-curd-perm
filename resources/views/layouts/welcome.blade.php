<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome Page | {{ config('app.name', 'Laravel') }}</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('welcome/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('welcome/css/default.css') }}" rel="stylesheet" />
</head>
<body>
@php($current_url = Route::current()->getName())
{{ $current_url }}
    <div id="page-container">
        <!-- begin #header -->
        <nav id="header" class="header navbar navbar-inverse navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <svg xmlns="http://www.w3.org/2000/svg"  style="height:50px; width:105px;" viewBox="0 0 84.1 57.6"><path d="M83.8 26.9c-.6-.6-8.3-10.3-9.6-11.9-1.4-1.6-2-1.3-2.9-1.2s-10.6 1.8-11.7 1.9c-1.1.2-1.8.6-1.1 1.6.6.9 7 9.9 8.4 12l-25.5 6.1L21.2 1.5c-.8-1.2-1-1.6-2.8-1.5C16.6.1 2.5 1.3 1.5 1.3c-1 .1-2.1.5-1.1 2.9S17.4 41 17.8 42c.4 1 1.6 2.6 4.3 2 2.8-.7 12.4-3.2 17.7-4.6 2.8 5 8.4 15.2 9.5 16.7 1.4 2 2.4 1.6 4.5 1 1.7-.5 26.2-9.3 27.3-9.8 1.1-.5 1.8-.8 1-1.9-.6-.8-7-9.5-10.4-14 2.3-.6 10.6-2.8 11.5-3.1 1-.3 1.2-.8.6-1.4zm-46.3 9.5c-.3.1-14.6 3.5-15.3 3.7-.8.2-.8.1-.8-.2-.2-.3-17-35.1-17.3-35.5-.2-.4-.2-.8 0-.8S17.6 2.4 18 2.4c.5 0 .4.1.6.4 0 0 18.7 32.3 19 32.8.4.5.2.7-.1.8zm40.2 7.5c.2.4.5.6-.3.8-.7.3-24.1 8.2-24.6 8.4-.5.2-.8.3-1.4-.6s-8.2-14-8.2-14L68.1 32c.6-.2.8-.3 1.2.3.4.7 8.2 11.3 8.4 11.6zm1.6-17.6c-.6.1-9.7 2.4-9.7 2.4l-7.5-10.2c-.2-.3-.4-.6.1-.7.5-.1 9-1.6 9.4-1.7.4-.1.7-.2 1.2.5.5.6 6.9 8.8 7.2 9.1.3.3-.1.5-.7.6z" fill="#e02f3f"></path></svg> v6.5
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{ $current_url == '' ? 'active' : '' }}">
                            <a href="{{ url('/') }}">HOME</a>
                        </li>
                        @guest
                            <li class="{{ $current_url == 'login' ? 'active' : '' }}"><a class="nav-link" href="{{ route('login') }}">LOGIN</a></li>
                            <li class="{{ $current_url == 'register' ? 'active' : '' }}"><a class="nav-link" href="{{ route('register') }}">REGISTER</a></li>
                        @endguest
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </nav>
        <!-- end #header -->

        <main>
            @yield('content')
        </main>
        <!-- begin #footer -->

        <!-- end #footer -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript">
        var handleHomeContentHeight = function() {
            $('#home').height($(window).height());
        };
        var handleHeaderNavigationState = function() {
            $(window).on('scroll load', function() {
                if ($('#header').attr('data-state-change') != 'disabled') {
                    var totalScroll = $(window).scrollTop();
                    var headerHeight = $('#header').height();
                    if (totalScroll >= headerHeight) {
                        $('#header').addClass('navbar-small');
                    } else {
                        $('#header').removeClass('navbar-small');
                    }
                }
            });
        };

        handleHomeContentHeight();
        handleHeaderNavigationState();
    </script>
</body>
</html>
