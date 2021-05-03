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
                    <label for="product_category">Select Product category</label>
                    <select wire:model="product_category" class="form-control" name="product_category" id="product_category">
                    <option>Select category</option>
                @if(!empty($category))
                    @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{$cat->category}} ({{$cat->maincategory}})</option>
                    @endforeach
                @endif
                @error('product_category') <span class="text-danger">{{ $message }}</span> @enderror

                    </select>
                </div>
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
                    @error('availabilitiy') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="productimage">choose image to upload</label>
                    <input type="file" wire:model="productimage" name="productimage" class="form-control-file" id="productimage" multiple>
                    @error('productimage.*') <span class="text-danger error">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="productimage" id="loader-div" class="text-sm text-gray-500 italic">
                    <img src="{{asset('/storage/icons/loader.gif')}}" id="loader" /></div>
               
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
