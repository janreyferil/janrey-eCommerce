<?php

namespace App\Http\Repositories\Eloquents\Sale;

use App\Http\Repositories\Interfaces\Sale\SalesOrdersInterface;

use Illuminate\Database\Eloquent\Model;

class SalesOrdersEloquent implements SalesOrdersInterface {

     // model property on class instances
    protected $model;

     // Constructor to bind model to repo
    public function __construct(Model $model)
     {
         $this->model = $model;
     }

    public function all() {
         $sales_orders = $this->model->all();

         return $sales_orders;
     }

    public function single($id) {
         $sale_order = $this->model->find($id);

         return $sale_order;
     }

    public function add(array $data) {
        $sale_order = $this->model->create($data);

        return $sale_order;
     }

    public function change(array $data,$id) {
        $sale_order = $this->model->find($id);

        $sale_order->update($data);

        return $sale_order;
    }

    public function delete($id) {
        $sale_order = $this->model->find($id);

        $sale_order->delete();
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