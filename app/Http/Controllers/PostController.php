<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('post.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:200'
        ]);

        $request->user()->posts()->create([
            'body' => $request->get('body')
        ]);

        return back();
    }
}
