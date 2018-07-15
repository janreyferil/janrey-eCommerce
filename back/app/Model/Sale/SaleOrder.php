<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

use App\Model\User\User;

class SaleOrder extends Model
{
    protected $table = "sales_orders";

    protected $fillable = [
        'order_date', 'total', 'coupon_id', 'session_id', 'user_id'
    ];

    public function sessions() {
        return $this->hasMany(Session::class);
    }
    
    public function coupons() {
        return $this->hasMany(Coupon::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
