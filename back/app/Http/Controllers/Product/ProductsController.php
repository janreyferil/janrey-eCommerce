<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\ProductsEloquent;

use App\Model\Product\Product;

class ProductsController extends Controller
{
    private $product;
 
    public function __construct(Product $product) {
         $this->product = new ProductsEloquent($product);
    }
  
    public function index() {
        return $this->product->all();
    }

    public function store(Request $request) {
        $product = $this->product->add($request->only($this->product->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $product
        ],201);
    }

    public function show($id) {
        return $this->product->single($id);
    }

    public function update(Request $request, $id) {
        $product = $this->product->change($request->only($this->product->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $product
        ],200);
    }

    public function destroy($id) {
        $this->product->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
