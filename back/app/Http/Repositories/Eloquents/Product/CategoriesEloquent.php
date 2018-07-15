<?php

namespace App\Http\Repositories\Eloquents\Product;

use App\Http\Repositories\Interfaces\Product\CategoriesInterface;

use Illuminate\Database\Eloquent\Model;

class CategoriesEloquent implements CategoriesInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {
         $categories = $this->model->all();

         return $categories;
     }

     public function single($id) {
         $category = $this->model->find($id);

         return $category;
     }

     public function add(array $data) {
        $category = $this->model->create($data);

        return $category;
     }

     public function change(array $data,$id) {
        $category = $this->model->find($id);

        $category->update($data);

        return $category;
     }

     public function delete($id) {
        $category = $this->model->find($id);

        $category->delete();
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