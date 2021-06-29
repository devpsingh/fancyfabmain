<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Cart;
class Navbar extends Component
{
     
    
    public function render()
    {
        return view('livewire.navbar',['category'=>Category::all()]);
    }
    public function RemoveCart($rowid)
    {
        
        Cart::remove($rowid);
        return redirect('/');
    }
}
 