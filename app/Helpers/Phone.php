<?php

namespace App\Helpers;

class Phone
{
    public static function validate(string $value):bool
    {
        $phone = sanitize_string($value);

        return $result = (bool)filter_var($phone,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[0-9]{7,10}$/")));
    }
}
