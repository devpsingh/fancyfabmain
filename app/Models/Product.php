<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'collection_id',
        'shopall_id',
        'code',
        'product_name',
        'thumbnail_path',
        'product_desc',
        'qty',
        'price',
        'available',
    ];
}
