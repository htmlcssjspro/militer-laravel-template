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
            copy(
                __DIR__ . '/../../stubs/default/app/Models/Comment.php',
                app_path('Models/Comment.php')
            );


            //* Database Migrations
            copy(
                __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_500002_create_posts_table.php',
                app_path('database/migrations/2022_12_03_500002_create_posts_table.php')
            );
            copy(
                __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_500003_create_comments_table.php',
                app_path('database/migrations/2022_12_03_500003_create_comments_table.php')
            );


            //* Database Factories
            copy(
                __DIR__ . '/../../stubs/default/database/factories/CommentFactory.php',
                app_path('database/factories/CommentFactory.php')
            );
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
            copy(
                __DIR__ . '/../../stubs/default/database/seeders/CommentSeeder.php',
                app_path('database/seeders/CommentSeeder.php')
            );
            $this->installDatabaseSeeder('CommentSeeder::class');


            //* Views
            (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/blog'));
            (new Filesystem)->copyDirectory(
                __DIR__ . '/../../stubs/default/resources/views/pages/blog',
                resource_path('views/pages/blog')
            );
        }

        $this->components->info('Militer Template Blog scaffolding installed successfully.');
        $this->line('');
    }
}
