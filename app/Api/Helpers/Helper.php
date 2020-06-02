<?php

namespace App\Api\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class Helper
{
    public static function getSlug($name)
    {
        $slug = Str::slug($name, '-');

        return $slug;
    }

    public static function addToArray($arr, $keyName, $value)
    {
        $arrayAfterChange = Arr::add($arr, $keyName, $value);

        return $arrayAfterChange;
    }

    public static function addSlugToInput($title, $keyName, $input)
    {
        $slug = self::getSlug($title);
        $input = self::addToArray($input, $keyName, $slug);

        return $input;
    }
}