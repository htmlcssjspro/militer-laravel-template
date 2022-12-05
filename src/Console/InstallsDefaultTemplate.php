<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsDefaultTemplate
{
    /**
     * Install Militer Template Helpers.php
     * Update the "composer.json" file.
     *
     * @return void
     */
    protected function installDefaultTemplate()
    {
        //* base_path
        copy(__DIR__ . '/../../stubs/default/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../stubs/default/.eslintrc.json', base_path('.eslintrc.json'));
        copy(__DIR__ . '/../../stubs/default/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/default/tailwind.config.js', base_path('tailwind.config.js'));

        //* .htaccess
        copy(__DIR__ . '/../../stubs/default/.htaccess', base_path('.htaccess'));
        copy(__DIR__ . '/../../stubs/default/public/.htaccess', public_path('.htaccess'));

        //* public_path
        copy(__DIR__ . '/../../stubs/default/public/robots.txt', public_path('robots.txt'));

        //* Translations
        (new Filesystem)->ensureDirectoryExists(base_path('lang/ru'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/lang/ru', base_path('lang/ru'));

        //* Routes...
        copy(__DIR__ . '/../../stubs/default/routes/admin.php', base_path('routes/admin.php'));
        copy(__DIR__ . '/../../stubs/default/routes/news.php', base_path('routes/news.php'));
        copy(__DIR__ . '/../../stubs/default/routes/pages.php', base_path('routes/pages.php'));
        copy(__DIR__ . '/../../stubs/default/routes/posts.php', base_path('routes/posts.php'));
        copy(__DIR__ . '/../../stubs/default/routes/user.php', base_path('routes/user.php'));
        copy(__DIR__ . '/../../stubs/default/routes/web.php', base_path('routes/web.php'));

        copy(
            __DIR__ . '/../../stubs/default/app/Providers/RouteServiceProvider.php',
            app_path('Providers/RouteServiceProvider.php')
        );

        //* Controllers
        // (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Auth'));
        // (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Http/Controllers/Auth', app_path('Http/Controllers/Auth'));

        //* Resources
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/js',
            resource_path('js')
        );

        (new Filesystem)->ensureDirectoryExists(resource_path('scss'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/scss',
            resource_path('scss')
        );

        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/css',
            resource_path('css')
        );

        (new Filesystem)->ensureDirectoryExists(resource_path('fonts'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/fonts',
            resource_path('fonts')
        );

        (new Filesystem)->ensureDirectoryExists(resource_path('svg'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/svg',
            resource_path('svg')
        );

        (new Filesystem)->ensureDirectoryExists(resource_path('trix'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/trix',
            resource_path('trix')
        );

        //* Components
        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/components',
            resource_path('views/components')
        );

        //* Views
        (new Filesystem)->ensureDirectoryExists(resource_path('views/pages'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/pages',
            resource_path('views/pages')
        );

        //* Components Classes
        // (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        // (new Filesystem)->copyDirectory(
        //     __DIR__ . '/../../stubs/default/app/View/Components',
        //     app_path('View/Components')
        // );

        //* "Dashboard" Route...
        // $this->replaceInFile('/home', '/dashboard', app_path('Providers/RouteServiceProvider.php'));
        // $this->replaceInFile('/home', '/dashboard', resource_path('views/welcome.blade.php'));
        // $this->replaceInFile('Home', 'Dashboard', resource_path('views/welcome.blade.php'));


        $this->components->info('Militer Template scaffolding installed successfully.');
        $this->line('');
        $this->runCommands(['npm install', 'npx vite']);
    }
}
