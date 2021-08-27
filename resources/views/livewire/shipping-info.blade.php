<div>
    {{-- Do your work, then step back. --}}

    <div class="ship-page">
    <div class="shipping-info-sec">
        <div class="container">
            <div class="ship-logo">
                <a href="index.html"><img src="images/LOGO.svg" alt=""></a>
            </div>
            <div class="ship-info-area">
                <div class="ship-info-left">
                    <div class="ship-brd">
                        <ul>
                            <li class="{{ $currentStep == 1 ? 'ship-brd-current' : '' }}"><a href="javascript:void(0)" wire:click="back(1)">Email </a> <i class="fas fa-chevron-right"></i></li>
                            <li class="{{ $currentStep == 2 ? 'ship-brd-current' : '' }}">Shipping <i class="fas fa-chevron-right"></i></li>
                            <li>Payment </li>
                        </ul>
                    </div>
                    <form wire:submit.prevent="ContinueShope">
                        <div class="{{ $currentStep != 1 ? 'display-none' : '' }}">
                    <div class="ship-cont">
                        <h2>Contact information</h2>
                        <p>Already have an account? <a href="login.html">Log in</a> </p>
                    </div>
                    
                            <div class="ship-cont-field ">
                                <input type="text"  placeholder="Email" wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="ship-check">
                                <input type="checkbox" name="keep_me" wire:model="newsletters" value="1"> 
                                Keep me up to date on news and offers
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">Next</button>
                    </div>
                    <div class="ship-cont">
                        <h2>Shipping address</h2>
                    </div>
                    <div class="ship-cont-field {{ $currentStep != 2 ? 'display-none' : '' }}">
                        
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
                                        <option value="8.95">Royal Mail Next Day (£8.95)</option>
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
                                    <span><h6>**Note GBP <i class="fas fa-pound-sign"></i> 8.00 will be charged for each adition item if delivery is out of United Kingdom</h6></span>
                                    
                                </div>
                            <div class="shipping-btn">
                                <button class="btn" id="shopping-button">Continue to shipping</button>
                                <a href="{{route('showcart')}}"> <i class="fas fa-chevron-left"></i> Return to Cart</a>
                            </div>
                        </form>
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
                    </div>
                    <!-- <div class="ship-discount-field">
                        <input type="text" placeholder="Discount code">
                        <input class="btn discount-submit-btn btn--disabled" type="submit" value="Apply">
                    </div> -->
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
                        </div>
                        <div class="total-ship-amount">
                            <ul>
                                <li>
                                    <div class="total-ship-price">
                                        <h6>Total</h6>
                                        
                                        <p class="total-shipping-amt">£ {{Cart::subtotal()+($deliveryOption)+((Cart::count()-1)*8)}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>

    <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-angle-up"></i></a>


</div>
