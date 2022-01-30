<?php

if(! function_exists('validate_email')){
    function validate_email($email)
    {
        return App\Helpers\Email::validate($email);
    }
}

if(! function_exists('validate_name')){
    function validate_name($name)
    {
        return App\Helpers\Name::validate($name);
    }
}

if(! function_exists('validate_phone')){
    function validate_phone($phone)
    {
        return App\Helpers\Phone::validate($phone);
    }
}

if(! function_exists('validate_password')){
    function validate_password($password)
    {
        return App\Helpers\Password::validate($password);
    }
}

if(! function_exists('validate_url')){
    function validate_url($url)
    {
        return App\Helpers\Url::validate($url);
    }
}

if(! function_exists('sanitize_string')){
    function sanitize_string($string)
    {
        return App\Helpers\Sanitize::string($string);
    }
}

if(! function_exists('sanitize_url')){
    function sanitize_url($string)
    {
        return App\Helpers\Sanitize::url($string);
    }
}

if(! function_exists('sanitize_iframe')){
    function sanitize_iframe($string)
    {
        return App\Helpers\Sanitize::iframe($string);
    }
}