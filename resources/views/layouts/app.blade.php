<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'eFiles')</title> <!-- Default title -->
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

    </style>
    @yield('styles')
</head>
<body>
    <div id="app">
        @if ( Auth::check() && Auth::user()->role !== 'employee')
        <x-navbar :links="[
            ['title' => 'All Correspondences', 'url' => route('correspondences.index') ,'routeName' =>'correspondences.index'],
            ['title' => 'Sent Correspondences', 'url' => route('correspondences.sent') ,'routeName' =>'correspondences.sent'],
            ]"/>
        @else
        <x-navbar :links="[
            ['title' => 'Received Correspondences', 'url' => route('correspondences.received') ,'routeName' =>'correspondences.received'],
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
        

</body>
</html>
