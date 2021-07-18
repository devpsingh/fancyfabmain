<div>
              
                
<header class="fancyfab-header">
        <nav class="navbar navbar-expand-lg fixed-top bg-white py-3 shadow-sm">
            <a href="{{url('/')}}" class="navbar-brand font-weight-bold mr-auto"> <img src="{{asset('images/LOGO.svg')}}" alt=""> </a>
            <div id="navbarContent" class="collapse navbar-collapse order-sm-12 order-lg-1">
              <ul class="navbar-nav ml-auto">
                <!-- Megamenu-->
                <li class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown megamenu"><a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Shop All <i class="fa fa-angle-down"></i> </a>
                  <div aria-labelledby="megamenu" class="dropdown-menu fab-dropdown border-0 rounded-0 p-0 m-0">
                    <div class="container-fluid">
                        <div class="row rounded-0 m-0">
                            <div class="col-12">
                              <div class="pt-3 pb-4">
                                <div class="row">
                                 <div class="col-sm-6 col-lg-6">
                                    <ul class="list-unstyled">
                                        @if(!empty($shopall))
                                            <?php $i=1 ?>
                                            @foreach($shopall as $ctg)
                                        
                                                @if($i<=6)
                                                    <li class="nav-item"><a href="javascript:void(0)" wire:click="ShowProducts({{$ctg->id}})" class="nav-link text-small pb-0">{{$ctg->categoryshopall}} </a></li>
                                                @endif
                                                <?php $i++ ?>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <ul class="list-unstyled">
                                        @if(!empty($shopall))
                                        <?php $i=1 ?>
                                            @foreach($shopall as $ctg)
                                                @if($i > 6 && $i<=12)
                                                    <li class="nav-item"><a href="javascript:void(0)" wire:click="ShowProducts({{$ctg->id}})"  class="nav-link text-small pb-0">{{$ctg->categoryshopall}} </a></li>
                                                @endif
                                                <?php $i++ ?>
                                            @endforeach
                                        @endif
                                    </ul>
                                 </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="nav-item dropdown megamenu"><a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Collection  <i class="fa fa-angle-down"></i> </a>
                    <div aria-labelledby="megamenu" class="dropdown-menu fab-dropdown border-0 rounded-0 p-0 m-0">
                      <div class="container-fluid">
                        <div class="row rounded-0 m-0 shadow-sm">
                          <div class="col-12">
                            <div class="pt-3 pb-4">
                              <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                  <ul class="list-unstyled">
                                     @if(!empty($category))
                                            @foreach($category as $ctg)
                                                <li class="nav-item"><a href="javascript:void(0)" wire:click="ShowCategory({{$ctg->id}})"  class="nav-link text-small pb-0">{{$ctg->category}} </a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                <li class="nav-item"><a href="" class="nav-link">Bridal</a></li>
                <li class="nav-item"><a href="" class="nav-link">Antique</a></li>
                <li class="nav-item"><a href="" class="nav-link">Clearance</a></li>
              </ul>
              <div class="header-right d-flex align-items-center justify-content-end">
                <div class="header-configure-area">
                    <ul class="nav justify-content-end">
                        <li class="header-search-container mr-0">
                            <a href="javascript:void(0)">
                                <img src="images/search.svg" alt=""> 
                            </a>
                              <form class="header-search-box d-none animated jackInTheBox search-box-open">
                                <input type="text" placeholder="Search entire store hire" class="header-search-field">
                                <button class="header-search-btn"> <img src="images/search.svg" alt=""> </button>
                            </form>
                        </li>
                        <li class="user-hover">
                              <div class="dropdown">
                                
                                @if(Auth::check())
                                    <?php $firstname = preg_replace("/\s.*/", '', ltrim(Auth::user()->name)); ?>
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                        {{ucfirst($firstname)}} <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-user-circle"></i> My account</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        
                                    </div>
                                 @else
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                        <img src="{{asset('images/user-icon.svg')}}" alt=""> 
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    @if (Route::has('login'))
                                        <a class="dropdown-item" href="{{route('login')}}"><i class="fas fa-user-plus"></i> Login</a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{route('register')}}"><i class="fas fa-users"></i> Register</a>
                                     @endif   
                                    </div>
                                @endif
                              </div>
                        </li>
                        <li>
                            <a href="wishlist.html">
                                <img src="{{asset('images/like.svg')}}" alt=""> 
                                <div class="notification">0</div>
                            </a>
                        </li>
                        <li class="side-menu">
                        <a href="javascript:void(0)" class="minicart-btn" data-toggle="modal" data-target="javascript:void(0)rightModal">
                                <img src="{{asset('images/shopbag.svg')}}" alt=""> 
                                <div class="notification">{{Cart::count()}}</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>  
            
            <!--Not Sidenav-->
            <div class="mobile-fab d-flex align-items-center justify-content-end">
                <div class="header-right">
                    <div class="header-configure-area">
                        <ul class="nav justify-content-end">
                            <li>
                            <a href="javascript:void(0)" class="minicart-btn" data-toggle="modal" data-target="javascript:void(0)rightModal">
                                    <img src="{{asset('images/shopbag.svg')}}" alt=""> 
                                    <div class="notification">{{Cart::count()}}</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="mobile-bar-lines" onclick="openNav()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            
          </nav>
          <script>
                        //subNavContent

