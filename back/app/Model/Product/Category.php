<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id'
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
