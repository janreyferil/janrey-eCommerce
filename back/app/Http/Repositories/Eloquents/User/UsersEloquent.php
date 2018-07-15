<?php

namespace App\Http\Repositories\Eloquents\User;

use App\Http\Repositories\Interfaces\User\UsersInterface;


use Illuminate\Database\Eloquent\Model;

class UsersEloquent implements UsersInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }


     public function all() {
         $users = $this->model->all();

         return $users;
     }

     public function single($id) {
         $user = $this->model->find($id);

         return $user;
     }

     public function add(array $data) {
        $user = $this->model->create($data);

        return $user;
     }

     public function change(array $data,$id) {
        $user = $this->model->find($id);

        $user->update($data);

        return $user;
     }

     public function delete($id) {
        $user = $this->model->find($id);

        $user->delete();
     }

     public function getModel()
     {
         return $this->model;
     }
 
     public function setModel($model)
     {
         $this->model = $model;
         return $this;
     }

     public function with($relations)
     {
         return $this->model->with($relations);
     }
}