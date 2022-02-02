<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'iframe'
    ];

    public function setTitleAttribute($value)
    {
        $title  = (!is_null($value)) ? sanitize_string($value) : null;
        $this->attributes['title'] = strtolower($title);
    }

    public function getGetTitleAttribute()
    {
        return ucfirst($this->title);
    }

    public function setBodyAttribute($value)
    {
        $body = (!is_null($value)) ? sanitize_string($value) : null;
        $this->attributes['body'] = $body;
    }

    public function setIframeAttribute($value)
    {
        $iframe = (!is_null($value)) ? sanitize_iframe($value) : null;
        $this->attributes['iframe'] = $iframe;
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class,'foreign_key'); 
    // }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Post::class);
    }
}
