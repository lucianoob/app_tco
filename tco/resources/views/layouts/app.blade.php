<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body>
    <video autoplay muted loop id="video_background">
        <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
    </video>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel navbar-tco">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fab fa-laravel"></i> {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::is('login') ? 'active' : '') }}" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('messages.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('register') ? 'active' : '') }}" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('messages.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::is('home') ? 'active' : '') }}" href="/home"><i class="fas fa-tablet-alt"></i> {{ __('messages.dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::is('companies*') ? 'active' : '') }}" href="{{ route('companies.edit', Auth::user()->id) }}"><i class="fas fa-building"></i> {{ __('messages.company_data') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::is('suppliers*') ? 'active' : '') }}" href="{{ route('suppliers.list') }}"><i class="fas fa-warehouse"></i> {{ __('messages.suppliers') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::is('payments*') ? 'active' : '') }}" href="/payments/list/"><i class="fas fa-money-bill-alt"></i> {{ __('messages.payments') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle {{ (Route::is('users*') ? 'active' : '') }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ (Route::is('users*') ? 'active' : '') }}" href="{{ route('users.edit', Auth::user()->id) }}"><i class="fas fa-user-edit"></i> {{ __('messages.user_edit') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
