<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function posts()
    {
        $posts = Post::all();
        return view('pages.articles.articles', compact('posts'));
    }
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view('pages.articles.show', compact('post'));
    }
}
