<?php

namespace Fligno\SimpleAuth;

use Fligno\StarterKit\Providers\BaseStarterKitServiceProvider;

class SimpleAuthServiceProvider extends BaseStarterKitServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simple-auth.php', 'simple-auth');

        // Register the service the package provides.
        $this->app->singleton('simple-auth', function ($app) {
            return new SimpleAuth;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['simple-auth'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/simple-auth.php' => config_path('simple-auth.php'),
        ], 'simple-auth.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fligno'),
        ], 'simple-auth.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fligno'),
        ], 'simple-auth.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fligno'),
        ], 'simple-auth.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
