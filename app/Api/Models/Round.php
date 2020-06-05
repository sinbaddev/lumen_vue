<?php

namespace App\Api\Models;

use App\Api\Models\BaseModel;

class Round extends BaseModel
{
    protected $table = 'rounds';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount', 'amount_win', 'bet_at', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\Api\Models\User');
    }

    public function bets()
    {
        return $this->hasMany('App\Api\Models\Bet');
    }
}