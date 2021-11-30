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
        $posts = Post::with(['user'])->latest()->paginate(20);

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

    public function destroy(Request $request, Post $post)
    {
        if(!$post->ownsPost($request->user()))
        {
            return response(null, 422);
        }
        $post->delete();
        return back();
    }
}
