<!DOCTYPE html>
<html>
<head>
    <title>Order Mail</title>
</head>
<body>
<div class="container mt-3">
    <div class="card">
        <div class="card-header d-flex"><div class="mr-auto">
        <h4>Invoice No. FF-{{$emails['invoice_id']}}</h4>
        <h6 ><strong>Order No: {{$emails['order_id']}}
        <br>Pay Id: {{$emails['stripe_id']}}
        <br>Email:{{$emails['email']}}</strong>
        <br>Name: {{$emails['billing_first_name']}} {{$emails['billing_last_name']}}
        <br>Billing Address:<br>{{$emails['billing_address_1']}},
         <br>{{$emails['billing_address_2']}} {{$emails['billing_address_3']}}
        <br>{{$emails['billing_city']}}, {{$emails['billing_state']}}
        <br>{{$emails['billing_country']}}-{{$emails['billing_zip']}}
        <br>Mobile: {{$emails['billing_mobile']}}
        </h6>
            
        </div>
        <div class="justify-content-center"><br><img src="{{asset('images/LOGO.svg')}}" style="height:60px"></div>
            <div class="ml-auto">
        <h6>
            Name: {{$emails['shipping_first_name']}} {{$emails['shipping_last_name']}}
        <br>Shipping Address:<br>{{$emails['shipping_address_1']}},
         <br>{{$emails['shipping_address_2']}} {{$emails['shipping_address_3']}}
        <br>{{$emails['shipping_city']}}, {{$emails['shipping_state']}}
        <br>{{$emails['shipping_country']}}-{{$emails['shipping_zip']}}
        <br>Mobile: {{$emails['shipping_mobile']}}
                </h6>
            </div>
    </div>
    <style>
    .borderless td, .borderless th {
        border: none;
        padding:2px;
    }
    </style>
        <div class="card-body">
             <table class="table borderless">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">VAT (20%)</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                @php
                     $i=1;$total_quantity=0;$total_base_price=0;$total_tax=0;$total_price=0;
                     $shipping_charge= "{{$emails['shipping_charges']}}";
                     $coupon_discount="{{$emails['discount_value']}}";
                @endphp
                    @foreach($emails['product_info'] as $product)
                    @php 
                        $total_quantity=$total_quantity+$product->qty;
                        $total_base_price=$total_base_price+($product->price*$product->qty)-($product->tax*$product->qty);
                        $total_tax=$total_tax+($product->tax*$product->qty);
                        $total_price=$total_price+($product->price*$product->qty);
                        $discount=$total_price*((int)$coupon_discount/100);
                    @endphp
                    <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->options->code}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{($product->price*$product->qty)-($product->tax*$product->qty)}}</td>
                    <td>{{$product->tax*$product->qty}}</td>
                    <td>{{$product->price*$product->qty}}</td>
                    </tr>
                    @php $i++; @endphp
                 @endforeach
                 <tr>
                     <td colspan="2" class="text-right"></td>
                     <td><b>Total<b></td>
                     <td>{{$total_quantity}}</td>
                     <td>{{$total_base_price}}</td>
                     <td>{{$total_tax}}</td>
                     <td>{{$total_price}}</td>
                 </tr>
                 <tr>
                    <td colspan="2" class="text-right"></td>
                    <td><b>Delivery Charges<b></td>
                    <td colspan="3" ></td>
                    <td><b><i class="fa fa-pound-sign"></i> {{(int)$shipping_charge}}</b></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right"></td>
                    <td><b>Additional charges<b></td>
                    <td colspan="3" ></td>
                    <td><b><i class="fa fa-pound-sign"></i> {{($total_quantity-1)*8}}</b></td>
                </tr>
                 <tr>
                    <td colspan="2" class="text-right"></td>
                    <td><b>Discount<b></td>
                    <td colspan="3" ></td>
                    <td><b>- <i class="fa fa-pound-sign"></i>  {{$discount}}</b></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right"></td>
                    <td><b>Grand Total<b></td>
                    <td colspan="3" ></td>
                    <td><b><i class="fa fa-pound-sign"></i> {{$total_price-$discount+(($total_quantity-1)*8)+(int) $shipping_charge}}</b></td>
                </tr>
                </tbody>
                </table>
        </div>
        <div class="card-footer">
            <h6>**For order related issue, send us an email at sales@fancyfab.co.uk withing 24 hours after receiving your order
                <p>**For single product no additional charge applicable, after that GBP 8 applicable for eache additional product</p>
            </h6>
        </div>
    </div>
</div>
</body>
</html>