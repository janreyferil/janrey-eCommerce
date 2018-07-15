<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Product\TagsEloquent;

use App\Model\Product\Tag;

class TagsController extends Controller
{
    private $tag;

    public function __construct(Tag $tag) {
         $this->tag = new TagsEloquent($tag);
    }
  
    public function index() {
        return $this->tag->all();
    }

    public function store(Request $request) {
        $tag = $this->tag->add($request->only($this->tag->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $tag
        ],201);
    }

    public function show($id) {
        return $this->tag->single($id);
    }

    public function update(Request $request, $id) {
        $tag = $this->tag->change($request->only($this->tag->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $tag
        ],200);
    }

    public function destroy($id) {
        $this->tag->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
