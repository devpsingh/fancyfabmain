<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Cart;use Auth;use Session;
use App\Models\Order;
class Stripecheckout extends Component
{
    public $email=null,$order_info=null;
    public function render()
    {
        return view('livewire.stripecheckout');
    }
   public function mount()
   {
        if(Auth::check())
        {
            $this->email=Auth::user()->email;
        }else{
            $this->email=Session::get('email');
        }
        if($this->email==null)
        {
            return redirect()->to('/');
        }else{
            $this->order_info=Order::where('email',$this->email)->get()->last();
        }
        
   }
}
