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
