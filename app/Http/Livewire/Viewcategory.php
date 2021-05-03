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
        $products = PD::where('category_id',$req->route('slug'))->paginate(1);
        return view('livewire.viewcategory',['products'=>$products]);
    }
}
