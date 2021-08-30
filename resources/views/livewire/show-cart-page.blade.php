<div>
    {{-- In work, do what you enjoy. --}}
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sub=Cart::subtotal()+Cart::tax();?>
                                    <?php 
                                    if($sub !=0 )
                                    {
                                        $excludeTaxAmount=Cart::subtotal()*(Cart::subtotal()/$sub);
                                    ?>
                            <?php foreach(Cart::content() as $row) :?>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{ asset('products/'.$row->options->img) }}" alt="{{$row->name}}" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                        <?php echo $row->name; ?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p><i class="fas fa-pound-sign"></i> {{$row->price}}</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="{{$row->qty}}" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p><i class="fas fa-pound-sign"></i> {{$row->price}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="javascript:void(0)" wire:click="RemoveCart('{{$row->rowId}}')">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                             <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div> -->

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"><i class="fas fa-pound-sign"></i> <?php echo round($excludeTaxAmount,2); ?></div>
                        </div>
                        <!-- <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div> -->
                        <div class="d-flex">
                            <h4>Tax/VAT(20%)</h4>
                            <div class="ml-auto font-weight-bold"> <i class="fas fa-pound-sign"></i> <?php echo round($excludeTaxAmount*.2,2); ?> </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> <i class="fas fa-pound-sign"></i> {{round($excludeTaxAmount,2)+round($excludeTaxAmount*.2,2)}} </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{route('stripe')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
                                <?php
                                    }else{
                                ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 p-5 text-center">
                                            <img style="width:200px;" src="{{asset('images/largecart.png')}}" alt="cart">
                                            <p><h1>Your cart is empty</h1></p>
                                            @if($shipping_error=Session::get('shipping_error'))
                                            <div class="alert alert-danger"><h5>{{$shipping_error}}</h5></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                   <?php     
                                    }
                                     ?>
        </div>
    </div>
    <!-- End Cart -->




</div>
