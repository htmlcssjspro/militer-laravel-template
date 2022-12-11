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

            //* Database Migrations
            copy(
                __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_500002_create_posts_table.php',
                app_path('database/migrations/2022_12_03_500002_create_posts_table.php')
            );

            //* Database Factories
            copy(
                __DIR__ . '/../../stubs/default/database/factories/NewsFactory.php',
                app_path('database/factories/NewsFactory.php')
            );

            //* Database Seeders
            copy(
                __DIR__ . '/../../stubs/default/database/seeders/NewsSeeder.php',
                app_path('database/seeders/NewsSeeder.php')
            );
            $this->installDatabaseSeeder('NewsSeeder');
        }
    }
}
