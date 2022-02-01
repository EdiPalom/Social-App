<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
// use App\Helpers\Likes;
use App\Models\{Like,Post};
use Illuminate\Http\Request;

use App\Http\Resources\LikeResource;

class LikeController extends Controller
{
    protected $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }
    
    public function post_likes(Post $post)
    {
        // $likes_count = new LikeResource($this->like);
        // $likes_count = Like::where('post_id',$post->id)->get()->count();
        $likes_count = $this->like->where('post_id',$post->id)->get()->count();
        $likes = [
            'likes'=>$likes_count
        ];

        return response()->json($likes);
    }
}
