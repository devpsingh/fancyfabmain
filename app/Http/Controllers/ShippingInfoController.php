<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingInfoController extends Controller
{
    public function index()
    {
        return view('shippingInfo');
    }
}
