<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsBlog
{
    /**
     * Install Militer Template Blog
     *
     * @return void
     */
    protected function installBlog()
    {
        if ($this->argument('template') === 'default') {
            //* Routes
            copy(__DIR__ . '/../../stubs/default/routes/posts.php', base_path('routes/posts.php'));
            $this->installRouteGroup('posts');

            //* Controllers
            copy(
                __DIR__ . '/../../stubs/default/app/Http/Controllers/PostController.php',
                app_path('Http/Controllers/PostController.php')
            );

            //* Models
            copy(
                __DIR__ . '/../../stubs/default/app/Models/Post.php',
                app_path('Models/Post.php')
            );

            //* Database Migrations
            copy(
                __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_500001_create_news_table.php',
                app_path('database/migrations/2022_12_03_500001_create_news_table.php')
            );

            //* Database Factories
            copy(
                __DIR__ . '/../../stubs/default/database/factories/PostFactory.php',
                app_path('database/factories/PostFactory.php')
            );

            //* Database Seeders
            copy(
                __DIR__ . '/../../stubs/default/database/seeders/PostSeeder.php',
                app_path('database/seeders/PostSeeder.php')
            );
            $this->installDatabaseSeeder('PostSeeder');
            // copy(
            //     __DIR__ . '/../../stubs/default/database/seeders/CommentSeeder.php',
            //     app_path('database/seeders/CommentSeeder.php')
            // );
            // $this->installDatabaseSeeder('CommentSeeder::class');
        }
    }
}
