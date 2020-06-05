<?php

namespace App\Api\Transformers\Jackpots;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\DB;

class JackpotDetailTransformer extends TransformerAbstract
{
    public function transform($jackpot)
    {
        return [
            'id' => object_get($jackpot, 'id', null),
            'round' => object_get($jackpot, 'round_id', null),
            'bet_amount'    => object_get($jackpot, 'bet_amount', null),
            'amount'    => object_get($jackpot, 'amount', null),
            'created_at'      => object_get($jackpot, 'created_at', null),
            'updated_at'       => object_get($jackpot, 'updated_at', null),
        ];
    }
}
