<?php

namespace App\Api\Models;

use App\Api\Models\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id', 'uid', 'brand', 'fullname'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}