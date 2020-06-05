<?php

namespace App\Api\Transformers\Rounds;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;

class RoundListTransformer extends TransformerAbstract
{
    public function transform($round)
    {
        return [
            'id' => object_get($round, 'id', null),
            'bets' => object_get($round, 'bets', null),
            'user_id' => object_get($round, 'user_id', null),
            'fullname' => object_get($round, 'user.fullname', null),
            'amount'    => object_get($round, 'amount', null),
            'amount_win'    => object_get($round, 'amount_win', null),
            'bet_at'    => object_get($round, 'bet_at', null),
            'status'    => object_get($round, 'status', null),
            'created_at'      => object_get($round, 'created_at', null),
            'updated_at'       => object_get($round, 'updated_at', null),
        ];
    }
}
