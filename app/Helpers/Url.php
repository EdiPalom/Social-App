<?php

namespace App\Helpers;

class Url
{
    public static function validate(string $value):bool
    {
        $value = sanitize_url($value);
        return $result = (bool)filter_var($value,FILTER_VALIDATE_URL);
    }
}
