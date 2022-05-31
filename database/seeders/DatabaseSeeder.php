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
        \App\Models\Post::factory(50)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Video::factory(50)->create();
        \App\Models\Image::factory(50)->create();
        \App\Models\Artist::factory(50)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\PostTag::factory(50)->create();
    }
}
