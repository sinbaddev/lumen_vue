<?php

namespace App\Api\Models;

use App\Api\Models\BaseModel;

class Jackpot extends BaseModel
{
    protected $table = 'jackpots';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'round_id', 'bet_amount', 'amount'
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

    public function user()
    {
        return $this->belongsTo('App\Api\Models\Users');
    }
}