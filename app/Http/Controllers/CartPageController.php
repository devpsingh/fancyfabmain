<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use cart;
class CartPageController extends Controller
{
    public function ShowCart()
    {
        return view('showcart');
    }
}
