<?php

namespace Rapidez\TailwindUiTheme;

use Illuminate\Support\Facades\Route;
use Rapidez\TailwindUiTheme\Commands\InstallCommand;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Http\Controllers\FrontendController;

class TailwindUiThemeServiceProvider extends AddonServiceProvider
{
    protected $commands = [
        InstallCommand::class,
    ];

    public function register()
    {
        $this->registerConfig()
            ->registerViews();
    }

    public function bootAddon()
    {
        parent::boot();

        $this->bootPublishables()
            ->bootRoutes()
            ->bootCommands();
    }

    public function bootRoutes(): self
    {
        $this->registerWebRoutes(function () {
            Route::get('/', [FrontendController::class, 'index']);
        });

        return $this;
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

        $this->publishes([
            __DIR__.'/../resources/blueprints/' => resource_path('blueprints'),
            __DIR__.'/../resources/fieldsets/' => resource_path('fieldsets'),
        ], 'rapidez-tailwind-ui-theme-blueprints');

        $this->publishes([
            __DIR__.'/../content/' => base_path('content'),
        ], 'rapidez-tailwind-ui-theme-collections');

        return $this;
    }
}
