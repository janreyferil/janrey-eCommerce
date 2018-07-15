<?php

namespace App\Http\Repositories\Eloquents\Product;

use App\Http\Repositories\Interfaces\Product\ProductStatusesInterface;

use Illuminate\Database\Eloquent\Model;

class ProductStatusesEloquent implements ProductStatusesInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {
         $product_status = $this->model->all();

         return $product_status;
     }

     public function single($id) {
         $product_status = $this->model->find($id);

         return $product_status;
     }

     public function add(array $data) {
        $product_status = $this->model->create($data);

        return $product_status;
     }

     public function change(array $data,$id) {
        $product_status = $this->model->find($id);

        $product_status->update($data);

        return $product_status;
     }

     public function delete($id) {
        $product_status = $this->model->find($id);

        $product_status->delete();
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