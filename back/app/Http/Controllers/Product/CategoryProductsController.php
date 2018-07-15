<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\CategoryProductsEloquent;

use App\Model\Product\CategoryProduct;

use App\Model\Product\Product;

class CategoryProductsController extends Controller
{
    private $category_product;

    private $product;

    public function __construct(CategoryProduct $category_product,Product $product) {
         $this->category_product = new CategoryProductsEloquent($category_product);
         $this->product = new CategoryProductsEloquent($product);
    }
  
    public function index() {
        $products = $this->product->all();
       
        foreach($products as $product) {
            return response()->json([
              'data' => $product->category
            ],200);
        }
                
    }

    public function store(Request $request) {
        $category_product = $this->category_product->add($request->only($this->category_product->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $category_product
        ],201);
    }

    public function show($id) {
        return $this->category_product->single($id);
    }

    public function update(Request $request, $id) {
        $category_product = $this->category_product->change($request->only($this->category_product->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $category_product
        ],200);
    }

    public function destroy($id) {
        $this->category_product->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
