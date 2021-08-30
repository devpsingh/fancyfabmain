<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="shipping-info-sec">
        <div class="container">
            <div class="ship-logo">
                <a href="{{url('/')}}"><img src="images/LOGO.svg" alt=""></a>
            </div>
            <div class="ship-info-area">
                <div class="ship-info-left">
                    <div class="ship-brd">
                        <ul>
                            <li>Information <i class="fas fa-chevron-right"></i></li>
                            <li class="ship-brd-current">Shipping <i class="fas fa-chevron-right"></i></li>
                            <li>Payment </li>
                        </ul>
                    </div>
                    <div class="ship-change-field">
                        <ul>
                            <li>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                      Email
                                    </div>
                                    <div class="review-block_content">
                                        {{$ship->email}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                            </li>
                            <li>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                      Name
                                    </div>
                                    <div class="review-block_content">
                                        {{$ship->first_name}} {{$ship->last_name}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                            </li>
                            
                            <li>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                        Address 1
                                    </div>
                                    <div class="review-block_content">
                                      {{$ship->address_1}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                        Address 2
                                    </div>
                                    <div class="review-block_content">
                                      {{$ship->address_2}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                        Address 3
                                    </div>
                                    <div class="review-block_content">
                                      {{$ship->address_3}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                            </li>
                            <li>
                                <div class="review-block_inner">
                                    <div class="review-block_label">
                                      Mobile
                                    </div>
                                    <div class="review-block_content">
                                        {{$ship->mobile}}
                                    </div>
                                    <!-- <div class="review-block_link">
                                        <a class="link-small" href="shipping-info.html"><span>Change</span></a>
                                    </div> -->
                                </div>
                            </li>
                            
                            <li>
                            <div class="review-block_link text-center">
                                <a class="link-small" href="javascript:voide(0)" data-toggle="modal" data-target="#editshipping"><span>Edit Shipping Info</span></a>
                            </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ship-check"> </div>
                    <div class="ship-cont">
                        <h2>Billing address</h2>
                        <p>Select the address that matches your card or payment method.</p>
                    </div>
                    <div class="ship-bill-sec">
                        <div class="ship-bill-addr">
                            <div class="ship-credit-card">
                                <div class="ship-credit-left">
                                    <input type="radio" name="" id="same" value="0" wire:model="billing_address" @if($billing_address=='0') checked @endif> 
                                   <label for="same"> Same as shipping address</label>
                                </div>
                            </div>
                            <div class="ship-credit-card bill-bdr">
                                <div class="ship-credit-left">
                                    <input type="radio" name="" id="diff" value="1" wire:model="billing_address" @if($billing_address !='0') checked @endif> 
                                    <label for="diff">Use a different billing address</label>
                                </div>
                            </div>
                        </div>
                        <style>
                            .display-none{display:none;}
                        </style>
                    <div class="ship-cont-field {{ $currentStep != 2 ? 'display-none' : '' }}">
                        <div class="form-grp">
                                <input type="text" placeholder="First Name" wire:model="billing_first_name">
                                @error('billing_first_name') <span class="text-danger">{{$message}}</span> @enderror
                                <input type="text" placeholder="Last Name" wire:model="billing_last_name">
                                @error('billing_last_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <input type="text" placeholder="Address 1" wire:model="billing_address_1">
                            @error('billing_address_1') <span class="text-danger">{{$message}}</span> @enderror
                            <input type="text" placeholder="Address 2 (optional)" wire:model="billing_address_2">
                            @error('billing_address_2') <span class="text-danger">{{$message}}</span> @enderror
                            <input type="text" placeholder="Address 3 (optional)" wire:model="billing_address_3">
                            @error('billing_address_3') <span class="text-danger">{{$message}}</span> @enderror
                            @if(!is_null($billing_countries))
                            <div class="form-grp-select">
                                <div class="form-select-field">
                                    <label for="">Country/region</label>
                                    <select placeholder="Coundtry/region" wire:model="SelectBillingCountry">
                                    <option value="">Select your country</option>
                                    @foreach($billing_countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                     @endforeach  
                                    </select>
                                    @error('SelectBillingCountry') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                
                                @endif
                                 @if(!is_null($billing_states))
                                <div class="form-select-field">
                                    <label for="billing_state">State</label>
                                    <select name="" id="billing_state" placeholder="State" wire:model='SelectBillingState'>
                                        <option value="">Select your State/Province </option>
                                       @foreach($billing_states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                       </select>
                                       @error('SelectBillingState') <span class="text-danger" id="state-err">{{$message}}</span> @enderror
                                </div>
                                
                                @endif
                                @if(!is_null($billing_cities))
                                <div class="form-select-field">
                                    <label for="billing_city">Cities</label>
                                    <select id="billing_city" placeholder="City" wire:model="SelectBillingCity">
                                        <option value=null>Select Your City</option>
                                       @foreach($billing_cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                       </select>
                                       @error('SelectBillingCity') <span class="text-danger" id="city-err">{{$message}}</span> @enderror
                                </div>
                               
                                @endif
                                <div class="form-select-field">
                                    <!-- <label for="">State</label> -->
                                    <input type="text" placeholder="POSTAL/ZIP code" wire:model="billing_pin">
                                    @error('billing_pin') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <input type="text" placeholder="Mobile number" wire:model="billing_mobile">
                            @error('billing_mobile') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="ship-check"></div>
                    <div class="ship-cont">
                        <h2>Payment options</h2>
                    </div>
                   
                    <div class="ship-cont-field shipping-method-sec">
                        <form action="">
                            <div class="ship-change-field">
                                <ul>
                                    <li>
                                        <div class="review-block_inner">
                                            <div class="ship-method-checkbox">
                                                <input type="radio" id="cod" value="cod" wire:model="pay" @if($pay !="paynow") checked @endif>
                                                <label for="cod">Cash on delivery</label>
                                            </div>
                                            <div class="review-block_link">
                                            <div class="ship-method-checkbox">
                                                <input type="radio" value="paynow" wire:model="pay"  id="now" @if($pay=="paynow") checked @endif>
                                                <label for="now">Pay Now</label>
                                            </div>
                                            </div>
                                        </div>
                                    </li>
                                    </ul>
                            </div>
                            @if(!is_null($codeData))
                            @php $code=$codeData->code; @endphp
                            @else
                            @php $code=null; @endphp
                            @endif
                            <div class="shipping-btn">
                                <button wire:click.prevent="paymentPage('{{$ship->email}}','{{$code}}')" class="btn">Continue...</button>
                                <a href="{{url('/')}}"> <i class="fas fa-chevron-left"></i> Continue shopping</a>
                            </div>
                        </form>
                        @if($order_err=Session::get('order_err'))
                        <div class="alert alert-danger">{{$order_err}}</div>
                        @endif
                    </div>
                    <div class="ship-footer">
                        <ul>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="ship-info-right">
                    <h5>Order summery</h5>
                    <div class="ship-order-summary">
                        <ul>
                            @foreach(Cart::content() as $row)
                            <li>
                                <div class="ship-prod-img">
                                    <div class="ship-thumb">
                                        <img src="{{ asset('products/'.$row->options->img) }}" alt="product">
                                    </div>
                                    <span class="prod-thumb-quantity">{{$row->qty}}</span>
                                </div>
                                <div class="ship-prod-disc">
                                    {{$row->name}}
                                </div>
                                <div class="ship-price">
                                    £ {{$row->price}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @if($cart_error=Session::get('cart_error'))
                        <div class="alert alert-danger">@foreach($cart_error as $err) {{$err}}<br> @endforeach</div>
                        @endif
                    </div>
                     <div class="ship-discount-field">
                         
                        <input type="text" placeholder="Discount code" wire:model="code">
                        <input class="btn discount-submit-btn btn--disabled" wire:click.prevent="CouponDiscount('{{$ship->email}}')" type="submit" value="Apply">
                        
                    </div> 
                    @if($err=Session::get('promo_error'))
                    <div class="alert alert-danger">{{$err}}</div>
                    @endif
                    @if($err=Session::get('promo_success'))
                    <div class="alert alert-success">{{$err}}</div>
                    @endif
                    <div class="ship-total-summary">
                        <div class="total-line-sec">
                            <ul>
                                <li>
                                    <div class="total-line-area">
                                        <h6>Subtotal</h6>
                                        <p><strong>£ {{Cart::subtotal()}}</strong></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="total-line-area">
                                        <h6>Shipping
                                            <a class="ship-policy-info" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm.7 13H6.8v-2h1.9v2zm2.6-7.1c0 1.8-1.3 2.6-2.8 2.8l-.1 1.1H7.3L7 7.5l.1-.1c1.8-.1 2.6-.6 2.6-1.6 0-.8-.6-1.3-1.6-1.3-.9 0-1.6.4-2.3 1.1L4.7 4.5c.8-.9 1.9-1.6 3.4-1.6 1.9.1 3.2 1.2 3.2 3z"></path></svg>
                                            </a>
                                        </h6>
                                        @if($deliveryOption ==0)
                                        <p>Free</p>
                                        @else
                                        <p><strong><i class="fas fa-pound-sign"></i> {{$deliveryOption}}</strong></p>
                                        @endif
                                        
                                    </div>
                                </li>
                                <li>
                                    <div class="total-line-area">
                                        <h6>Additional charges above single product</h6>
                                        @if(Cart::count() > 1)
                                        <p><strong>£ {{(Cart::count()-1)*8}}</strong></p>
                                        @else
                                        <p><strong><i class="fas fa-pound-sign"></i> 0.00</strong></p>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                            @php $coupondiscount=0; @endphp
                            @if(!is_null($codeData))
                            @php $coupondiscount=(Cart::subtotal())*$codeData->reward/100 @endphp
                            <li>
                            <div class="total-line-area">
                                <h6>Coupen discount code applied  <b style="font-size:14px">{{$codeData->code}}</b> </h6>
                                    <p><strong>- £ {{$coupondiscount}}</strong></p>
                                </div>
                        </li>
                            @endif
                        </div>
                        <div class="total-ship-amount">
                            <ul>
                                <li>
                                    <div class="total-ship-price">
                                        <h6>Total</h6>
                                        <p class="total-shipping-amt">£ {{Cart::subtotal()+$deliveryOption+((Cart::count()-1)*8)-$coupondiscount}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-angle-up"></i></a>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editshipping" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit shipping info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="ship-info-area justify-content-center">
      <form wire:submit.prevent="EditShippingInfo">
                    <div class="ship-cont-field">
                        <input type="text" name="" id="" placeholder="Email" wire:model="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="ship-check">
                        <input type="checkbox" name="keep_me" wire:model="newsletters" value="1"> 
                        Keep me up to date on news and offers
                    </div>
                    <div class="ship-cont">
                        <h2>Shipping address</h2>
                    </div>
                    <div class="ship-cont-field">
                        
                            <div class="form-grp">
                                <input type="text" placeholder="First Name" wire:model="first_name">
                                @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                <input type="text" placeholder="Last Name" wire:model="last_name">
                                @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <input type="text" placeholder="Address 1" wire:model="address_1">
                            @error('address_1') <span class="text-danger">{{$message}}</span> @enderror
                            <input type="text" placeholder="Address 2 (optional)" wire:model="address_2">
                            @error('address_2') <span class="text-danger">{{$message}}</span> @enderror
                            <input type="text" placeholder="Address 3 (optional)" wire:model="address_3">
                            @error('address_3') <span class="text-danger">{{$message}}</span> @enderror
                            @if(!is_null($countries))
                            <div class="form-grp-select">
                                <div class="form-select-field">
                                    <label for="">Country/region</label>
                                    <select placeholder="Coundtry/region" wire:model="SelectCountry">
                                    <option value="">Select your country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                     @endforeach  
                                    </select>
                                    @error('SelectCountry') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                
                                @endif
                                 @if(!is_null($states))
                                <div class="form-select-field">
                                    <label for="state">State</label>
                                    <select name="" id="state" placeholder="State" wire:model='SelectState'>
                                        <option value=null>Select your State/Province </option>
                                       @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                       </select>
                                       @error('SelectState') <span class="text-danger" id="state-err">{{$message}}</span> @enderror
                                </div>
                                
                                @endif
                                @if(!is_null($cities))
                                <div class="form-select-field">
                                    <label for="city">Cities</label>
                                    <select id="city" placeholder="City" wire:model="SelectCity">
                                        <option value=null>Select Your City</option>
                                       @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                       </select>
                                       @error('SelectCity') <span class="text-danger" id="city-err">{{$message}}</span> @enderror
                                </div>
                               
                                @endif
                                <div class="form-select-field">
                                    <!-- <label for="">State</label> -->
                                    <input type="text" placeholder="POSTAL/ZIP code" wire:model="pin">
                                    @error('pin') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <input type="text" placeholder="Mobile number" wire:model="mobile">
                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                            <div class="form-select-field">
                                @if(!is_null($countryObj))
                                <label for="">Delivery charges</label>
                            <select wire:model="deliveryOption">
                                <option value="">Choose your delivery option</option>
                                        @if($countryObj->name=='United Kingdom')
                                        
                                        <option value="0">Royal Mail & Hermas Standars (Free) 3 to 5 Business days </option>
                                        <option value="9">Royal Mail Next Day (£8.95)</option>
                                        @endif
                                        @if($countryObj->name=='United States')
                        
                                        <option value="20" >USA  Standard  (£20)</option>
                                        <option value="30">USA  3 TO 5 BUSINESS DAYS (£30)</option>
                                        @endif
                                        @if($countryObj->region=='Europe' && $countryObj->name !='United Kingdom')
                                        
                                        <option  value="15">EUROPE STANDARD 5 TO 7 DAYS (£15)</option>
                                        @endif
                                        @if($countryObj->region !='Europe' && $countryObj->name !='United Kingdom' && $countryObj->name !='United States')
                                         <option value="25">ANY WHERE IN WORLD 5 TO 10 BUSINESS DAYS (£25)</option>
                                        @endif
                                    </select>
                                    @error('deliveryOption') <span class="text-danger">{{$message}}</span> @enderror
                                    @endif
                                    
                               </div>
                            
                </div>
                @if($msg=Session::get('record_updated'))
                <span class="text-success">{{$msg}}</span>
                @endif
      </div>
      <div class="modal-footer">
            <div class="shipping-btn">
                <button class="btn" id="shopping-button">Save changes</button>
            </div>
            <button type="button" class="btn btn-danger p-3" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>






</div>
