<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Repositories\Eloquents\User\UsersEloquent;

use App\Model\User\User;

class UsersController extends Controller
{

   private $user;

   public function __construct(User $user) {
        $this->user = new UsersEloquent($user);
   }

   public function index() {
       return $this->user->all();
   }

    public function store(Request $request) {
        $user = $this->user->add($request->only($this->user->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $user
        ],201);
    }

    public function show($id) {
        return $this->user->single($id);
    }

    public function update(Request $request, $id) {
        $user = $this->user->change($request->only($this->user->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $user
        ],200);
    }

    public function destroy($id) {
        $this->user->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }

}
