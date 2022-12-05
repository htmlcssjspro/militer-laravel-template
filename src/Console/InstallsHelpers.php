<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsHelpers
{
    /**
     * Install Militer Template Helpers.php
     * Update the "composer.json" file.
     *
     * @return void
     */
    protected function installHelpers()
    {
        (new Filesystem)->ensureDirectoryExists(app_path('Helpers'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/app/Helpers/helpers.php',
            app_path('Helpers/helpers.php')
        );

        $composerJson = json_decode(file_get_contents(base_path('composer.json')), true);

        $autoload = array_key_exists('autoload', $composerJson) ? $composerJson['autoload'] : [];
        $files = array_key_exists('files', $autoload) ? $autoload['files'] : [];

        $composerJson['autoload']['files'] = array_push($files, 'app/Helpers/helpers.php');

        ksort($composerJson['autoload']['files']);

        file_put_contents(
            base_path('composer.json'),
            json_encode($composerJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );

        $this->runCommands(['composer dump-autoload']);
        $this->line('');
        $this->components->info('Militer Template Helpers installed successfully.');
    }
}
