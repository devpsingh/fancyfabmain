<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product as PD;
use Livewire\WithPagination; 

class ProductGrid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render(Request $req)
    {
        $products = PD::where('shopall_id',$req->route('slug'))->paginate(1);
        $totalproducts = PD::where('shopall_id',$req->route('slug'))->get()->count();
        return view('livewire.product-grid',['products'=>$products,'totalproducts'=>$totalproducts]);
    }
}
