<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="container">
       @if(Cart::count() > 0)
    <table class="table table-dark" id="pre_order">
  <thead>
     <tr>
         <th colspan="3"><h6 class="text-light">Email: {{Session::get('email')}}</h6></th>
        <th colspan="1"><h2 class="text-light text-center">Cart Summery</h2></th>
        <th colspan="3"><h6 class="text-light text-right"><img src="{{asset('images/LOGO.svg')}}" style="height:30px"></h6></th>
     </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Code</th>
      <th scope="col">Quantity</th>
      <th scope="col">Base Price</th>
      <th scope="col">VAT (20%)</th>
      <th scope="col">Total Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @php 
     $i=1;
     if(Session::get('delivery_charge'))
     {
        $charge=Session::get('delivery_charge');
     }else{
        $charge=0;
     }

     @endphp
     @foreach(Cart::content() as $cart)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$cart->name}}</td>
      <td>{{$cart->options->code}}</td>
      <td>{{$cart->qty}}</td>
      <td>{{$cart->price-$cart->tax}}</td>
      <td>{{$cart->tax}}</td>
      <td>{{$cart->price}}</td>
      <td><button wire:click="RemoveCartProduct('{{$cart->rowId}}')" class="btn btn-light btn-sm"><i class="fas fa-times"></i> </button></td>
    </tr>
    @php $i++; @endphp
    @endforeach
    <tr>
       <td colspan="6"></td>
       <td >Coupon/Discount</td>
       <td>{{Cart::subtotal()*$discount/100}}</td>
    </tr>
    <tr>
       <td colspan="6"></td>
       <td >Shipping Charges</td>
       <td>{{$charge}}</td>
    </tr>
    <tr>
       <td colspan="6"></td>
       <td >Additional Charges</td>
       <td>{{(Cart::count()-1)*8}}</td>
    </tr>
    <tr>
       <td colspan="6">@if($error_msg=Session::get('error_msg')) <span class="alert alert-danger"> {{$error_msg}} </span> @endif</td>
       <td>Grand Total</td>
       <td>{{Cart::subtotal()-(Cart::subtotal()*$discount/100)+((Cart::count()-1)*8)+$charge}}</td>
    </tr>
    <tr>
       <td colspan="6">
            <h6 style="color:white">**For order related issue, send us an email at info@fancyfab.co.uk withing 24 hours after receiving your order
                <p>**For single product no additional charge applicable, after that GBP 8 applicable for eache additional product</p>
            </h6>
       </td>
       <td colspan="2">
         <input type="hidden" name="amount" disabled class="form-control amount" value="{{Cart::subtotal()-(Cart::subtotal()*$discount/100)+((Cart::count()-1)*8)+$charge}}">
         <button type="button" class="btn btn-primary btn-block">Pay <i class="fas fa-pound-sign"></i> ({{Cart::subtotal()-(Cart::subtotal()*$discount/100)+((Cart::count()-1)*8)+$charge}})</button>
       </td>
    </tr>
    </tbody>
</table>
<h6 id="show_msg">This page will be refreshed automatically in 5 seconds...</h6>
<div id="res_token"></div>
@endif
    </div>


   </div>
