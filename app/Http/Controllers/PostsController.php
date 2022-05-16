<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function posts()
    {
        $posts = [

            [
                'title' => "Mon premier article",
                'description' => "Mon super premier description"
            ],
            [
                'title' => "Mon second article",
                'description' => "Mon super second description"
            ]
        ];
        return view('articles', compact('posts'));
    }
}
