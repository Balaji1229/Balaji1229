<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Events\UserRegistered;
use App\Listeners\SendEmailConfirmation;
use Illuminate\Support\Facades\Event;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }


    public function boot(): void
{
    Event::listen(
        UserRegistered::class,
        SendEmailConfirmation::class,
    );
}
}
