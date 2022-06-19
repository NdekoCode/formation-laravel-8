<?php

namespace App\Providers;

use App\Services\StripeService;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // En utilisant $this->app->bind, on aura une nouvelle instance de "StripeService" à chaque execution de du controller "DonationController" ou un controller qui fait appel à "StripeService"
        // Pour avoir une instance commune il faut utiliser plutot $this->app->singleton()
        $this->app->singleton(StripeService::class, fn () => new StripeService(env('STRIPE_KEY')));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
