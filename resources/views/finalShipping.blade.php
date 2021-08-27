<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Site Icons -->
        <link rel="shortcut icon" href="{{asset('images/FANCY FAB_76X76.png')}}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{asset('images/FANCY FAB_44X44.png')}}">
        <title>Stripe | pay</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
        <script src="{{asset('js/jquery-3.5.min.js')}}"></script>
      
      @livewireStyles
   </head>
   <body>
     @livewire('navbar')
     @livewire('final-shipping')
     @livewire('footer')

     @livewireScripts
<script src="{{asset('js/app.js') }}" ></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/mslide.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

</body>
</html>