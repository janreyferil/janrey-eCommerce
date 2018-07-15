<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable = [
        'category_id', 'product_id'
    ];
}
