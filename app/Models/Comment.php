<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_multimedia',
        'id_post',
        'content',
    ];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = sanitize_string($value);
    }

}
