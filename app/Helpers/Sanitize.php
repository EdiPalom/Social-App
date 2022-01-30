<?php

namespace App\Helpers;

class Sanitize
{
    public static function string(string $string):string
    {
        $string = filter_var(trim($string),FILTER_SANITIZE_STRING);
        return $string;
    }

    public static function url(string $string):string
    {
        $string = filter_var(trim($string),FILTER_SANITIZE_URL);
        return $string;
    }

    public static function iframe(string $string):string
    {
        $string = strip_tags(trim($string),'<iframe>');
        return $string;
    }
}
