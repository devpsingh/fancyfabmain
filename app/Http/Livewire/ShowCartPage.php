<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;use Session;
class ShowCartPage extends Component
{
    public function render()
    {
        return view('livewire.show-cart-page');
    }
    public function RemoveCart($rowid)
    {
        
        Cart::remove($rowid);
        return redirect()->route('showcart');
    }
}
