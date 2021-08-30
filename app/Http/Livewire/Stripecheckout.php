<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Cart;use Auth;use Session;

class Stripecheckout extends Component
{
    public $email=null;
    public $order_info=null;
    public $discount=null;
    public function render()
    {
        return view('livewire.stripecheckout');
    }
   public function mount(Request $request)
   {
        if(Cart::count() > 0)
        {
            if(Auth::check())
            {
                $email=Auth::user()->email;
            }else{
                $email=Session::get('email');
            }
            if(!$email)
            {
                return redirect()->to('/');
            }
            else{
                $this->discount=Session::get('discount');
            }
        }else{
            Session::flash('shipping_error','Oops! The products you chose are not in stock, please choose other products!');
            return redirect()->route('showcart');
        }
    }
    public function RemoveCartProduct($rowid)
    {
        Cart::remove($rowid);
        return redirect()->route('stripe');
    }

}
