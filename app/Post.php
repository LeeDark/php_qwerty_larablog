<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    private $checkArray = [
        'бублик', 
        'ревербератор',
        'кастет',
        'хорь',
        'алкоголь',
        'превысокомногорассмотрительствующий',
        'гражданин',
        'паста'
    ];

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
    	$primaryKey = [
    		'user_id' => auth()->id(),
    		'post_id' => $this->id
    	];

        $likeValue = [
            'like_value' => $like
        ];

        if (! $this->likes()->where($primaryKey)->exists()) {
            $this->likes()
                ->create($primaryKey + $likeValue);
        } else {
            $this->likes()->where($primaryKey)
                ->update($likeValue);
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
        return isset($like) ? (! $like) : true;
    }

    public function showUnlike($user_id)
    {
        $like = $this->getLike($user_id);
        return isset($like) ? $like : true;
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->where('like_value', 1)->count();
    }

    public function getUnlikesCountAttribute()
    {
        return $this->likes()->where('like_value', 0)->count();
    }

    public function prepareBody()
    {
        // FIX: we can store both arrays or we can store it in the DB...
        $body = $this->body;
        foreach ($this->checkArray as $value) {
            $len = mb_strlen($value);
            $body = str_replace(
                $value,
                mb_substr($value, 0, 1) . str_repeat('*', $len - 2) . mb_substr($value, $len - 1, 1),
                $body);
        }
        return $body;
    }
}
