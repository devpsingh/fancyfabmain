<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;use Session;
use App\Models\Order;
class Invoice extends Component
{
    public $order_info=null;
    public function render()
    {
        return view('livewire.invoice');
    }
    public function mount()
    {
        if(Auth::check())
        {
            $email=Auth::user()->email;
        }else{
            $email=Session::get('email');
        }
        if(!$email){
            return redirect()->to('/');
        }else{
            $this->order_info=Order::where('email',$email)->get()->last();
        }
    }
}
