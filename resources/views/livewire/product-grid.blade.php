<div>

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Total {{$totalproducts}} result(s) found</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                @if(!empty($products))
                                <div class="row">
                                    @foreach($products as $pd)
                                    <?php $images=json_decode($pd['thumbnail_path']); ?>
                                    
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{asset('products/'.$images[0])}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <a class="cart" href="{{url('/view/product/'.$pd->id)}}">Quick View</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$pd->product_name}}</h4>
                                                    <h5>  <i class="fas fa-pound-sign"></i> {{$pd->price}}</h5>
                                                </div>
                                            </div>
                                        </div>          
                                    @endforeach
                                    @if(count($products)===0)
                                    <div class="md-12">
                                        <h1>No result found</h1>
                                    </div>
                                    @endif
                                </div>
                                {{$products->links('pagination::bootstrap-4')}}
                                @endif
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                    @if(!empty($products))
                                        @foreach($products as $pd)
                                        <?php $images=json_decode($pd['thumbnail_path']); ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img  src="{{asset('products/'.$images[0])}}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <a class="cart" href="#">Quick View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>{{$pd->product_name}}</h4>
                                                    <h5> &#163; {{$pd->price}}</h5>
                                                    <p>{{$pd->product_desc}}</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{$products->links('pagination::bootstrap-4')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Jewellery <small class="text-muted">(100)</small>
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">ALL NACKLACE <small class="text-muted">(50)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">CHOKERS <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">PENDENTS <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">EARINGS <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">STUDS <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">CHANDBALI <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">JHUMKI <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">TIKKA EARINGS SET <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">MATHA PATTI <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">BANGLES <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">RING <small class="text-muted">(20)</small></a>
											<a href="#" class="list-group-item list-group-item-action">BRACLETS <small class="text-muted">(20)</small></a>
											
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">AMERICAN DIAMOND
								<small class="text-muted">(50)</small>
								</a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Product 1 <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Product 2 <small class="text-muted">(20)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Product 3 <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action"> Bridal  <small class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Antique <small class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Clearance <small class="text-muted">(22)</small></a>
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


</div>