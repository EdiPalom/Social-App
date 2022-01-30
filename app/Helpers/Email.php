<?php

namespace App\Helpers;

class Email
{
    public static function validate(string $email):bool
    {
        $email = filter_var(trim($email),FILTER_SANITIZE_EMAIL);
        return $result = (bool) filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}
