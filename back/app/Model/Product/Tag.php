<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
