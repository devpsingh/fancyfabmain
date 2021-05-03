<div>
    <div class="top-nav">
<nav class="navbar  navbar-expand-md navbar-light bg-light main-menu " style="box-shadow:none;">
  <div class="container">

    <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                <i class="fas fa-bars"></i>
            </button>

    <a class="navbar-brand" href="#">
      <h4 class="font-weight-bold">FancyFab</h4>
    </a>
       <div class="search-bar  ">
          <div class="container">
            <div class="row">
              <div class="col-12">
              <form class="form-inline  mx-auto">
                <input class="form-control search" type="search" placeholder="Search products..." aria-label="Search">
                <button class="btn bg-white my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
              </div>
            </div>
          </div>
        </div>
    <ul class="navbar-nav ml-auto d-block d-md-none">
      <li class="nav-item">
       <button type="button" class="btn btn-demo" data-toggle="modal" data-target="#cart" data-backdrop='static' data-keyboard='false'><i class="fa" style="font-size:20px">&#xf07a;</i>
            <span class='badge badge-primary lblCartCount'> 3 </span></button>
      </li>
    </ul>

    <div class="collapse navbar-collapse">
      <form class="form-inline my-2 my-lg-0 mx-auto">
        <input class="form-control search" type="search" placeholder="Search for products..." aria-label="Search">
        <button class="btn my-2 my-sm-0 search-btn" type="submit"><i class="fas fa-search"></i></button>
      </form>

      <ul class="navbar-nav">
        <li class="nav-item">
         <button type="button" class="btn btn-demo" data-toggle="modal" data-target="#cart"><i class="fa" style="font-size:20px">&#xf07a;</i>
            <span class='badge badge-primary lblCartCount'> 3 </span></button>
        </li>
        <li class="nav-item ml-md-3 d-flex dropdown">
          <!-- <a class="btn btn-primary" href="#"><i class="fas fa-user-circle mr-1"></i> Log In / Register</a> -->
          @if (Route::has('login'))
                
                    @auth
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-power-off text-success"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-link text-gray-700"><i class="fas fa-power-off"></i> Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link text-gray-700"><i class="fas fa-user-plus"></i> Register</a>
                        @endif
                    @endauth
                
            @endif
        </li>
      </ul>
    </div>

  </div>
</nav>

