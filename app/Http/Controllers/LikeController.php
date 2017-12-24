<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $this->validate(request(), [
            'like_value' => 'required'
        ]);
         
        // ? $post->author != auth()->id()
         
        //dd(request());
        
        // $attributes = [
        //     'user_id' => auth()->id(),
        //     'post_id' => $post->id
        // ];
        
        // if (!$post->likes()->where($attributes)->exists()) {
        //     $post->likes()->create($attributes);
        // }

        $post->addLike(request('like_value'));

        return back();
    }
}
