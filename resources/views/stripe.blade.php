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
      <style>
         .container{
         padding: 0.5%;
         } 
      </style>
      @livewireStyles
   </head>
   <body>
       <style>
#loader{
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url("{{asset('images/loader.gif')}}") 
              50% 50% no-repeat rgb(0,0,0);
}
       </style>
       <div id="loader"></div>
     @livewire('navbar')
     @livewire('stripecheckout')
     @livewire('footer')

     @livewireScripts<script src="{{asset('js/jquery-3.5.min.js')}}"></script>
<script src="{{asset('js/app.js') }}" ></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/mslide.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<script src = "https://checkout.stripe.com/checkout.js" > </script> 
<script type = "text/javascript">
    $(document).ready(function() {
        $('#show_msg').hide();
        $('#loader').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    <?php
  if(Auth::check()){
      $email=Auth::user()->email;
  }else{
      $email=Session::get('email');
  }
  ?>
$('.btn-block').click(function() {
    $('#loader').show();
  var amount = $('.amount').val();
  var handler = StripeCheckout.configure({
      key: 'pk_test_51ItXqwHOLILXCfus5BaWMdc8mBRuy0B16rpGseJEZHTpnaM1QfmWIMdXbYAVKwoHnpuTUdJGc9UfxcjGJ1BoxeQ3001B6hK8db', // your publisher key id
      currency:'GBP',
      description:'FancyFab.co.uk',
      locale: 'auto',
      token: function(token) {
          // You can access the token ID with `token.id`.
          // Get the token ID to your server-side code for use.
          //$('#res_token').html(JSON.stringify(token));
          $.ajax({
              url: '{{ url("payment-process") }}',
              method: 'post',
              data: {
                  tokenId: token.id,
                  amount: amount,
                  email:'{{$email}}',
              },
              success: (response) => {
                  //console.log(response)
                  $('#loader').hide();
                  if(response.product_short)
                  {
                    $('#show_msg').show();
                        setTimeout('location.href = "/pay/secure/stripe"',5000);
                  }else{
                      window.location.href="/order/invoice";
                  }
                 // $('#res_token').text();
              },
              error: (error) => {
                  console.log(error);
                  $('#loader').hide();
                  $('#res_token').text('Oops! Some error occured! ');
              }
          })
      }
  });
  
  handler.open({
      name: 'FancyFab',
      description: 'fancyfab.co.uk',
      @if(!empty($email))
      email:'{{$email}}',
      @endif
      image:'{{asset('images/FANCYFAB_76X76.png')}}',
      amount: amount * 100
  });
})

</script>
</body>
</html>