<nav class="navbar  navbar-expand-md navbar-light bg-light sub-menu">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-auto nav-menu">
        <li class="nav-item active">
          <a class="nav-link" href="#">NEW ARRIVALS <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            COLLECTION
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         @if($category)
          @foreach($category as $ctg)
          @if($ctg->maincategory=='COLLECTION')
           <a class="dropdown-item" href="{{url('view/category',$ctg->id)}}">{{$ctg['category']}}</a>
          @endif
           @endforeach
         @endif
         </div>
         
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="collectionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              JEWELLERY
          </a>
          <div class="dropdown-menu" aria-labelledby="collectionDropdown">
          @if($category)
            @foreach($category as $ctg)
            @if($ctg->maincategory=='JEWELLERY')
            <a class="dropdown-item" href="{{url('view/category',$ctg->id)}}">{{$ctg['category']}}</a>
            @endif
            @endforeach
          @endif
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="adDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              AMERICAN DIAMOND
          </a>
          <div class="dropdown-menu" aria-labelledby="adDropdown">
          @if($category)
            @foreach($category as $ctg)
            @if($ctg->maincategory=='AMERICAN DIAMOND')
            <a class="dropdown-item" href="{{url('view/category',$ctg->id)}}">{{$ctg['category']}}</a>
            @endif
            @endforeach
          @endif
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            BRIDAL
                        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if($category)
            @foreach($category as $ctg)
            @if($ctg->maincategory=='BRIDAL')
            <a class="dropdown-item" href="{{url('view/category',$ctg->id)}}">{{$ctg['category']}}</a>
            @endif
            @endforeach
          @endif
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ANTIQUE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CLEARANCE</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

 
</div>
<!-- Sidebar -->
<nav id="sidebar">
  <div class="sidebar-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-10 pl-0 ">
          <!-- <a class="btn btn-primary" href="#"><i class="fas fa-user-circle mr-1"></i> Log In</a> -->
          @if (Route::has('login'))
                
                    @auth
                       <i class="fas fa-user"></i>  {{ Auth::user()->name }}

                                    <a class="text-dark pl-2" style="text-decoration:none;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off text-success"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                    @else
                        <a  class="btn btn-primary" href="{{ route('login') }}" class="text-sm">Login</a>

                        @if (Route::has('register'))
                            <a  class="btn btn-primary" href="{{ route('register') }}" class="ml-4">Register</a>
                        @endif
                    @endauth
                </a>
            @endif
            </div>

        <div class="col-2 text-left">
          <button type="button" id="sidebarCollapseX" class="btn btn-link">
                            <i class="fas fa-times fa-2x"></i>
                        </button>
        </div>
      </div>
    </div>
  </div>

  <ul class="list-unstyled components links">
    <li class="active">
      <a href="#"><i class="fas fa-home mr-3"></i> Home</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Products
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         @if($category)
          @foreach($category as $ctg)
           <a class="dropdown-item" href="#">{{$ctg['category']}}</a>
          @endforeach
         @endif
         </div>
      <li>
      <a href="#"><i class="fas fa-book-open mr-3"></i> About us</a>
    </li>
    <li>
      <a href="#"><i class="fas fa-crown mr-3"></i> Services</a>
    </li>
    <li>
      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-question-circle mr-3"></i>
                    Support</a>
      <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
          <a href="#">Delivery Information</a>
        </li>
        <li>
          <a href="#">Privacy Policy</a>
        </li>
        <li>
          <a href="#">Terms & Conditions</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#"><i class="fas fa-phone mr-3"></i> Contact</a>
    </li>
  </ul>

  <h6 class="text-uppercase mb-1">Categories</h6>
  <ul class="list-unstyled components mb-3">
    <li>
      <a href="#">Category 1</a>
    </li>
    <li>
      <a href="#">Category 1</a>
    </li>
    <li>
      <a href="#">Category 1</a>
    </li>
    <li>
      <a href="#">Category 1</a>
    </li>
    <li>
      <a href="#">Category 1</a>
    </li>
    <li>
      <a href="#">Category 1</a>
    </li>
  </ul>

  <ul class="social-icons">
    <li><a href="#" target="_blank" title=""><i class="fab fa-facebook-square"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fab fa-twitter"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fab fa-linkedin"></i></a></li>
    <li><a href="#" target="_blank" title=""><i class="fab fa-instagram"></i></a></li>
  </ul>

</nav>


<!-- Modal -->
 <div wire:ignore.self class="modal right fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <div class="d-flex justify-content-between" style="width:70%;">
          <h6 class="modal-title" id="cartLabel">My Cart <i class="fa" style="font-size:20px">&#xf07a;</i>
            <span class='badge badge-primary lblCartCount'> 6 </span></h6>
             <h6 class="modal-title " id="cartLabel">Grand Total: <i class="fas fa-rupee-sign"></i>
            <span style="font-weight: 900;color:purple;"> 2394.00</span></h6>
            </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>

        <div class="modal-body" style="overflow-y: scroll">
          <table class="table cart-table" style="border:none;">
          
            <thead>
              <tr>
                <th class="product">Product</th>
                <th class="price">Price</th>
                <th class="qty">Quantity</th>
                <th class="total">Total</th>
                <th class="act">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:50px;height:50px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
              <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:30px;height:30px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
              <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:30px;height:30px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
               <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:30px;height:30px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
               <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:30px;height:30px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
               <tr>
                <td class="product">
                  <img src="{{asset('img/neckles.png')}}" style="width:30px;height:30px;" alt="product">
                  This is product info will be seen here
                </td>
                 <td>399.00 INR</td>
                  <td>
                    <button class="btn btn-outline-danger btn-circle" wire:click="decrement"><i class="fas fa-minus"></i></button>
                          {{$count}}
                    <button  class="btn btn-outline-danger btn-circle" wire:click="increment"><i class="fas fa-plus"></i></button>
                  </td>
                   <td>399.00 INR</td>
                    <td><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
          <div class="modal-footer justify-content-between">
           <button class="btn btn-danger"  data-dismiss="modal" aria-label="Close">
            <i class="fas fa-angle-double-left text-light"></i>
           Continue shopping</button>
           <button class="btn btn-success">Proceed to Check out
              <i class="fas fa-angle-double-right text-light"></i>
           </button>
          </div>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  

  </div>