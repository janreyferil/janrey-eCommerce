<?php

namespace App\Http\Repositories\Eloquents\Sale;

use App\Http\Repositories\Interfaces\Sale\OrderProductsInterface;

use Illuminate\Database\Eloquent\Model;

class OrderProductsEloquent implements OrderProductsInterface {

     // model property on class instances
    protected $model;

     // Constructor to bind model to repo
    public function __construct(Model $model)
     {
         $this->model = $model;
     }

    public function all() {
         $order_products = $this->model->all();

         return $order_products;
     }

    public function single($id) {
         $order_product = $this->model->find($id);

         return $order_product;
     }

    public function add(array $data) {
        $order_product = $this->model->create($data);

        return $order_product;
     }

    public function change(array $data,$id) {
        $order_product = $this->model->find($id);

        $order_product->update($data);

        return $order_product;
    }

    public function delete($id) {
        $order_product = $this->model->find($id);

        $order_product->delete();
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