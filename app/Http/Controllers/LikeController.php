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
        $post->addLike(request('like_value'));
        return back();
    }
}
