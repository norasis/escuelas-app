<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRUD') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="/color_logo_small.png" width="30">
                <p>&nbsp;</p>
                <a class="navbar-brand" href="{{ url('/') }}">
                    | Credencialización
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user()->tipo == 'ADMINISTRADOR')
                            <li class="nav-item">
                                <a actv="usuario" class="nav-link" href="{{ url('/usuario/') }}">{{ __('Usuarios') }}</a>
                            </li>
                            <li class="nav-item">
                                <a actv="escuelas" class="nav-link" href="{{ url('/escuelas/') }}">{{ __('Escuelas') }}</a>
                            </li>
                            <li class="nav-item">
                                <a actv="estudiantes" class="nav-link" href="{{ url('/estudiantes/') }}">{{ __('Estudiantes') }}</a>
                            </li>

                            <li class="nav-item">
                                <a actv="imagenes" class="nav-link" href="{{ url('/imagenes/') }}">{{ __('Imagenes') }}</a>
                            </li>

                            <li class="nav-item">
                                <a actv="contrasenas" class="nav-link" href="{{ url('/contrasenas/') }}">{{ __('CambiarContraseña') }}</a>
                            </li>

                        @else
                          

                            <li class="nav-item">
                                <a actv="estudiantes" class="nav-link" href="{{ url('/estudiantes/') }}">{{ __('Estudiantes') }}</a>
                            </li>

                            <li class="nav-item">
                                <a actv="imagenes" class="nav-link" href="{{ url('/imagenes/') }}">{{ __('Imagenes') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a actv="contrasenas" class="nav-link" href="{{ url('/contrasenas/') }}">{{ __('CambiarContraseña') }}</a>
                            </li>

                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        session()->forget('tipo');
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

    <script>
        var route = location.pathname.split('/')[1]
        if (route) {
            var activeNav = document.querySelector('[actv="' + route + '"]')
            console.log(activeNav)
            activeNav.classList.add('active')
            activeNav.style.color = '#6A1C33'
            activeNav.style.fontWeight = 'bold'
        }
    </script>
</body>

</html>
