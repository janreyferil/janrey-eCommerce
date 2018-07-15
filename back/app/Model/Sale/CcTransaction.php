<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;

class CcTransaction extends Model
{
    protected $table = 'cc_transactions';

    protected $fillable = [
        'code', 'order_id', 'transdate', 'processor', 
        'processor_trans_id', 'amount', 'cc_num',
        'cc_type', 'response'
    ];
}
