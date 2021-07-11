<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('images/FANCY FAB_76X76.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('images/FANCY FAB_44X44.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login FancyFab</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{asset('css/style.css')}}" rel="stylesheet">
       <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
       <link href="{{asset('css/custom.css')}}" rel="stylesheet">
   
    
    @livewireStyles
        
</head>
<body>
    @livewire('navbar')
    <main class="pt-5 py-4">
            @yield('content')
    </main>
    @livewireScripts
</body>
</html>
