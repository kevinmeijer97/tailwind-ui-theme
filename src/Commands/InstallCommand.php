<?php

namespace Rapidez\TailwindUiTheme\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'tailwind-ui-theme:install';

    protected $description = 'Install Tailwind UI Theme';

    public function handle()
    {
        copy(__DIR__ . '/../../tailwind.config.tailwind-ui-theme.js', base_path('tailwind.config.tailwind-ui-theme.js'));

        $this->info('Done 🚀');
    }
}
