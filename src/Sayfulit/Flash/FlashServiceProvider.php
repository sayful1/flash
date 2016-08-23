<?php

namespace Sayfulit\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'flash');

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/sayfulit/flash')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Sayfulit\Flash\SessionStore',
            'Sayfulit\Flash\LaravelSessionStore'
        );

        $this->app->singleton('flash', function () {
            return $this->app->make('Sayfulit\Flash\FlashNotifier');
        });
    }
}
