<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Sale\CouponsEloquent;

use App\Model\Sale\Coupon;

class CouponsController extends Controller
{
    private $coupon;

    public function __construct(Coupon $coupon) {
         $this->coupon = new CouponsEloquent($coupon);
    }
  
    public function index() {
        return $this->coupon->all();
    }

    public function store(Request $request) {
        $coupon = $this->coupon->add($request->only($this->coupon->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $coupon
        ],201);
    }

    public function show($id) {
        return $this->coupon->single($id);
    }

    public function update(Request $request, $id) {
        $coupon = $this->coupon->change($request->only($this->coupon->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $coupon
        ],200);
    }

    public function destroy($id) {
        $this->coupon->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
