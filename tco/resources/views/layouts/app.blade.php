<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}" defer></script-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body class="image_background">
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
                            @if (Auth::user()->admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('companies*') ? 'active' : '') }}" href="{{ route('companies.view') }}"><i class="fas fa-building"></i> {{ __('messages.companies') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('suppliers*') ? 'active' : '') }}" href="{{ route('suppliers.view') }}"><i class="fas fa-warehouse"></i> {{ __('messages.suppliers') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('payments*') ? 'active' : '') }}" href="{{ route('payments.view') }}""><i class="fas fa-money-bill-alt"></i> {{ __('messages.payments') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('companies*') ? 'active' : '') }}" href="{{ route('companies.edit') }}"><i class="fas fa-building"></i> {{ __('messages.company_data') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('suppliers*') ? 'active' : '') }}" href="{{ route('suppliers.list') }}"><i class="fas fa-warehouse"></i> {{ __('messages.suppliers') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (Route::is('payments*') ? 'active' : '') }}" href="{{ route('payments.list') }}""><i class="fas fa-money-bill-alt"></i> {{ __('messages.payments') }}</a>
                                </li>
                            @endif
                            
                            <li class="nav-item">
                                    @if (Auth::user()->admin == 1)
                                        <a class="nav-link" href="{{ route('user.edit', Auth::user()->id) }}" role="button" style="color:yellow">
                                            <i class="fas fa-user-secret"></i> {{ Auth::user()->name }}
                                        </a>
                                    @else
                                        <a class="nav-link" href="{{ route('user.edit', Auth::user()->id) }}" role="button" >
                                            <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                        </a>
                                    @endif
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
    <!-- Modal Error -->
    <div class="modal fade" id="mdError" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> <span id="mdErrorTitle">Error</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mdErrorBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Alert -->
    <div class="modal fade" id="mdInfo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-info-circle"></i> <span id="mdInfoTitle">Information</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mdInfoBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Processing -->
    <div class="modal fade" id="mdProcessing" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exchange-alt"></i> <span id="mdProcessingTitle">Processing...</span></h5>
                </div>
                <div class="modal-body" id="mdProcessingBody">
                    <div class="progress">
                        <div id="prgProcessing" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="mdDelete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-trash"></i> <span id="mdDeleteTitle">Excluir</span></h5>
                </div>
                <div class="modal-body" id="mdDeleteBody">
                    <p>Você tem certeza que deseja excluir este registro (<span id="txtDeleteId">0</span>)?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal" id="btnDeleteConfirm">OK</button>
                </div>
            </div>
        </div>
    </div>
    @stack('css')
    @stack('scripts')
</body>
</html>
