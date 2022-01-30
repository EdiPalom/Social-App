<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'title',
        'body',
        'iframe'
    ];

    public function setTitleAttribute($value)
    {
        $title = strip_tags($value);
        $this->attributes['title'] = strtolower(trim($title));
    }

    public function getGetTitleAttribute()
    {
        return ucfirst($this->title);
    }

    public function setBodyAttribute($value)
    {
        $body = strip_tags($value);
        $this->attributes['body'] = trim($body);
    }

    public function setIframeAttribute($value)
    {
        $iframe = strip_tags($value);
        $this->attributes['iframe'] = trim($iframe);
    }
}
