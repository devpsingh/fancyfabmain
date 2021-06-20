<div>
<header class="fancyfab-header">
        <nav class="navbar navbar-expand-lg fixed-top bg-white py-3 shadow-sm">
            <a href="index.html" class="navbar-brand font-weight-bold mr-auto"> <img src="images/LOGO.svg" alt=""> </a>
            <div id="navbarContent" class="collapse navbar-collapse order-sm-12 order-lg-1">
              <ul class="navbar-nav ml-auto">
                <!-- Megamenu-->
                <li class="nav-item"><a href="index.html" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown megamenu"><a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Shop All <i class="fa fa-angle-down"></i> </a>
                  <div aria-labelledby="megamenu" class="dropdown-menu fab-dropdown border-0 rounded-0 p-0 m-0">
                    <div class="container-fluid">
                        <div class="row rounded-0 m-0">
                            <div class="col-12">
                              <div class="pt-3 pb-4">
                                <div class="row">
                                 <div class="col-sm-6 col-lg-6">
                                    <ul class="list-unstyled">
                                        @if(!empty($category))
                                            <?php $i=1 ?>
                                            @foreach($category as $ctg)
                                                @if($ctg->maincategory=="SHOPEALL" && $i<=6)
                                                    <li class="nav-item"><a href="#" class="nav-link text-small pb-0">{{$ctg->category}} </a></li>
                                                @endif
                                                <?php $i++ ?>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <ul class="list-unstyled">
                                        @if(!empty($category))
                                        <?php $i=1 ?>
                                            @foreach($category as $ctg)
                                                @if($ctg->maincategory=="SHOPEALL" && $i > 6 && $i<=12)
                                                    <li class="nav-item"><a href="#" class="nav-link text-small pb-0">{{$ctg->category}} </a></li>
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
                                                @if($ctg->maincategory=="COLLECTION")
                                                    <li class="nav-item"><a href="#" class="nav-link text-small pb-0">{{$ctg->category}} </a></li>
                                                @endif
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
                            <a href="#">
                                <img src="images/search.svg" alt=""> 
                            </a>
                              <form class="header-search-box d-none animated jackInTheBox search-box-open">
                                <input type="text" placeholder="Search entire store hire" class="header-search-field">
                                <button class="header-search-btn"> <img src="images/search.svg" alt=""> </button>
                            </form>
                        </li>
                        <li class="user-hover">
                              <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                    <img src="images/user-icon.svg" alt=""> 
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">login</a>
                                  <a class="dropdown-item" href="#">register</a>
                                  <a class="dropdown-item" href="#">my account</a>
                                </div>
                              </div>
                        </li>
                        <li>
                            <a href="wishlist.html">
                                <img src="images/like.svg" alt=""> 
                                <div class="notification">0</div>
                            </a>
                        </li>
                        <li class="side-menu">
                            <a href="#" class="minicart-btn">
                                <img src="images/shopbag.svg" alt=""> 
                                <div class="notification">2</div>
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
                                <a href="#" class="minicart-btn">
                                    <img src="images/shopbag.svg" alt=""> 
                                    <div class="notification">2</div>
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

          <!-- mobile-sidebar-menu -->

          <div class="navbar-header">
            <div class="mobile-menu">
                <div id="overlay" onclick="closeNav()"></div>
                <div>
                    <div id="closeBtn" onclick="closeNav()"> <img src="images/close.svg" alt=""> </div>
                    <div class="sidenav" id="mySidenav">
                        <!--Below SideNavHeader-->
                    <div id="main-container">
                        <div class="hdmb-search">
                            <form class="hdmb-search-form" action="/search">
                                <input type="text" placeholder="Start search ..." name="q" value="">
                                <button type="submit" value="">
                                    <img src="images/search.svg" alt="">
                                </button>
                              </form> 
                        </div>
                        <a href="#"><div class="sidenavContent">Home</div></a>
                        <a href="#" onclick="openShopAll()">
                            <div class="sidenavRow"><div>Shop All</div>
                            <span class="row-side-arw"><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </a>
                        <a href="#" onclick="openAmericonDiamond()">
                            <div class="sidenavRow"><div>Collection</div>
                            <span class="row-side-arw"><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </a>
                        <a href="#"><div class="sidenavContent">Bridal</div></a>
                        <a href="#"><div class="sidenavContent">Antique</div></a>
                        <a href="#"><div class="sidenavContent">Clearance</div></a>

                        <div class="fab-setting">
                            <div class="mobile-settings">
                                <ul class="nav">
                                    <li>
                                        <div class="dropdown mobile-top-dropdown">
                                            <a href="#" class="dropdown-toggle" id="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Currency
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="currency" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="#">$ USD</a>
                                                <a class="dropdown-item" href="#">$ EURO</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown mobile-top-dropdown">
                                            <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <a href="#"><i class="fas fa-phone"></i> 0123456789</a>
                                    </li>
                                    <li>
                                        <a class="text-lowercase" href="#"><i class="fas fa-envelope"></i> demo@example.com</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="fab-social-widget d-flex flex-wrap justify-content-center">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-flickr"></i></a>
                            <a href="#"><i class="fas fa-rss"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <!--End of first container-->
            
                    <div id="sub-container">
						<div id="shopeall">
							<div id="mainMenu" onclick="openDd();">
							<span class="main-back-arw"><i class="fas fa-chevron-left"></i></span> Shop All
							</div>
							<div id="shop-all-content" class="sub-content"></div>
						</div>
						<div  id="ad" >
							<div id="mainMenu" onclick="openDd();">
								<span class="main-back-arw"><i class="fas fa-chevron-left"></i></span> Collection
							</div>
							<div id="americon-daimond-content" class="sub-content"></div>
						</div>
                    </div>
                   
                    </div>
                </div>
                
            </div>       
        </div>
    </header>

    
  </div>