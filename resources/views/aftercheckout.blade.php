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
        <title>Final | Checkout</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
      
   </head>
   <body>
{{$stripe}}

<script src="{{asset('js/jquery-3.5.min.js')}}"></script>
<script src="{{asset('js/app.js') }}" ></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/mslide.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<script src = "https://checkout.stripe.com/checkout.js" > </script> 
<script type = "text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

$('.btn-block').click(function() {
  var amount = $('.amount').val();
  var handler = StripeCheckout.configure({
      key: 'pk_test_51ItXqwHOLILXCfus5BaWMdc8mBRuy0B16rpGseJEZHTpnaM1QfmWIMdXbYAVKwoHnpuTUdJGc9UfxcjGJ1BoxeQ3001B6hK8db', // your publisher key id
      currency:'GBP',
      description:'FancyFab.co.uk',
      locale: 'auto',
      token: function(token) {
          // You can access the token ID with `token.id`.
          // Get the token ID to your server-side code for use.
          $('#res_token').html(JSON.stringify(token));
          $.ajax({
              url: '{{ url("payment-process") }}',
              method: 'post',
              data: {
                  tokenId: token.id,
                  amount: amount
              },
              success: (response) => {
                  console.log(response)
              },
              error: (error) => {
                  console.log(error);
                  alert('Oops! Something went wrong')
              }
          })
      }
  });
  <?php
  if(Auth::check()){
      $email=Auth::user()->email;
  }
  ?>
  handler.open({
      name: 'FancyFab',
      description: 'fancyfab.co.uk',
      @if(!empty($email))
      email:'{{$email}}',
      @endif
      image:'{{asset('images/FANCY FAB_76X76.png')}}',
      amount: amount * 100
  });
})

</script>
</body>
</html>