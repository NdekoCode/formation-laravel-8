<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['posts', 'show']);
    }
    public function posts()
    {
        // ON retourne les derniers post et on ajoute la pagination
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
        // |unique:posts, cela veut dire que on ne veut pas avoir deux fois le meme titre dans ma table posts
        $postData = $request->validate(['title' => 'required|min:3|max:150|unique:posts', 'image' => 'required|image', 'content' => 'required|min:5|unique:posts']);
        if ($postData) {
            $post = Post::create($postData);
            // $path =  Storage::disk('public')->put('avatars', $request->image);
            $filename = date('d-m-Y-H-i-s') . '.' . $request->image->extension();
            $path = $request->image->storeAs('avatars', $filename, 'public');
            $image = new Image();
            $image->path = $path;
            $post->image()->save($image);
            return redirect()->route('app_posts')->with('success', "Votre article a été ajouter");
        }
    }

    public function update(int $id)
    {
        $post = Post::findOrfail($id);
        return view('pages.articles.update', compact('post'));
    }
    public function store_update(Request $request, int $id)
    {

        $postData = $request->validate(['title' => 'required|min:3|max:150', 'content' => 'required|min:5', 'image' => 'image|image']);
        if ($postData) {


            $post = Post::findOrfail($id);
            if (!empty($postData['image'])) {
                // Update One to One relationship
                $filename = date('Y-m-d-H-i-s') . '.' . $request->image->extension();
                $path = $request->image->storeAs('posts', $filename, 'public');
                $post->image->update(['path' => $path]);
            }
            $post->update($postData);

            return redirect()->route('app_postshow', $post->id)->with('success', "Votre article a été modifier avec succes");
        }
        return back()->withInput();
    }

    public function delete(int $id)
    {
        $post = Post::findOrfail($id);
        $post->delete();
        return redirect()->route('app_posts')->with('error', "Votre article a été supprimer avec succés");
    }

    public function register()
    {
        $post = Post::find(11);
        $vidoe = Video::find(1);
        $comment1 = new Comment(['content' => 'Mon premier commentaire']);
        $comment2 = new Comment(['content' => 'Mon second commentaire']);
        $comment3 = new Comment(['content' => 'Mon troisieme commentaire']);

        $post->comments()->saveMany([
            $comment1, $comment2
        ]);
        $vidoe->comments()->save($comment3);

        return 'LOl';
    }
}
