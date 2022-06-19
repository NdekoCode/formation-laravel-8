<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Blog\Post::factory(50)->create();
        \App\Models\Blog\Comment::factory(50)->create();
        \App\Models\Blog\Video::factory(50)->create();
        \App\Models\Blog\Image::factory(50)->create();
        \App\Models\Blog\Artist::factory(50)->create();
        \App\Models\Blog\Tag::factory(10)->create();
        \App\Models\Blog\PostTag::factory(50)->create();
    }
}
