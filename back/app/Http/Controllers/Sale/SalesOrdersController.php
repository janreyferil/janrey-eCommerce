<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Sale\SalesOrdersEloquent;

use App\Model\Sale\SaleOrder;

class SalesOrdersController extends Controller
{
    private $sale_order;

    public function __construct(SaleOrder $sale_order) {
         $this->sale_order = new SalesOrdersEloquent($sale_order);
    }
  
    public function index() {
        return $this->sale_order->all();
    }

    public function store(Request $request) {
        $sale_order = $this->sale_order->add($request->only($this->sale_order->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $sale_order
        ],201);
    }

    public function show($id) {
        return $this->sale_order->single($id);
    }

    public function update(Request $request, $id) {
        $sale_order = $this->sale_order->change($request->only($this->sale_order->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $sale_order
        ],200);
    }

    public function destroy($id) {
        $this->sale_order->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
