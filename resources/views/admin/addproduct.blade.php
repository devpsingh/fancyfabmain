<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>FancyFab Admin</title>
 

 
  
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
 
   @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/dashboard/dashboard.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/dashboard/OverlayScrollbars.min.css')}}">
  <style>
    .hide-discount{
      display:none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @livewire('admin.header')
    @livewire('admin.addproduct')
    @livewire('admin.footer')

     <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{asset('js/jquery-3.5.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" ></script> 
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- overlayScrollbars -->
<script src="{{asset('js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
    @livewireScripts
    <script>
       $(document).ready(function(){
        //discount input
        $('#dis').addClass('hide-discount');
        $('#product_category').on('change',function(){
          $('#dis').addClass('hide-discount');
        sel=$(this).val();
        console.log(sel);
        if(sel =='bridal' )
        {
            $('#dis').removeClass('hide-discount');
        }else{
          $('#dis').addClass('hide-discount');
        }
      });
    });
    </script>
</body>
</html>
