<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShippingInfo;
use App\Models\BillingInfo;
use App\Models\Order;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Session;use Promocodes;
use Auth;use Cart;
class FinalShipping extends Component
{
    public $ship=null;
    public $countries=null,$states=null,$cities=null,$SelectCountry=null,$SelectState=null,$SelectCity=null,$email,$newsletters=false;
   public $deliveryOption,$first_name,$last_name,$address_1,$address_2,$address_3,$mobile,$pin,$countryObj=null;
   public $billing_countries=null,$billing_states=null,$billing_cities=null,$SelectBillingCountry=null,$SelectBillingState=null,$SelectBillingCity=null;
   public $billing_first_name,$billing_last_name,$billing_address_1,$billing_address_2,$billing_address_3,$billing_mobile,$billing_pin;
   public $pay="paynow"; public $code=null;
   public $codeData=null;
   public $billing_address='0',$currentStep=1;
   protected $rules=[
       'email'=>'required|email|max:150',
       //'newsletters'=>'sometimes',
       'first_name'=>'required|min:3|max:150',
       'last_name'=>'required|min:3|max:150',
       'address_1'=>'required|max:250',
       'address_2'=>'nullable|max:250',
       'address_3'=>'nullable|max:250',
       'SelectCountry'=>'required',
       'SelectState'=>'nullable',
       'SelectCity'=>'nullable',
       'mobile'=>'required|digits:10|numeric',
       'pin'=>'required|max:10',
       'deliveryOption'=>'required',
   ];
    public function render()
    {
        if($this->billing_address=='1')
        {
            $this->currentStep=2;
        }else{
            $this->currentStep=1;
        }
        return view('livewire.final-shipping');
    }
    public function mount(Request $request)
    {
        $email=$request->session()->get('email');
        if($email)
        {
            $this->ship=ShippingInfo::where('email',$email)->get()->last();
            $this->countries=Country::all();
            $this->billing_countries=Country::all();
            $this->email=$email;
            $this->newsletters=$this->ship->keep_me;
            $this->first_name=$this->ship->first_name;
            $this->last_name=$this->ship->last_name;
            $this->address_1=$this->ship->address_1;
            $this->address_2=$this->ship->address_2;
            $this->address_3=$this->ship->address_3;
            $this->SelectCountry=$this->ship->country_id;
            $this->SelectState=$this->ship->state_id;
            $this->SelectCity=$this->ship->city_id;
            $this->mobile=$this->ship->mobile;
            $this->pin=$this->ship->postal_code;
            $this->deliveryOption=$this->ship->delivery_charge;
            $this->countryObj=Country::find($this->SelectCountry);
            if($this->ship->state_id)
            {
                $this->states=Country::find($this->SelectCountry)->getStates;
            }
            if($this->ship->city_id)
            {
                $this->cities=State::find($this->SelectState)->getCity;
            }
        }
        else
        {
            return redirect()->route('showcart');
        }
    }
    public function updatedSelectCountry()
    {
        $this->reset(['SelectState','SelectCity','deliveryOption','states','cities']);
            if($this->SelectCountry !="")
            {
                $this->states=Country::find($this->SelectCountry)->getStates;
                $this->countryObj=Country::find($this->SelectCountry);
            
                if($this->states->isEmpty())
                {
                    $this->states=null;
                    $this->cities=null;
                }
            }
    }
    public function updatedSelectState()
    {
             if($this->SelectState !="null")
             {
                $this->cities=State::find($this->SelectState)->getCity;
                if($this->cities->isEmpty() || $this->cities==null)
                {
                    $this->cities=null;
                }
            }
    }
    public function update($field)
    {
        $this->validateOnly($field);
    }
    public function EditShippingInfo()
    {
        if($this->validate())
        {
            $record=ShippingInfo::find($this->ship->id);
            $record->update([
                'email'=>$this->email,
                'keep_me'=>$this->newsletters,
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'address_1'=>$this->address_1,
                'address_2'=>$this->address_2,
                'address_3'=>$this->address_3,
                'country_id'=>$this->SelectCountry,
                'state_id'=>$this->SelectState,
                'city_id'=>$this->SelectCity,
                'mobile'=>$this->mobile,
                'postal_code'=>$this->pin,
                'delivery_charge'=>$this->deliveryOption,
            ]);
            Session::put('email',$this->email);
            return redirect()->back()->with('record_updated','Shipping info updated successfully');
        }
    }
    public function CouponDiscount()
    {
        if($this->code !=null)
        {
           $check= Promocodes::check($this->code);
            if(!$check)
            {
                return redirect()->back()->with('promo_error','Not a valid code!');
            }else{
                //check code if user used it
                $checkCode=Order::where('coupon_code',$this->code)->get();
                if($checkCode->count()>0)
                {
                    return redirect()->back()->with('promo_error','You have already used this code!');
                }else{
                    $this->codeData=$check;
                    return redirect()->back()->with('promo_success','Congratulations! your code successfully applied');
                }
            }
        }else{
            return redirect()->back()->with('promo_error','Please enter code');
        }
    }
    public function paymentPage($email,$code)
    { 
       
        if($email)
        {
            $shipping_info=ShippingInfo::where('email',$email)->get()->last();
            if(Auth::check())
            {
                $shipping_info_id=Auth::user()->id;
            }else{
                $shipping_info_id=$shipping_info->id;
            }
            
            //billing info
            if($this->billing_address=='1')
            {
                    $validated=$this->validate([
                        'billing_first_name'=>'required|min:3|max:150',
                        'billing_last_name'=>'required|min:3|max:150',
                        'billing_address_1'=>'required|max:250',
                        'billing_address_2'=>'nullable|max:250',
                        'billing_address_3'=>'nullable|max:250',
                        'SelectBillingCountry'=>'required',
                        'SelectBillingState'=>'nullable',
                        'SelectBillingCity'=>'nullable',
                        'billing_mobile'=>'required|digits:10|numeric',
                        'billing_pin'=>'required|max:10',
                    ]);
                    
                    if($validated)
                    {
                        BillingInfo::create([
                            'user_or_guest_id'=>$shipping_info_id,
                            'email'=>$email,
                            'first_name'=>$this->billing_first_name,
                            'last_name'=>$this->billing_last_name,
                            'address_1'=>$this->billing_address_1,
                            'address_2'=>$this->billing_address_2,
                            'address_3'=>$this->billing_address_3,
                            'country_id'=>$this->SelectBillingCountry,
                            'state_id'=>$this->SelectBillingState,
                            'city_id'=>$this->SelectBillingCity,
                            'mobile'=>$this->billing_mobile,
                            'postal_code'=>$this->billing_pin
                        ]);
                    }
            }
            //creating order info before placing order
            $billing_info=BillingInfo::where('email',$email)->get()->last();
            if($billing_info)
            {
                $billing_info_id=$billing_info->id;
            }else{
                $billing_info_id='';
            }
            //place order if cod
            if($this->pay=='cod')
            {
                $order_id=random_int(11111111,99999999);
                $order_status=1;
            }else{
                $order_id=null;
                $order_status=0;
            }
           $place_order=Order::create([
                'email'=>$email,
                'shipping_info_id'=>$shipping_info_id,
                'billing_info_id'=>$billing_info_id,
                'product_info'=>Cart::content(),
                'coupon_code'=>$code,
                'product_qty'=>Cart::count(),
                'order_status'=>$order_status,
                'order_id'=>$order_id,
                'payment_mode'=>$this->pay,
                'stripe_id'=>'',

            ]);
            if($this->pay !='cod')
            {
                Session::put('email',$email);
                return redirect()->route('stripe');
            }else{
                if($place_order)
                {
                    //send email to customer
                }
                return redirect()->to('/order/invoice');
            }
        }else{
            return redirect()->route('home');
        }
    }
    public function updatedSelectBillingCountry()
    {
        $this->reset(['SelectBillingState','SelectBillingCity','billing_states','billing_cities']);
            if($this->SelectBillingCountry !="")
            {
                $this->billing_states=Country::find($this->SelectBillingCountry)->getStates;
                $this->countryObj=Country::find($this->SelectBillingCountry);
                if($this->billing_states->isEmpty())
                {
                    $this->billing_states=null;
                    $this->billing_cities=null;
                }
            }
    }
    public function updatedSelectBillingState()
    {
             if($this->SelectBillingState !="")
             {
                $this->billing_cities=State::find($this->SelectBillingState)->getCity;
                if($this->billing_cities->isEmpty() || $this->billing_cities==null)
                {
                    $this->billing_cities=null;
                }
            }
    }
}
