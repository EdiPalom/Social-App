<?php

use Illuminate\Support\Facades\Auth;
use App\Models\{Like,User};

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

if(!function_exists('access_token')){
    function access_token():string
    {
        return Auth::user()->createToken('jwstoken')->plainTextToken;
    }
}

if(!function_exists('check_user_like')){
    function check_user_like($post_id):bool
    {
        $user = User::find(Auth::user()->id);
                
        $like_count = $user->likes()
                           ->where('post_id',$post_id)->get()->count();

        return ($like_count > 0)?true:false;
        // return $like_count;
    }
}

if(!function_exists('get_avatar')){
    function get_avatar($email):string
    {
        $email = md5($email);
        return "https://s.gravatar.com/avatar/$email";
    }
}


