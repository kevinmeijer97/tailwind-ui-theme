<?php

namespace Rapidez\TailwindUiTheme;

use Illuminate\Support\ServiceProvider;

class TailwindUiThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig()
            ->registerViews();
    }

    public function boot()
    {
        $this->bootPublishables();
    }

    public function registerConfig() : self
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rapidez/tailwind-ui-theme.php', 'rapidez.tailwind-ui-theme');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/eloquent-driver.php', 'statamic-eloquent-driver');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/editions.php', 'statamic.editions');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/routes.php', 'statamic.routes');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/users.php', 'statamic.users');

        return $this;
    }

    public function registerViews() : self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/core-overwrites', 'rapidez');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez-tut');

        return $this;
    }

    public function bootPublishables() : self
    {
        $this->publishes([
            __DIR__.'/../resources/core-overwrites' => resource_path('views/vendor/rapidez'),
        ], 'core-overwrites');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-tut'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/' => config_path(),
        ], 'config');

        return $this;
    }
}
