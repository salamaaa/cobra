<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Post $post){
        $post->like(auth()->user());
        return back();
    }

    public function dislike(Post $post){
        $post->dislike(auth()->user());
        return back();
    }
}
