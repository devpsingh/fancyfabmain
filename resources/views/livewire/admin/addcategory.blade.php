<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="container p-5" style="margin-left:300px;margin-top:10%">
        <div class="row">
            <div class="col-md-6 mb-5">
                 <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <form>
                <div class="form-group">
                    <label for="category">Enter category/Collection</label>
                    <input type="text" name="category" class="form-control" id="category" wire:model="category" />
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    <button type="submit" class="btn-primary btn-block mt-2" wire:click.prevent='createCategory'>Create Category or Collection</button>
                </div>
                </form>
                <hr>
                <form>
                <div class="form-group">
                    <label for="shopall">Enter category for shop all</label>
                    <input type="text" name="shopall" class="form-control" id="shopall" wire:model="categoryshopall" />
                    @error('categoryshopall') <span class="text-danger">{{ $message }}</span> @enderror
                    <button type="submit" class="btn-warning btn-block mt-2" wire:click.prevent='createShopallCategory'>Create Shop All Category</button>
                </div>
                </form>
                <hr>
                <form>
                <div class="form-group">
                    <label for="colorname">Enter color name for products</label>
                    <input type="text" name="name" class="form-control" id="colorname" wire:model="colorname" />
                    @error('colorname') <span class="text-danger">{{ $message }}</span> @enderror
                    <label for="colorcode">Enter color hex-code for products</label>
                    <input type="text" name="colorcode" class="form-control" id="colorcode" wire:model="colorcode" />
                    @error('colorcode') <span class="text-danger">{{ $message }}</span> @enderror
                    <button type="submit" class="btn-danger btn-block mt-2" wire:click.prevent='Color'>Submit color options</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
