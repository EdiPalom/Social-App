<?php

namespace App\Helpers;

class Name
{
    public static function validate(string $value):bool
    {
        $name = sanitize_string($value);

        return $result = (bool)filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]+\s?[a-zA-Z]+$/")));
    }
}
