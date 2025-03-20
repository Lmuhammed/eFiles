<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'eFiles')</title> <!-- Default title -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md bg-dark h5" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('correspondences.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
                        @if ( ! (Auth::user()->role === "employee") )

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('correspondences.index') }}">All Correspondences</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('correspondences.sent') }}">Sent Correspondences</a>
                        </li>
                                                    
                        @endif
                        {{-- add active on each link --}}
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('correspondences.received')  }}">Received Correspondences</a>
                        </li>
                    </ul> 
                    @endauth
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
  
        <main class="py-4 px-4 mt-2 mb-2 border border-dark">
            @if(session('msg-color') && session('message'))
            <x-seesion-msg message="{{session('message')}}" color="{{session('msg-color')}}"/>
            @elseif ($errors->any())
            @foreach ($errors->all() as $error)
            <x-seesion-msg message{{ $error  }} color="danger" />
            @endforeach
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
