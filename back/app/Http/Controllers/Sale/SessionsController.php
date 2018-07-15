<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Sale\SessionsEloquent;

use App\Model\Sale\Session;

class SessionsController extends Controller
{
    private $session;

    public function __construct(Session $session) {
         $this->session = new SessionsEloquent($session);
    }
  
    public function index() {
        return $this->session->all();
    }

    public function store(Request $request) {
        $session = $this->session->add($request->only($this->session->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $session
        ],201);
    }

    public function show($id) {
        return $this->session->single($id);
    }

    public function update(Request $request, $id) {
        $session = $this->session->change($request->only($this->session->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $session
        ],200);
    }

    public function destroy($id) {
        $this->session->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