function openShopAll() {
	document.getElementById("shopeall").style.display = "block";
	document.getElementById("ad").style.display = "none";
    
}
function openAmericonDiamond() {
	document.getElementById("shopeall").style.display = "none";
	document.getElementById("ad").style.display = "block";
    
}

 </script>
          <!-- mobile-sidebar-menu -->

          <div class="navbar-header">
            <div class="mobile-menu">
                <div id="overlay" onclick="closeNav()"></div>
                <div>
                    <div id="closeBtn" onclick="closeNav()"> <img src="{{asset('images/close.svg')}}" alt=""> </div>
                    <div class="sidenav" id="mySidenav">
                        <!--Below SideNavHeader-->
                    <div id="main-container">
                        <div class="hdmb-search">
                            <form class="hdmb-search-form" action="/search">
                                <input type="text" placeholder="Start search ..." name="q" value="">
                                <button type="submit" value="">
                                    <img src="{{asset('images/search.svg')}}" alt="">
                                </button>
                              </form> 
                        </div>
                        <a href="/"><div class="sidenavContent">Home</div></a>
                        <a href="javascript:void(0)" onclick="openShopAll()">
                            <div class="sidenavRow"><div>Shop All</div>
                            <span class="row-side-arw"><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </a>
                        <a href="javascript:void(0)" onclick="openAmericonDiamond()">
                            <div class="sidenavRow"><div>Collection</div>
                            <span class="row-side-arw"><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"><div class="sidenavContent">Bridal</div></a>
                        <a href="javascript:void(0)"><div class="sidenavContent">Antique</div></a>
                        <a href="javascript:void(0)"><div class="sidenavContent">Clearance</div></a>

                        <div class="fab-setting">
                            <div class="mobile-settings">
                                <ul class="nav">
                                    <li>
                                        <div class="dropdown mobile-top-dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" id="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Currency
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="currency" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0)">$ USD</a>
                                                <a class="dropdown-item" href="javascript:void(0)">$ EURO</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown mobile-top-dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                My Account
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="myaccount" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">
                                                <a class="dropdown-item" href="my-account.html">my account</a>
                                                <a class="dropdown-item" href="login-register.html"> login</a>
                                                <a class="dropdown-item" href="login-register.html">register</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fas fa-phone"></i> 0123456789</a>
                                    </li>
                                    <li>
                                        <a class="text-lowercase" href="javascript:void(0)"><i class="fas fa-envelope"></i> demo@example.com</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="fab-social-widget d-flex flex-wrap justify-content-center">
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-flickr"></i></a>
                            <a href="javascript:void(0)"><i class="fas fa-rss"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <!--End of first container-->
            
                    <div id="sub-container">
						<div id="shopeall">
							<div id="mainMenu" onclick="openDd();">
							<span class="main-back-arw"><i class="fas fa-chevron-left"></i></span> Shop All
							</div>
							<div id="shop-all-content" class="sub-content">
                                <ul>
                                @if(!empty($shopall))
                                    @foreach($shopall as $ctg)
                                    <li class="nav-item"><a href="javascript:void(0)" wire:click="ShowProducts({{$ctg->id}})" class="nav-link text-small pb-0">{{$ctg->categoryshopall}} </a></li>
                                    @endforeach
                                @endif
                                </ul>
                            </div>
						</div>
						<div  id="ad" >
							<div id="mainMenu" onclick="openDd();">
								<span class="main-back-arw"><i class="fas fa-chevron-left"></i></span> Collection
							</div>
							<div id="americon-daimond-content" class="sub-content">
                                <ul>
                                @if(!empty($category))
                                    @foreach($category as $ctg)
                                        <li class="nav-item"><a href="javascript:void(0)" wire:click="ShowCategory({{$ctg->id}})"  class="nav-link text-small pb-0">{{$ctg->category}} </a></li>
                                    @endforeach
                                @endif
                                </ul>
                            </div>
						</div>
                    </div>
                   
                    </div>
                </div>
                
            </div>       
        </div>
    </header>
