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
}
