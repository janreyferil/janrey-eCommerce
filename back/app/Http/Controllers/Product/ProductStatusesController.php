<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\ProductStatusesEloquent;

use App\Model\Product\ProductStatus;

class ProductStatusesController extends Controller
{
    private $product_status;

    public function __construct(ProductStatus $product_status) {
         $this->product_status = new ProductStatusesEloquent($product_status);
    }
  
    public function index() {
        return $this->product_status->all();
    }

    public function store(Request $request) {
        $product_status = $this->product_status->add($request->only($this->product_status->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $product_status
        ],201);
    }

    public function show($id) {
        return $this->product_status->single($id);
    }

    public function update(Request $request, $id) {
        $product_status = $this->product_status->change($request->only($this->product_status->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $product_status
        ],200);
    }

    public function destroy($id) {
        $this->product_status->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
