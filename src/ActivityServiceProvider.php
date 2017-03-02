<?php

namespace Beaplat\Activity;

use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Copy the migration file
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['activity'] = $this->app->share(function ($app) {
            return new Activity();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['activity'];
    }
}
