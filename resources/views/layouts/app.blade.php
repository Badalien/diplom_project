<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app" style="display: table; height: 100%; width: 100%;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Teacher') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto menu">
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('news') }}">{{ __('Новости') }}</a>
                        </li>
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('materials') }}">{{ __('Методические материалы') }}</a>
                        </li>
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('portfolio') }}">{{ __('Портфолио') }}</a>
                        </li>
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('schedules') }}">{{ __('Рассписание') }}</a>
                        </li>
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
                        </li>
                        <li class="nav-item padding-right">
                            <a class="nav-link" href="{{ route('news') }}">{{ __('') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item padding-right">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Авторизация') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Профиль') }}
                                    </a>
                                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                                        <a class="dropdown-item" href="{{ route('students') }}">
                                            {{ __('Список студентов') }}
                                        </a>
                                    @endif
                                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                                        <a class="dropdown-item" href="{{ route('subjects') }}">
                                            {{ __('Предметы') }}
                                        </a>
                                    @endif
                                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                                        <a class="dropdown-item" href="{{ route('groups') }}">
                                            {{ __('Группы') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('tasks') }}">
                                        {{ __('Задания на проверку') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
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

        <main class="py-4" style="display: table-row; height: 100%;">
            @yield('content')
        </main>

        <footer class="page-footer font-small blue">
            <div class="footer-copyright text-center py-3">
                <div class="navbar row-fluid footer-style footer-border" height="50">
                    <div class="navbar-inner">
                        <div class="container" align="right">
                            © 2018–{{ date('Y') }} teacher
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
