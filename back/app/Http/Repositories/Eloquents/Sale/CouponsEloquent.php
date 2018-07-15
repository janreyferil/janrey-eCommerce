<?php

namespace App\Http\Repositories\Eloquents\Sale;

use App\Http\Repositories\Interfaces\Sale\CouponsInterface;

use Illuminate\Database\Eloquent\Model;

class CouponsEloquent implements CouponsInterface {

     // model property on class instances
    protected $model;

     // Constructor to bind model to repo
    public function __construct(Model $model)
     {
         $this->model = $model;
     }

    public function all() {
         $coupons = $this->model->all();

         return $coupons;
     }

    public function single($id) {
         $coupon = $this->model->find($id);

         return $coupon;
     }

    public function add(array $data) {
        $coupon = $this->model->create($data);

        return $coupon;
     }

    public function change(array $data,$id) {
        $coupon = $this->model->find($id);

        $coupon->update($data);

        return $coupon;
    }

    public function delete($id) {
        $coupon = $this->model->find($id);

        $coupon->delete();
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