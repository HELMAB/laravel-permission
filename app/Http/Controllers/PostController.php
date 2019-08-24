<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        if (isset($request->id)) {
            $post = Post::findOrFail($request->id);
            $post->update($request->except(['_token']));
        } else {
            Post::create($request->except(['_token']));
        }
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'published_at' => Carbon::now()
        ]);
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
