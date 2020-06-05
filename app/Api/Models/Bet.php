<?php

namespace App\Api\Models;

use App\Api\Models\BaseModel;

class Bet extends BaseModel
{
    protected $table = 'bets';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'round_id', 'amount', 'rate', 'dir', 'card'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function round()
    {
        return $this->belongsTo('App\Api\Models\Round');
    }
}