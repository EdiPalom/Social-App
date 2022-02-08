<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaData extends Model
{
    use HasFactory;

    protected $fillable=[
        'post_id',
        'media_type_id',
        'url',
        'description'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function mediaType()
    {
        // return $this->hasOne(MediaType::class);
        return $this->belongsTo(MediaType::class);
    }

    public function getGetUrlAttribute()
    {
        return url("$this->url");
    }
}
