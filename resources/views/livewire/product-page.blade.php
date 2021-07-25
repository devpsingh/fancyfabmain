<div>

			
<div class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="prod-slide-box">
					@if($products)
					
						@php $image=json_decode($products->thumbnail_path); @endphp
							@if($products->available==1)
							<div class="show" href="{{ asset('products/'.$image[0])}}">
								<img src="{{ asset('products/'.$image[0])}}" id="show-img">
							</div>
							@endif
						
					@endif  
                          <!--image thumbnail -->
                        
                          <div class="small-img">
                            <img src="{{asset('images/next-icon.png')}}" class="icon-left" alt="" id="prev-img">
                                <div class="small-container">
                                <div id="small-img-roll">
								@if($products)
								
										@foreach(json_decode($products->thumbnail_path) as $key=>$image)
										@if($products->available==1)
										<img src="{{ asset('/products/'.$image)}}" class="show-small-img" alt="">
										@endif
										
									@endforeach
								@endif
                                </div>
                                </div>
                            <img src="{{asset('images/next-icon.png')}}" class="icon-right" alt="" id="next-img">
                          </div>
                    </div>
                </div>
				@if(!empty($products))
							
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="pro-detail">
                        <h1>{{$products->product_name}}</h1>
                        <div class="ratings d-flex">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                            <div class="pro-review">
                                <span>1 Reviews</span>
                            </div>
                        </div>
						
                    <p class="price-prod"><i class="fas fa-pound-sign"></i> {{$products->price}}</p>
                    <p class="description">{{$products->product_desc}}</p>
                    <div id="product2">            
                            <div class="product-rightinfo"> 
                                    <div class="form-group cart-block">
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">Qty:</h6>
                                        <div class="pro-qty">
                                            <span class="input-number-decrement" wire:click="decreaseQty">–</span>
											<input  class="input-number" type="text" value="{{$quantity}}" min="0" max="10">
											<span class="input-number-increment" wire:click="increaseQty">+</span>
                                        </div>
                                        <div class="action_link">
                                            <button class="btn btn-cart2"  wire:click="addToCart({{$products->id}})">Add to cart</button>
                                        </div>
                                        
                                    </div>
                                    
                                    </div>  
                                    <h4>Available colors</h4>    
                                    <div class="useful-links d-flex">
                                     
                                       @foreach($colors as $color)
                                       <div id="c-{{$color}}" class="color-box" onClick="Select(this.id)">
                                            <label for="color-{{$color}}" style="width:25px;height:25px;background-color:#{{$color}}" class="m-1"></label>
                                            <input type="radio" id="color-{{$color}}"  name="color" checked style="display:none" />
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                   
                                    <div class="action_link check-out-pro">
                                        <a class="btn btn-cart2" href="{{route('stripe')}}">Check Out</a>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
				
			@endif
            </div>
        </div>
    </div>

</div>
