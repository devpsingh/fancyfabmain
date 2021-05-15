<div>
    <div class="d-flex" style="margin-top:15%">
 
        <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        <div class="carousel-inner ">
            <div class="carousel-item active">
            <img class="d-block " src="{{asset('storage/carousel/cr-1.jpg')}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href='#' class="btn btn-light" 
                style="border-radius:0px;padding:8px 20px 8px 20px">Explore more</a></h5>
                <p>Necklace</p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block" src="{{asset('storage/carousel/cr-2.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block text-secondary">
                <h5>Wide range of</h5>
                <p>Pendets</p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block" src="{{asset('storage/carousel/cr-3.jpg')}}" alt="Ringh">
            <div class="carousel-caption d-none d-md-block" style="color:orange;">
                <h5>Dream of a lady</h5>
                <p>Rings</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
      </div>

    
<!-- Item slider-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 p-3 d-flex"><h5 class="mr-auto">New arrivals</h5>
        <a class="btn btn-outline-primary ml-auto" style="border-radius:0px;" href="{{route('products')}}">View All</a>
    </div>
  </div>
</div>

<div id="carousel" class="owl-carousel owl-theme owl-loaded">
  @if($products)
    @foreach($products as $pd)
      
      @foreach(json_decode($pd->thumbnail_path) as $key=>$image)
       @if($key==0 && $pd->available==1)
        <div class="card item">
          <div class="card-header d-flex justify-content-center">
            <a href="{{url('/view/product',$pd->id)}}">
              <img class="" style="width:150px;height:150px;" src="{{ asset('/storage/products/'.$image)}}" />
              </a>
          </div>
            <div class="card-body">
              <div class="justify-content-between">
                <h6 class="card-title">{{$pd->code}}</h6>
                <h6 class="card-title">{{$pd->product_name}}</h6>
              </div>
              
                <div class="buy d-flex justify-content-between align-items-center">
                  <div class="price text-success"><h4 class="mt-1"> &#163; {{$pd->price}}</h4></div>
                  <div class="price text-danger"><h4 class="mt-1">	&#163;<strike> {{$pd->price+1}}</strike></h4></div>
                
                </div>
            </div>
          </div>
         @endif
      @endforeach
    @endforeach
  @endif
	
</div>
<div class="container-fluid mb-4 mt-4">
  <div class="d-flex justify-content-left">
    <h5>In demand</h5>
  </div>

  <div class="row p-3">
  @if($demand)
    @foreach($demand as $pd)
    @foreach(json_decode($pd->thumbnail_path) as $key=>$image)
       @if($key==0 && $pd->available==1)
    <div class="col-md-3">
      <div class="card item">
      <div class="card-header  d-flex justify-content-center">
        <a href="{{url('/view/product',$pd->id)}}"><img class="card-img" style="width:150px;height:150px;" src="{{asset('/storage/products/'.$image)}}"></a>
      </div>
        <div class="card-body">
            <h6 class="card-title">{{$pd['product_code']}}</h6>
            <div class="card-text text-muted">{{$pd['product_desc']}}</div>
            <div class="buy d-flex justify-content-between align-items-center">
              <div class="price text-success"><h6 class="mt-1">&#163; {{$pd['price']}}</h6></div>
              <div class="price text-danger"><h6 class="mt-1">&#163; <strike> {{$pd['price']+1.99}}</strike></h6></div>
             
              <button type="button" class="btn btn-danger" wire:click="addToCart({{$pd->id}})">Add to cart</button>
              
            </div>
        </div>
      </div>
    </div>
    @endif
      @endforeach
    @endforeach
  @endif
    
  </div><!--row-->
  
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 p-3 d-flex"><h5 class="mr-auto">What's New</h5>
        <a class="btn btn-outline-primary ml-auto" style="border-radius:0px;" href="{{route('products')}}">View All</a>
    </div>
  </div>
</div>
<!--second owl-product slider-->
<div id="second-carousel" class="owl-carousel owl-theme owl-loaded mb-3">
  @if($second)
    @foreach($second as $pd)
    @foreach(json_decode($pd->thumbnail_path) as $key=>$image)
       @if($key==0 && $pd->available==1)
    <div class="card item">
      <div class="card-header d-flex justify-content-center">
            <a href="{{url('/view/product',$pd->id)}}"><img class="" style="width:150px;height:150px;" src="{{ asset('/storage/products/'.$image)}}" /></a>
          </div>
        <div class="card-body">
          <div class="justify-content-between">
            <h6 class="card-title">{{$pd->product_code}}</h6>
            <h6 class="card-title">{{$pd->product_name}}</h6>
          </div>
           
            <div class="buy d-flex justify-content-between align-items-center">
              <div class="price text-success"><h4 class="mt-1"> &#163; {{$pd->price}}</h4></div>
              <div class="price text-danger"><h4 class="mt-1">	&#163;<strike> {{$pd->price+1}}</strike></h4></div>
             
            </div>
        </div>
      </div>
      @endif
      @endforeach
    @endforeach
  @endif
</div>

</div>
