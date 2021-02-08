<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = auth()->user()->timeline();
        return view('dashboard',['posts'=>$posts]);
    }

    public function store(Request $r){
        $this->validate($r,[
            'body'=>['required','max:255']
        ]);

        Post::create([
            'user_id'=>Auth::id(),
            'body'=>$r->body
        ]);

        return redirect()->back();
    }
}
