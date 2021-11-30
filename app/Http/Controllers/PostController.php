<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //$posts = auth()->user()->posts; // to get posts from user

        //$posts = Post::orderBY('created_at', 'desc')->paginate(3);
        $posts = Post::latest()->paginate(3);

        //return view('post.index', compact('posts'));

        return view('post.index', [
                'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:200'
        ]);

        //dd($request);

        $request->user()->posts()->create([
            'body' => $request->get('body')
        ]);

        return back();
    }
}
