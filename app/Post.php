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
    
    public function likes()
    {
    	return $this->hasMany(Like::class);
    }

    public function addLike($like)
    {
    	// TODO: like from another user => Test User
    	if ($this->author->id == auth()->id()) {
            //dd('You can not like/unlike your post!');
    		return;
    	}

    	$primaryKey = [
    		'user_id' => auth()->id(),
    		'post_id' => $this->id
    	];
        $likeValue = [
            'like_value' => $like
        ];

        if (! $this->likes()->where($primaryKey)->exists()) {
            $this->likes()->create($primaryKey + $likeValue);
        } else {
            $this->likes()->where($primaryKey)->update($likeValue);
        }
    }

    public function getLike($user_id)
    {
        $likeObject = $this->likes()->where('user_id', $user_id)->get()->first();
        return isset($likeObject) ? $likeObject->like_value : $likeObject;
    }

    public function showLike($user_id)
    {
        $like = $this->getLike($user_id);
        $res = isset($like) ? (! $like) : true;
        return $res;
    }

    public function showUnlike($user_id)
    {
        $like = $this->getLike($user_id);
        $res = isset($like) ? $like : true;
        return $res;
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->where('like_value', 1)->count();
    }

    public function getUnlikesCountAttribute()
    {
        return $this->likes()->where('like_value', 0)->count();
    }
}
