<?php

namespace App\Api\Transformers\Bets;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;

class BetDetailTransformer extends TransformerAbstract
{
    public function transform($bet)
    {
        return [
            'id' => object_get($bet, 'id', null),
            'round' => object_get($bet, 'round_id', null),
            'amount'    => object_get($bet, 'amount', null),
            'rate'    => object_get($bet, 'rate', null),
            'dir'    => object_get($bet, 'dir', null),
            'card'    => object_get($bet, 'card', null),
            'created_at'      => object_get($bet, 'created_at', null),
            'updated_at'       => object_get($bet, 'updated_at', null),
        ];
    }
}
