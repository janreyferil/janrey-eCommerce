<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $fillable = [
        'order_id', 'sku', 'name', 'description', 'price',
        'quantity', 'subtotal' 
    ];

    
}
