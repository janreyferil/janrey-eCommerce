<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Sale\OrderProductsEloquent;

use App\Model\Sale\OrderProduct;

class OrderProductsController extends Controller
{
    private $order_product;

    public function __construct(OrderProduct $order_product) {
         $this->order_product = new OrderProductsEloquent($order_product);
    }
  
    public function index() {
        return $this->order_product->all();
    }

    public function store(Request $request) {
        $order_product = $this->order_product->add($request->only($this->order_product->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $order_product
        ],201);
    }

    public function show($id) {
        return $this->order_product->single($id);
    }

    public function update(Request $request, $id) {
        $order_product = $this->order_product->change($request->only($this->order_product->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $order_product
        ],200);
    }

    public function destroy($id) {
        $this->order_product->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
