<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EnglishSistem</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('extensiones/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('extensiones/toastr/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('extensiones/toastr/css/toastr.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-orange shadow-sm">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <b>EnglishSystem</b>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="navbar-brand" href="{{ route('modulos.index') }}">
                            Modulos
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="navbar-brand" href="{{ route('temas.index') }}">
                            Tema
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="navbar-brand" href="{{ route('palabras.index') }}">
                            Palablas
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Scripts --}}
    {{-- Jquery --}}
    <script src="{{asset('js/app.js')}}"></script>

    {{-- Datatable --}}
    <script src="{{asset('extensiones/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('extensiones/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    {{-- Transformador de Datatale a espaniol --}}
    <script src="{{asset('js/incluirDatatable.js')}}"></script>

    {{-- Toastr --}}
    <script src="{{asset('extensiones/toastr/js/toastr.min.js')}}"></script>
    @if (session('success'))
    <script>
        toastr.success(' {{ session('success') }} ', 'Correcto')
    </script>
    @endif
    @if (session('error'))
    <script>
        toastr.error(' {{ session('error') }} ', 'Error')
    </script>
    @endif
    @stack('scripts')

</body>

</html>
