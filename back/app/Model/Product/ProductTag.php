<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'tag_product';

    protected $fillable = [
        'tag_id', 'product_id'
    ];
}
