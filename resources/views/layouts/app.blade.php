<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'eFiles')</title> 
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>
        .vertical-navbar {
            height: 100vh; 
            padding-top: 0; 
            margin-top: 0; 
        }
        .nav-link {
            transition: background-color 0.3s, color 0.3s; 
        }
        .nav-link:hover {
            background-color: #fa7c7c; 
            color: white; 
        }

        input:hover {
            border-color: #000000; /* Change border color on hover */
            background-color: #d3d3d3; /* Change background color on hover */
        }
        
        .accordion-button:hover{
            border-color: #000000; /* Change border color on hover */
            background-color: #e74080; /* Change background color on hover */

        }

    </style>

@yield('extra_css')
</head>
<body>
    <div id="app">
        @if ( Auth::check() && Auth::user()->role !== 'employee')
        <x-navbar :links="[
            ['title' => 'Toute les courrier', 'url' => route('correspondences.index') ,'routeName' =>'correspondences.index'],
            ['title' => 'Courrier envoyés', 'url' => route('correspondences.sent') ,'routeName' =>'correspondences.sent'],
            ]"/>
        @else
        <x-navbar :links="[
            ['title' => 'Courrier reçus', 'url' => route('correspondences.received') ,'routeName' =>'correspondences.received'],
            ]"/>
        @endif
        
        
        <main>
            @if(session('msg-color') && session('message'))
            <x-seesion-msg message="{{session('message')}}" color="{{session('msg-color')}}"/>
            @elseif ($errors->any())
            @foreach ($errors->all() as $error)
            <x-seesion-msg message{{ $error  }} color="danger" />
            @endforeach
            @endif
            <div class="container-fluid"> 
                @auth
                    @can('isAdmin')
                    @include('layouts.sideBar')        
                    @endcan
                @endauth
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
            </div>
            @yield('extra_js')        
</body>
</html>
