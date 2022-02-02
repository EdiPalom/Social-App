<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaData extends Model
{
    use HasFactory;

    protected $fillable=[
        'post_id',
        'media_types_id',
        'url',
        'description'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function media_types()
    {
        return $this->hasOne(MediaType::class);
    }
}
