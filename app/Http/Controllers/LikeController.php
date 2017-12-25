<?php

namespace App\Http\Controllers;

use App\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $post->addLike(request('like_value'));
        $html = view('posts.buttons', compact('post'))->render();
        return response()->json($html);
    }
}
