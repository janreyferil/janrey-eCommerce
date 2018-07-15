<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\User\RoleUserEloquent;

use App\Model\User\Role;

use App\Model\User\User;

use App\Model\User\RoleUser;

class RoleUserController extends Controller
{
    private $role_user;

    private $user;

    private $role;

    public function __construct(User $user, Role $role,RoleUser $role_user) {
         $this->role_user = new RoleUserEloquent($role_user);
         $this->role = new RoleUserEloquent($role);
         $this->user = new RoleUserEloquent($user);
    }
  
    public function index(Request $request) {
        if($request->option === 'user') 
            return $this->user->all();
        else if($request->option === 'role') 
            return $this->role->all();
        else
            return response()->json([
                'empty' => true
            ],200);
    }

    public function store(Request $request) {
        $role_user = $this->role_user->add($request->only($this->role_user->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $this->show($role_user->user_id)
        ],201);
    }

    public function show($id) {
        return $this->role_user->single($id);
    }

    public function update(Request $request, $id) {
        $role_user = $this->role_user->change($request->only($this->role_user->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $this->show($role_user->user_id)
        ],200);
    }

    public function destroy($id) {
        $this->role_user->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
