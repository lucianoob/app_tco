<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        
        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>        
    </head>
    <body>
        <video autoplay muted loop id="video_background">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        </video>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ url('/home') }}" id="lnkHome"><i class="fas fa-tablet-alt"></i> {{ __('messages.dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}" id="lnkLogin"><i class="fas fa-sign-in-alt"></i> {{ __('messages.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" id="lnkRegister"><i class="fas fa-user-plus"></i> {{ __('messages.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="font-size: 54px !important;">
                    <i class="fab fa-laravel"></i> {{ config('app.name') }}
                </div>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
