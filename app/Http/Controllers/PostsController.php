<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function posts()
    {
        $posts = Post::latest()->paginate(9);
        return view('pages.articles.articles', compact('posts'));
    }
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view('pages.articles.show', compact('post'));
    }
    public function create()
    {
        return view('pages.articles.create');
    }

    public function store(Request $request)
    {
        $postData = $request->validate(['title' => 'required|min:3|max:150', 'content' => 'required|min:5']);
        if ($postData) {
            Post::create($postData);
            return redirect()->route('app_posts')->with('success', "Votre article a été ajouter");
        }
    }

    public function update(int $id)
    {
        $post = Post::findOrfail($id);
        return view('pages.articles.update');
    }
    public function store_update(int $id, Request $request)
    {

        $postData = $request->validate(['title' => 'required|min:3|max:150', 'content' => 'required|min:5']);
    }
}
