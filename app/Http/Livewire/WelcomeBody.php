<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as PD;
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
}
