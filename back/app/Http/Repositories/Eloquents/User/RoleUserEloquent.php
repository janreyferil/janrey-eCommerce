<?php

namespace App\Http\Repositories\Eloquents\User;

use App\Http\Repositories\Interfaces\User\RoleUserInterface;

use Illuminate\Database\Eloquent\Model;

class RoleUserEloquent implements RoleUserInterface {

     // model property on class instances
     protected $model;

     // Constructor to bind model to repo
     public function __construct(Model $model)
     {
         $this->model = $model;
     }

     public function all() {

        $role_users = $this->model->all();
    
        return $role_users;
     }

     public function single($id) {
         $role_user = $this->model->where('user_id',$id)->get();

         return $role_user;
     }

     public function add(array $data) {
        $role_user = $this->model->create($data);

        return $role_user;
     }

     public function change(array $data,$id) {
        $role_user = $this->model->where('user_id',$id)->get();

        $role_user->update($data);

        return $role_user;
     }

     public function delete($id) {
        $role_user = $this->model->where('user_id',$id)->get();

        $role_user->delete();
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