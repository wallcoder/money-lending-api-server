<?php

namespace App\Providers;

use App\Services\SimpleLogger;
use Illuminate\Support\ServiceProvider;

class SimpleLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SimpleLogger::class, fn ($app) =>  new SimpleLogger());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
