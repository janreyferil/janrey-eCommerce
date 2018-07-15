<?php

namespace App\Http\Repositories\Eloquents\Product;

use App\Http\Repositories\Interfaces\Product\TagsInterface;

use Illuminate\Database\Eloquent\Model;

class TagsEloquent implements TagsInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {
         $tags = $this->model->all();

         return $tags;
     }

     public function single($id) {
         $tag = $this->model->find($id);

         return $tag;
     }

     public function add(array $data) {
        $tag = $this->model->create($data);

        return $tag;
     }

     public function change(array $data,$id) {
        $tag = $this->model->find($id);

        $tag->update($data);

        return $tag;
     }

     public function delete($id) {
        $tag = $this->model->find($id);

        $tag->delete();
     }
 
    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    public function with($relations) {
        return $this->model->with($relations);
    }

}