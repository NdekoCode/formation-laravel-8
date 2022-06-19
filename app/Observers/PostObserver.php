<?php

namespace App\Observers;

use App\Models\Blog\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        dd("Post {$post->title} créer  avec succés");
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
