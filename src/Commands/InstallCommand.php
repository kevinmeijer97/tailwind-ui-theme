<?php

namespace Rapidez\TailwindUiTheme\Commands;

use Exception;
use Illuminate\Console\Command;
use Rapidez\TailwindUiTheme\Console\Composer\Json as ComposerJson;

class InstallCommand extends Command
{
    protected $signature = 'tailwind-ui-theme:install';

    protected $description = 'Install Tailwind UI Theme';

    public function handle(): void
    {
        copy(__DIR__ . '/../../tailwind.config.tailwind-ui-theme.js', base_path('tailwind.config.tailwind-ui-theme.js'));

        $this->addPostAutoLoadDumpCmdAndRunFirstTime();

        $this->call('vendor:publish', [
            '--provider' => 'Statamic\Eloquent\ServiceProvider',
            '--tag' => 'migrations',
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'statamic-eloquent-entries-table',
        ]);

        $this->call('statamic:auth:migration');

        $this->call('vendor:publish', [
            '--tag' => 'rapidez-tailwind-ui-theme-config',
            '--force',
        ]);

        $this->call('statamic:install', [
            '--ansi',
        ]);

        $this->info('Done 🚀');
    }

    protected function addPostAutoLoadDumpCmdAndRunFirstTime(): self
    {
        try {
            ComposerJson::addPostAutoLoadDumpCmd();
        } catch (Exception $exception) {
            return $this->outputMissingPostAutoLoadCmd();
        }

        return $this;
    }

    protected function outputMissingPostAutoLoadCmd(): self
    {
        $this->error('We notice you are missing a composer hook!');
        $this->error('Please ensure the following is registered in the `scripts` section of your composer.json file,');

        $this->line(<<<'EOT'
"scripts": {
    "post-autoload-dump": [
        "@php artisan statamic:install --ansi"
    ],
    ...
}
EOT
        );

        return $this;
    }
}
