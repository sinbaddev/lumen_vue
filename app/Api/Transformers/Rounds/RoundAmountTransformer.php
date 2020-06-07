<?php

namespace App\Api\Transformers\Rounds;

use League\Fractal\TransformerAbstract;

class RoundAmountTransformer extends TransformerAbstract
{
    public function transform($round)
    {
        $total_amount = object_get($round, 'total_amount', 0);
        $total_amount_win = object_get($round, 'total_amount_win', 0);
        return [
            'total_bet_amount' => number_format($total_amount, 0, ',', '.'),
            'total_bet_amount_win' => number_format($total_amount_win, 0, ',', '.'),
            'total_sub_amount' => number_format(($total_amount_win - $total_amount), 0, ',', '.')
        ];
    }
}
