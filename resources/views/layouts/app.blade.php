<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.headers')

</head>
<body>
    <div id="app">
        <div class="wrapper">
            <!-- Sidebar  -->
            @guest

            @else
            <nav id="sidebar">
                <div class="sidebar-header">
                        <h3 class="text-center">Auto-Pruebas</h3>
                    <strong>AUT</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="home">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="peoples">
                            <i class="fas fa-school"></i>
                            Personas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-paper-plane"></i>
                            Campañas
                        </a>
                    </li>
                </ul>
            </nav>
            @endguest
            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        @guest
                        @else
                        <button type="button" id="sidebarCollapse" class="btn btn-dark">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>
                        @endguest

                        <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingreso') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link">{{ Auth::user()->name }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="">
                                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesion') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
    </div>
</body>
</html>
