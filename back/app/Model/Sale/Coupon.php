<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'code', 'description', 'value' , 'start_date' , 'end_date'
    ];

    public function sale_order() {
        return $this->belongsTo(SaleOrder::class);
    }
}
