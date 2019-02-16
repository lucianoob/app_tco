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
        
    </head>
    <body>
        <video autoplay muted loop id="video_background">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        </video>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-tablet-alt"></i> {{ __('messages.dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('messages.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('messages.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="font-size: 54px !important;">
                    <i class="fab fa-laravel"></i> {{ config('app.name') }}
                </div>
            </div>
        </div>
    </body>
</html>
