<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        return Post::create($request->all());
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    public function destroy($id)
    {
        return Post::destroy($id);
    }

    public function search($text)
    {
        return Post::where('body', 'like', '%'.$text.'%')->get();
    }
}
