<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Helpers\Likes;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'post_name'=>$this->title,
            'content'=>$this->body,
            'iframe'=>$this->iframe,
            'images'=>$this->images,
            'likes'=>$this->likes->count(),
            'user_like'=> check_user_like($this->id),
            'author' =>[
                'username'=>$this->user->username,
                'picture'=>$this->user->profile
            ],
        ];
    }
}
