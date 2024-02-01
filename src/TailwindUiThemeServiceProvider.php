<?php

namespace Rapidez\TailwindUiTheme;

use Illuminate\Support\ServiceProvider;
use Rapidez\TailwindUiTheme\Commands\InstallCommand;

class TailwindUiThemeServiceProvider extends ServiceProvider
{
    protected $commands = [
        InstallCommand::class,
    ];

    public function register()
    {
        $this->registerConfig()
            ->registerViews();
    }

    public function boot()
    {
        $this->bootPublishables()
            ->bootCommands();
    }

    public function bootCommands(): self
    {
        $this->commands($this->commands);
        return $this;
    }

    public function registerConfig() : self
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rapidez/tailwind-ui-theme.php', 'rapidez.tailwind-ui-theme');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/eloquent-driver.php', 'statamic.eloquent-driver');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/editions.php', 'statamic.editions');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/routes.php', 'statamic.routes');
        $this->mergeConfigFrom(__DIR__.'/../config/statamic/users.php', 'statamic.users');
        $this->mergeConfigFrom(__DIR__.'/../config/auth.php', 'auth');

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
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-tut'),
            __DIR__.'/../resources/core-overwrites' => resource_path('views/vendor/rapidez'),
        ], 'rapidez-tailwind-ui-theme-views');

        $this->publishes([
            __DIR__.'/../config/' => config_path(),
            __DIR__.'/../config/auth.php' => config_path('auth.php'),
        ], 'rapidez-tailwind-ui-theme-config');

        return $this;
    }
}
