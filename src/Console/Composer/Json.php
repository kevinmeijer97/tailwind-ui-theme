<?php

namespace Rapidez\TailwindUiTheme\Console\Composer;

use Statamic\Facades\File;
use Statamic\Support\Arr;

class Json
{
    public static function isMissingPostAutoLoadDumpCmd(): bool
    {
        $composerJson = json_decode(File::get(base_path('composer.json')), true);

        $scripts = Arr::get($composerJson, 'scripts.post-autoload-dump', []);

        return ! in_array('@php artisan statamic:install --ansi', $scripts);
    }

    public static function addPostAutoLoadDumpCmd()
    {
        if (! static::isMissingPostAutoLoadDumpCmd()) {
            return false;
        }

        $composerJson = File::get($path = base_path('composer.json'));
        $composerJsonArray = json_decode($composerJson, true);

        $postAutoLoadDump = '@php artisan statamic:install --ansi';

        $postAutoLoadDumpArray = Arr::get($composerJsonArray, 'scripts.post-autoload-dump', []);
        $postAutoLoadDumpArray[] = $postAutoLoadDump;
        Arr::set($composerJsonArray, 'scripts.post-autoload-dump', $postAutoLoadDumpArray);

        $composerJson = json_encode($composerJsonArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $success = Arr::get(json_decode($composerJson, true), 'scripts.post-autoload-dump', false);

        if ($success === false) {
            throw new \Exception('Statamic had trouble adding the `post-autoload-dump` to your composer.json file.');
        }

        File::put($path, $composerJson);
    }
}
