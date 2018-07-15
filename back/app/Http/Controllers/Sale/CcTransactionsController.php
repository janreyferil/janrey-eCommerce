<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Repositories\Eloquents\Sale\CcTransactionsEloquent;

use App\Model\Sale\CcTransaction;

class CcTransactionsController extends Controller
{
    private $cc_transaction;

    public function __construct(CcTransaction $cc_transaction) {
         $this->cc_transaction = new CcTransactionsEloquent($cc_transaction);
    }
  
    public function index() {
        return $this->cc_transaction->all();
    }

    public function store(Request $request) {
        $cc_transaction = $this->cc_transaction->add($request->only($this->cc_transaction->getModel()->fillable));

        return response()->json([
            'success' => true,
            'data' => $cc_transaction
        ],201);
    }

    public function show($id) {
        return $this->cc_transaction->single($id);
    }

    public function update(Request $request, $id) {
        $cc_transaction = $this->cc_transaction->change($request->only($this->cc_transaction->getModel()->fillable), $id);

        return response()->json([
            'success' => true,
            'data' => $cc_transaction
        ],200);
    }

    public function destroy($id) {
        $this->cc_transaction->delete($id);

        return response()->json([
            'success' => true
        ],200);
    }
}
