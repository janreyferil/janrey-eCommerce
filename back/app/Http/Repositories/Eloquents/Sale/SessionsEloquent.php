<?php

namespace App\Http\Repositories\Eloquents\Sale;

use App\Http\Repositories\Interfaces\Sale\SessionsInterface;

use Illuminate\Database\Eloquent\Model;

class SessionsEloquent implements SessionsInterface {

     // model property on class instances
    protected $model;

     // Constructor to bind model to repo
    public function __construct(Model $model)
     {
         $this->model = $model;
     }

    public function all() {
         $sessions = $this->model->all();

         return $sessions;
     }

    public function single($id) {
         $session = $this->model->find($id);

         return $session;
     }

    public function add(array $data) {
        $session = $this->model->create($data);

        return $session;
     }

    public function change(array $data,$id) {
        $session = $this->model->find($id);

        $session->update($data);

        return $session;
    }

    public function delete($id) {
        $session = $this->model->find($id);

        $session->delete();
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