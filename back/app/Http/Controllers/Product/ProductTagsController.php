<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\ProductTagsEloquent;

use App\Model\Product\ProductTag;

use App\Model\Product\Product;

class ProductTagsController extends Controller
{
    private  $tag_product;

    public function __construct(ProductTag $tag_product,Product $product) {
         $this->tag_product = new ProductTagsEloquent($tag_product);
         $this->product = new ProductTagsEloquent($product);
    }
  
    public function index() {
        $products = $this->product->all();
       
        foreach($products as $product) {
            return response()->json([
              'data' => $product->tag
            ],200);
        }
    }

    public function store(Request $request) {
         $tag_product = $this->tag_product->add($request->only($this->tag_product->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $tag_product
        ],201);
    }

    public function show($id) {
        return $this->tag_product->single($id);
    }

    public function update(Request $request, $id) {
         $tag_product = $this->tag_product->change($request->only($this->tag_product->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' =>  $tag_product
        ],200);
    }

    public function destroy($id) {
        $this->tag_product->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
