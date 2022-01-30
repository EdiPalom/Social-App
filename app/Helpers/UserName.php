<?php

namespace App\Helpers;

class UserName
{
    public static function validate(string $value):bool
    {
        $name = sanitize_string($value);

        return $result = (bool)filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]{4,20}[0-9_]{0,5}$/")));
       
    }
}
