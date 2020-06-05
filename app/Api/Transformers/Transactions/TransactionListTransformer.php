<?php

namespace App\Api\Transformers\Transactions;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;

class TransactionListTransformer extends TransformerAbstract
{
    public function transform($transaction)
    {
        return [
            'id' => object_get($transaction, 'id', 0),
            'user_id' => object_get($transaction, 'user_id', 0),
            'fullname' => object_get($transaction, 'user.fullname', ''),
            'round' => object_get($transaction, 'round_id', null),
            'amount'    => object_get($transaction, 'amount', null),
            'ref_id'    => object_get($transaction, 'ref_id', null),
            'ip'    => object_get($transaction, 'ip', ''),
            'action'    => object_get($transaction, 'action', null),
            'sync'    => object_get($transaction, 'sync', null),
            'created_at'      => object_get($transaction, 'created_at', null),
            'updated_at'       => object_get($transaction, 'updated_at', null),
        ];
    }
}
