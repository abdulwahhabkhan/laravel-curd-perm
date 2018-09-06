@extends('layouts.welcome')

@section('content')
    <div id="home" class="content has-bg home">
        <!-- begin content-bg -->
        <div class="content-bg">
            <img src="welcome/img/home-bg.jpg" alt="Home" />
        </div>
        <!-- end content-bg -->
        <!-- begin container -->
        <div class="container home-content">
            <h1>Welcome to {{ config('app.name', 'Laravel') }}</h1>
            <h3>demo application for Laravel </h3>
            <p>
                I have created a multi-purpose application that demo full skeleton of Laravel 5.6 framework.<br />
            </p>
            <a href="{{ route('login') }}" class="btn btn-theme">Login</a> <a href="{{ route('register') }}" class="btn btn-outline">Register</a><br />
            <br />
        </div>
        <!-- end container -->
    </div>
@endsection
