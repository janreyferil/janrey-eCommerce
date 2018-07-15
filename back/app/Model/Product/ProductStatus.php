<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $table = 'product_statuses';

    protected $fillable = [
        'name'
    ];
}
