<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product as PD;
use Session;
use Cart;

class ProductPage extends Component
{
    public $quantity=1;
    public function increaseQty()
    {
        $this->quantity++;
    }
    public function decreaseQty()
    {
        $this->quantity--;
    }
    public function addToCart($id)
    {
        $product = PD::find($id);
        //dd(Cart::get($rowId));
        if(!$product) {

            abort(404);

        }
        $qty=$this->quantity;
        
        $images=json_decode($product->thumbnail_path);
        $path=$images[0];
       Cart::add(['id' => $product->id, 'name' => $product->product_name, 
        'qty' => $qty,'options'=>['desc'=>$product->product_desc,'code'=>$product->code,'img' => $path], 'price' => $product->price
        ]);
        return redirect('/');
    }
    public function render(Request $req)
    {
        $products = PD::where('id',$req->route('slug'))->get();
        return view('livewire.product-page',['products'=>$products]);
    }
}
