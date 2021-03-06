<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'media_data_id',
        'post_id',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function mediaData()
    {
        return $this->belongsTo(MediaData::class);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = sanitize_string($value);
    }

}
