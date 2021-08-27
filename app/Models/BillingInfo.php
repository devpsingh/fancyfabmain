<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_or_guest_id','email','first_name','last_name','address_1','address_2',
        'address_3','country_id','state_id','city_id','postal_code','mobile',
    ];
}
