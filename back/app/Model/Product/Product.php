<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
       'sku', 'name', 'description','product_status_id', 
       'regular_price', 'discount_price', 'quantity','taxable'
    ];

    public function category() {
        return $this->belongsToMany(Category::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }
}
