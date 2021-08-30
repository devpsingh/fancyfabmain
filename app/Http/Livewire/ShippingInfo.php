<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Notifications\Notifiable;
use Gabievi\Promocodes\Traits\Rewardable;
use App\Models\ShippingInfo as Shipping;
use Cart;use Auth;
use Session;
class ShippingInfo extends Component
{
    use Notifiable, Rewardable;
    public $countries=null,$states=null,$cities=null,$SelectCountry=null,$SelectState=null,$SelectCity=null,$email,$newsletters=false;
    public $deliveryOption,$first_name,$last_name,$address_1,$address_2,$address_3,$mobile,$pin,$countryObj=null;
    public $currentStep=1;
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
            return view('livewire.shipping-info');
        }
        public function mount()
        {   if(Cart::count() > 0)
            {
                if(Auth::check())
                {
                    $this->email=Auth::user()->email;
                }
                if(Cart::content()->isEmpty())
                {
                    return redirect()->to('/');
                }
                $this->countries=Country::all();
            }
            else{
                Session::flash('shipping_error','Oops! The products you chose are not in stock, please choose other products!');
                return redirect()->route('showcart');
            }
        }
        public function firstStepSubmit()
        {
            $validated=$this->validate(['email'=>'required|email|max:150']);
            if($validated)
            {
                $record=Shipping::where('email',$this->email)->get()->last();
                if($record)
                {
                    Session::put('email',$this->email);
                    return redirect()->route('shipping');  
                }else{
                    $this->currentStep=2;
                }
            }
            
        }
        public function back($step)
        {
            $this->currentStep = $step;    
        }
        public function updatedSelectCountry()
        {
            $this->reset(['SelectState','SelectCity','deliveryOption','states','cities']);
            
                $this->states=Country::find($this->SelectCountry)->getStates;
                $this->countryObj=Country::find($this->SelectCountry);
            
                if($this->states->isEmpty())
                {
                    $this->states=null;
                    $this->cities=null;
                }
            }
        public function updatedSelectState()
        {
                $this->cities=State::find($this->SelectState)->getCity;
                if($this->cities->isEmpty() || $this->cities==null)
                {
                    $this->cities=null;
                }
            
        }
        public function updated($fields)
        {
            $this->validateOnly($fields);
        }
        public function ContinueShope()
        {
            if($this->validate())
            {
            Shipping::create([
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
                return redirect()->route('shipping');
                
                //dd($this->newsletters);
            }
        }
   
}
