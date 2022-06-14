<?php

namespace App\Listeners;

use App\Mail\PostCreatedMail;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreatedEvent  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        Mail::to($event->user)->send(new PostCreatedMail($event->post, $event->user));
    }
}
