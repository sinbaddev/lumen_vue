<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /**
     * Get table name.
     *  //show all data in table
     *
     * @return string
     */
    public static function getTableName()
    {
        return (new static)->getTable();
    }

    public static function getPriKeyName()
    {
        return (new static)->getKeyName();
    }

    public static function getColumnName($column)
    {
        return self::getTableName() . '.' . $column;
    }
}