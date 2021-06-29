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
        $demand = PD::inRandomOrder()->limit(8)->get();
        $new = PD::orderBy('id', 'desc')->limit(20)->get();
        return view('livewire.welcome-body',[
            'products'=>$firstCarousel,
            'second'=>$secondCarousel,
            'demand'=>$demand,
            'new'=>$new,
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
        $images=json_decode($product->thumbnail_path);
        $path=$images[0];
       Cart::add(['id' => $product->id, 'name' => $product->product_name, 
        'qty' => $qty,'options'=>['desc'=>$product->product_desc,'code'=>$product->code,'img' => $path], 'price' => $product->price
        ]);
        return redirect('/');
    }
    
}
