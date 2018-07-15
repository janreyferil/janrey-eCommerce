<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'data'
    ];

    public function sale_order() {
        return $this->belongsTo(SaleOrder::class);
    }

}
