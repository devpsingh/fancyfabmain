<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product as PD;

class ProductPage extends Component
{
    public function render(Request $req)
    {
        $products = PD::where('id',$req->route('slug'))->get();
        return view('livewire.product-page',['products'=>$products]);
    }
}
