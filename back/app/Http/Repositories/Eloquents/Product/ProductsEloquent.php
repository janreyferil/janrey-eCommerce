<?php

namespace App\Http\Repositories\Eloquents\Product;

use App\Http\Repositories\Interfaces\Product\ProductsInterface;

use Illuminate\Database\Eloquent\Model;

class ProductsEloquent implements ProductsInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {
         $products = $this->model->all();

         return $products;
     }

     public function single($id) {
         $product = $this->model->find($id);

         return $product;
     }

     public function add(array $data) {
        $product = $this->model->create($data);

        return $product;
     }

     public function change(array $data,$id) {
        $product = $this->model->find($id);

        $product->update($data);

        return $product;
     }

     public function delete($id) {
        $product = $this->model->find($id);

        $product->delete();
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