<div>
    {{-- The whole world belongs to you --}}
  <div  style="margin-top:17%">
 <ul class="navbar nav">
  @if($products)
    @foreach($products as $pd)
      @foreach(json_decode($pd->thumbnail_path) as $key=>$image)
       @if($key==0 && $pd->available==1)
       <li class="nav-item">
        <div class="card item">
          <div class="card-header">
            <a href="{{route('product')}}"><img class="" src="{{ asset('/storage/products/'.$image)}}" /></a>
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
          </li>
         @endif
      @endforeach
    @endforeach
    </ul>
    {{ $products->links('pagination::bootstrap-4') }}
  @endif
  

  </div>
  
</div>
