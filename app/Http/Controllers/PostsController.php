<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function posts()
    {
        return response()->json([
            'title' => "Mon super article",
            'description' => "ma super description"
        ]);
    }
}
