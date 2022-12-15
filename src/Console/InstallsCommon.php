<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsCommon
{
    /**
     * Install Laravel base path files.
     *
     * @return void
     */
    protected function installBasePath()
    {
        //* .htaccess
        copy(__DIR__ . '/../../stubs/default/.htaccess', base_path('.htaccess'));
        copy(__DIR__ . '/../../stubs/default/public/.htaccess', public_path('.htaccess'));

        //* base_path
        copy(__DIR__ . '/../../stubs/default/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../stubs/default/.eslintrc.json', base_path('.eslintrc.json'));
        copy(__DIR__ . '/../../stubs/default/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/default/tailwind.config.js', base_path('tailwind.config.js'));

        //* public_path
        copy(__DIR__ . '/../../stubs/default/public/robots.txt', public_path('robots.txt'));

        //* Translations
        (new Filesystem)->ensureDirectoryExists(base_path('lang/ru'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/lang/ru', base_path('lang/ru'));
    }

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
            __DIR__ . '/../../stubs/default/app/Helpers',
            app_path('Helpers')
        );

        $helpers = [
            'app/Helpers/helpers.php',
        ];

        $composerJson = json_decode(file_get_contents(base_path('composer.json')), true);
        $autoload = array_key_exists('autoload', $composerJson) ? $composerJson['autoload'] : [];
        $files = array_key_exists('files', $autoload) ? $autoload['files'] : [];

        foreach ($helpers as $helper) {
            if (!in_array($helper, $files)) {
                array_push($files, $helper);
            }
        }

        $composerJson['autoload']['files'] = $files;
        ksort($composerJson['autoload']['files']);

        file_put_contents(
            base_path('composer.json'),
            json_encode($composerJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );

        $this->runShellCommand('composer dump-autoload');
        $this->line('');
        // $this->components->info('Militer Template Helpers installed successfully.');
    }

    /**
     * Install Laravel LiveWire.
     *
     * @return void
     */
    protected function installLiveWire()
    {
        $this->requireComposerPackage('livewire/livewire');
    }

    /**
     * Install Log Viewer.
     *
     * @return void
     */
    protected function installLogViewer()
    {
        $this->requireComposerPackage('opcodesio/log-viewer');

        copy(
            __DIR__ . '/../../stubs/default/config/log-viewer.php',
            config_path('log-viewer.php')
        );
    }

}
