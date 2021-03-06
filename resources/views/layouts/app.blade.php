<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Foodii</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        #button-container{
        text-align: center;
        }

        #button1{
        width: 300px;
        height: 100px;
        border-radius: 15px;
        background: #f0f8ff;
        border: 2px solid;
        padding: 20px;

        }
        #button2{
        width: 300px;
        height: 100px;
        border-radius: 15px;
        background: #f0f8ff;
        border: 2px solid;
        padding: 20px;
        }

        #button1 , #button2 {
        display:inline-block;
        }

        body {
            background-color: #f0f8ff;
        }

        .navbar, .navbar-expand-md, .navbar, .navbar-laravel, .navbar-brand {
            background-color: #9bc4e2;
        }

        #related_links {
            width: 12em;
            padding: 0 0 1em 0;
            margin-bottom: 1em;
            position: relative;
            padding: .5rem 1rem;
            }

        #related_links ul {
            list-style: none;
            margin: 0;
            padding: 0;
            border: none;
            }

        #related_links li {
            border: 1px solid #90bade;
            margin: 0;
            }

        #related_links li a {
            display: block;
            padding: 5px 5px 5px 0.5em;
            background-color: #f0f8ff;
            color: #313131;
            text-decoration: none;
            width: 100%;
            }

        html>body #related_links li a {
            width: auto;
            }

        #related_links li a:hover {
            background-color: #ffffff;
            color: #313131;
            }

        ul {
            list-style-type: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Foodii
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/restaurants') }}">Restaurants</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('quiz.startQuiz') }}">
                                    {{ __('Quiz') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('preferences.index') }}">
                                    {{ __('Preferences') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('history') }}">
                                    {{ __('History') }}
                                </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
