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
                <label for="main">Selecte main category</label>
                    <select class="form-control" wire:model="maincategory">
                        <option>Select main category</option>
                        <option value="shopeall">Shop All</option>
                        <option value="collection">Collection</option>
                        <option value="bridal">Bridal</option>
                        <option value="antique">Antique</option>
                        <option value="clearance">Clearance</option>
                    </select>
                    @error('maincategory') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="category">Enter category name</label>
                    <input type="text" name="category" class="form-control" id="category" wire:model="category" />
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    <button type="submit" class="btn-primary btn-block mt-2" wire:click.prevent='createCategory'>Create category</button>
                   
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
