<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $fillable=[
        'email','keep_me','first_name','last_name','address_1','address_2',
        'address_3','country_id','state_id','city_id','postal_code','mobile','delivery_charge'
    ];
       
}
