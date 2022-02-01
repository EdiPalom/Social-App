<?php

namespace App\Helpers;

use App\Models\{Like,Post};

class Likes{
    public static function get_post_count(Post $post):int
    {
        $likes = Like::where('post_id',$post->id)->get()->count();
        return $likes;
    }
}
