<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as PD;
use Session;
use Cart;

class WelcomeBody extends Component
{
    public function render()
    {
        $firstCarousel = PD::inRandomOrder()->limit(10)->get();
        $secondCarousel = PD::orderBy('id', 'desc')->limit(10)->get();
        $demand = PD::inRandomOrder()->limit(4)->get();
        return view('livewire.welcome-body',[
            'products'=>$firstCarousel,
            'second'=>$secondCarousel,
            'demand'=>$demand,
            ]);
    }
    public function addToCart($id)
    {
        $product = PD::find($id);
        //dd(Cart::get($rowId));
        if(!$product) {

            abort(404);

        }
        $qty=1;
        if(Cart::count()>0)
        {
            foreach(Cart::content() as $row)
            {
                if($row->id==$product->id)
                {
                    $qty+1;
                }
            }
        }
        $path=json_decode($product->thumbnail_path);
     
       Cart::add(['id' => $product->id, 'name' => $product->product_name, 
        'qty' => $qty,'options'=>['desc'=>$product->product_desc,'code'=>$product->code,'img' => $path], 'price' => $product->price
        ]);
        return redirect('/');
    }
   
}
