<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'email','shipping_info_id','billing_info_id','product_info','coupon_code','product_qty',
        'order_status','order_id','payment_mode','stripe_id'
    ];
}
