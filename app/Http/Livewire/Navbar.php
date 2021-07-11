<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Category;

use App\Models\shopall;
use Cart;
class Navbar extends Component
{
     
    
    public function render()
    {
        return view('livewire.navbar',['category'=>Category::all(),'shopall'=>shopall::all(),]);
    }
    public function RemoveCart($rowid)
    {
        
        Cart::remove($rowid);
        return redirect('/');
    }
    public function ShowProducts($slug)
    {
        return redirect()->route('products',$slug);
    }
    public function ShowCategory($slug)
    {
        return redirect()->route('category',$slug);
    }
}
 