<!-- --cart-model-- -->

<div class="fab-menu-cart modal right fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="minicart-close" data-dismiss="modal">
                <img src="{{asset('images/close.svg')}}" alt="">
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="minicart-content-box">
                           <?php $sub=Cart::subtotal()+Cart::tax();?>
                                    <?php 
                                    if($sub !=0 )
                                    {
                                        $excludeTaxAmount=Cart::subtotal()*(Cart::subtotal()/$sub);
                                    ?>
                            <div class="minicart-item-wrapper">
                                    <ul>
                                    <?php foreach(Cart::content() as $row) :?>
                                        <li class="minicart-item">
                                            <div class="minicart-thumb">
                                                <?php //echo '<pre>'; print_r($row->options->img); ?>
                                                <a href="product-view.html">
                                                    <img src="{{ asset('/storage/products/'.$row->options->img) }}" alt="{{$row->name}}">
                                                </a>
                                            </div>
                                            <div class="minicart-content">
                                                <h3 class="product-name">
                                                    <a href="product-view.html"><?php echo $row->name; ?></a>
                                                </h3>
                                                <p>
                                                    <span class="cart-quantity"><?php echo $row->qty; ?> <strong>×</strong></span>
                                                    <span class="cart-price"><i class="fas fa-pound-sign"></i> <?php echo $row->price   ; ?></span>
                                                </p>
                                            </div>
                                            <button wire:click="RemoveCart('{{$row->rowId}}')" class="minicart-remove"><i class="fas fa-times"></i> </button>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                        <div class="minicart-pricing-box">
                                        <ul>
                                            <li>
                                            <span>sub-total</span>
                                        
                                            <span><strong><i class="fas fa-pound-sign"></i> <?php echo round($excludeTaxAmount,2); ?></strong></span>
                                            </li>
                                            <li>
                                                <span>VAT (20%)</span>
                                                <span><strong><i class="fas fa-pound-sign"></i> <?php echo round($excludeTaxAmount*.2,2); ?></strong></span>
                                            </li>
                                            <li class="total">
                                                <span>total</span>
                                                <span><strong><i class="fas fa-pound-sign"></i> {{round($excludeTaxAmount,2)+round($excludeTaxAmount*.2,2)}}</strong></span>
                                            </li>
                                        </ul>
                                        <div class="minicart-button">
                                            <a href="{{route('showcart')}}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                                            <a href="{{route('stripe')}}"><i class="fa fa-share"></i> Checkout</a>
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                        echo '<h1>This cart is empty</h1>';
                                    }
                                     ?>
                          
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
  </div>