<?php

namespace App\Http\Repositories\Eloquents\Product;

use App\Http\Repositories\Interfaces\Product\CategoryProductsInterface;

use Illuminate\Database\Eloquent\Model;

class CategoryProductsEloquent implements CategoryProductsInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {
         $category_products = $this->model->all();

         return $category_products;
     }

     public function single($id) {
         $category_product = $this->model->find($id);

         return $category_product;
     }

     public function add(array $data) {
        $category_product = $this->model->create($data);

        return $category_product;
     }

     public function change(array $data,$id) {
        $category_product = $this->model->find($id);

        $category_product->update($data);

        return $category_product;
     }

     public function delete($id) {
        $category_product = $this->model->find($id);

        $category_product->delete();
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