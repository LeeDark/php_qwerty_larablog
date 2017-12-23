<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/posts/{$this->id}";
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
