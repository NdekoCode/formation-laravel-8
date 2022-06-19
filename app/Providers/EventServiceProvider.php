<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Blog\Post;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use App\Events\PostCreatedEvent;
use App\Events\UserCreatingEvent;
use Illuminate\Auth\Events\Registered;
use App\Listeners\UserCreatingListener;
use App\Listeners\SendPostCreatedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreatedEvent::class => [
            SendPostCreatedListener::class
        ],
        UserCreatingEvent::class => [
            UserCreatingListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
    }
}
