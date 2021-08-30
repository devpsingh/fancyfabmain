<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Auth;use Session;
use App\Models\Order;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\ShippingInfo;use Str;
use App\Models\BillingInfo;use Promocodes;
class Invoice extends Component
{
    public $order_info=null,$shipping_address=null,$billing_address=null,$billing_country=null,$billing_state=null,$billing_city=null;
    public $shipping_country=null,$shipping_state=null,$shipping_city=null;
    public $coupon_discount=null;public $stripe=null;
    public function render()
    {
        return view('livewire.invoice');
    }
    public function mount(Request $request)
    {
        $this->stripe=$request->all();
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
            $this->shipping_address=ShippingInfo::find($this->order_info->shipping_info_id);
            $this->billing_address=BillingInfo::find($this->order_info->billing_info_id);
            $this->shipping_country=Country::find($this->shipping_address->country_id);
            $this->shipping_state=State::find($this->shipping_address->state_id);
            $this->shipping_city=City::find($this->shipping_address->city_id);
            if(!empty($this->billing_address))
            {
                $this->billing_country=Country::find($this->billing_address->country_id);
                $this->billing_state=State::find($this->billing_address->state_id);
                $this->billing_city=City::find($this->billing_address->city_id);
            }
            else
            {
                $this->billing_address=$this->shipping_address;
                $this->billing_country=$this->shipping_country;
                $this->billing_state=$this->shipping_state;
                $this->billing_city=$this->shipping_city; 
            }
            $promos=Promocodes::all();
            foreach($promos as $promo)
            {
                if($promo->code==$this->order_info->coupon_code)
                {
                    $this->coupon_discount=$promo->reward;
                }
            }
        }
    }
}
