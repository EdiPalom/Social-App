<?php

namespace App\Helpers;

class Password
{
    public static function validate(string $value):bool
    {
        $password = sanitize_string($value);

        return $result = (bool)filter_var($password,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/")));
    }
}
