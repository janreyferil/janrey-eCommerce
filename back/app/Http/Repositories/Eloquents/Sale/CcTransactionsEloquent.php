<?php

namespace App\Http\Repositories\Eloquents\Sale;

use App\Http\Repositories\Interfaces\Sale\CcTransactionsInterface;

use Illuminate\Database\Eloquent\Model;

class CcTransactionsEloquent implements CcTransactionsInterface {

     // model property on class instances
    protected $model;

     // Constructor to bind model to repo
    public function __construct(Model $model)
     {
         $this->model = $model;
     }

    public function all() {
         $cc_transactions = $this->model->all();

         return $cc_transactions;
     }

    public function single($id) {
         $cc_transaction = $this->model->find($id);

         return $cc_transaction;
     }

    public function add(array $data) {
        $cc_transaction = $this->model->create($data);

        return $cc_transaction;
     }

    public function change(array $data,$id) {
        $cc_transaction = $this->model->find($id);

        $cc_transaction->update($data);

        return $cc_transaction;
    }

    public function delete($id) {
        $cc_transaction = $this->model->find($id);

        $cc_transaction->delete();
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