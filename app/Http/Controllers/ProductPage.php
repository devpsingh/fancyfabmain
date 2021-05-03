<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductPage extends Controller
{
    public function ProductPage(Request $request)
    {
        return view('productpage');
    }
}
