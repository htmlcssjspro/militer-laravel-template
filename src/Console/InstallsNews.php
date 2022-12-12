<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsNews
{
    /**
     * Install Militer Template News
     *
     * @return void
     */
    protected function installNews()
    {
        if ($this->argument('template') === 'default') {
            //* Routes
            copy(__DIR__ . '/../../stubs/default/routes/news.php',  base_path('routes/news.php'));
            $this->installRouteGroup('news');


            //* Controllers
            copy(
                __DIR__ . '/../../stubs/default/app/Http/Controllers/NewsController.php',
                app_path('Http/Controllers/NewsController.php')
            );


            //* Models
            copy(
                __DIR__ . '/../../stubs/default/app/Models/News.php',
                app_path('Models/News.php')
            );
            copy(
                __DIR__ . '/../../stubs/default/app/Models/Comment.php',
                app_path('Models/Comment.php')
            );


            //* Database Migrations
            copy(
                __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_500002_create_posts_table.php',
                base_path('database/migrations/2022_12_03_500002_create_posts_table.php')
            );


            //* Database Factories
            copy(
                __DIR__ . '/../../stubs/default/database/factories/NewsFactory.php',
                base_path('database/factories/NewsFactory.php')
            );


            //* Database Seeders
            copy(
                __DIR__ . '/../../stubs/default/database/seeders/NewsSeeder.php',
                base_path('database/seeders/NewsSeeder.php')
            );
            $this->installDatabaseSeeder('NewsSeeder');


            //* Views
            (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/news'));
            (new Filesystem)->copyDirectory(
                __DIR__ . '/../../stubs/default/resources/views/pages/news',
                resource_path('views/pages/news')
            );
        }

        $this->components->info('Militer Template News scaffolding installed successfully.');
        $this->line('');
    }
}
