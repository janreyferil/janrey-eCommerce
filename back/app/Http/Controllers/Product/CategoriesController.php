<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\CategoriesEloquent;

use App\Model\Product\Category;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category) {
         $this->category = new CategoriesEloquent($category);
    }
  
    public function index() {
        return $this->category->all();
    }

    public function store(Request $request) {
        $category = $this->category->add($request->only($this->category->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $category
        ],201);
    }

    public function show($id) {
        return $this->category->single($id);
    }

    public function update(Request $request, $id) {
        $category = $this->category->change($request->only($this->category->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $category
        ],200);
    }

    public function destroy($id) {
        $this->category->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
