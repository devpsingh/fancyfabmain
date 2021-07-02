<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container" style="margin-left:30%">
            <div class="panel-heading"> 
                <h3 class="panel-title">Add products</h3> 
            </div> 
        <div class="panel-body">
            <div class="col-md-8 p-3">
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <form wire:submit.prevent="submit" enctype="multipart/form-data">
               <div class="row">
                <div class="form-group col-md-6">
                    <label for="product_name">Enter product name</label>
                    <input type="text" wire:model="product_name" name="product_name" class="form-control" id="pname" aria-describedby="emailHelp" placeholder="Enter Product name">
                    @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="product_category">Select collection category</label>
                    <select wire:model="product_category" class="form-control" name="product_category" id="product_category">
                    <option>Select collection category</option>
                        @if(!empty($category))
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{$cat->category}}</option>
                            @endforeach
                        @endif
                        @error('product_category') <span class="text-danger">{{ $message }}</span> @enderror

                    </select>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-12">
                    <label for="product_category">Select collection category</label>
                    <select wire:model="shopall_category" class="form-control" name="shopall_category" id="shopall_category">
                    <option>Select shop all category</option>
                        @if(!empty($shopall))
                            @foreach($shopall as $cat)
                            <option value="{{ $cat->id }}">{{$cat->categoryshopall}}</option>
                            @endforeach
                        @endif
                        @error('shopall_category') <span class="text-danger">{{ $message }}</span> @enderror

                    </select>
                </div>
                </div>
                @if($colors)
                <div class="row">
                <div class="dropdown  col-md-12">
                    <button class="btn btn-outline-secondary dropdown-toggle" style="width:100%;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose available color options(s) 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width:100%;">
                        @foreach($colors as $color)
                        <a class="dropdown-item" href="#">
                        <input type="checkbox" value="{{$color->id}}" id="{{$color->id}}" wire:model="coloroptions" />
                        <label for="{{$color->id}}"> {{$color->colorname}}</label></a>
                        @endforeach
                    </div>
                    </div>
                    @endif
                    @error('coloroptions') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Enter produt description</label>
                    <textarea name="description" class="form-control" id="description" wire:model="description"></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="code">Enter produt code</label>
                    <input name="code" wire:model="code" type="text" class="form-control" id="code" placeholder="Enter code">
                    @error('code') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="quantity">Enter produt Quantity</label>
                    <input name="quantity" wire:model="quantity" type="number" class="form-control" id="quantity" placeholder="Enter quantity">
                    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="price">Enter produt price to sale</label>
                    <input name="price" wire:model="price" type="number" class="form-control" id="product-price" placeholder="Enter selling price">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="availabilitiy">Select availability status</label>
                    <select name="availabilitiy" wire:model="availability" class="form-control" id="availabilitiy">
                    <option >Select availabilitiy options</option>
                    <option value="1">Available</option>
                    <option value="0">Un available</option>
                    </select>
                    @error('availability') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="productimage">choose image to upload</label>
                    <input type="file" wire:model="images" name="images" class="form-control-file" id="productimage" multiple>
                    @error('image.*') <span class="text-danger error">{{ $message }}</span>@enderror
                    <div wire:loading wire:target="images" id="loader-div" class="text-sm text-gray-500 italic">
                    <!-- <img src="{{asset('/storage/icons/loader.gif')}}" id="loader" /> -->Loading please wait...
                    </div>
               
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
          includeSelectAllOption: true,
        });
});
    </script>
</div>
