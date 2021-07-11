<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\Product as PD; 

class Viewcategory extends Component
{
    use WithPagination;
    
    
    public function render(Request $req)
    {
         $products = PD::where('collection_id',$req->route('slug'))->paginate(1);
        $totalproducts = PD::where('collection_id',$req->route('slug'))->get()->count();
        return view('livewire.viewcategory',['products'=>$products,'totalproducts'=>$totalproducts]);
    }
}
