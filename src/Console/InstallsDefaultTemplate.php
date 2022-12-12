<?php

namespace Militer\Template\Console;

use Illuminate\Filesystem\Filesystem;

trait InstallsDefaultTemplate
{
    /**
     * Install Militer Template Default
     *
     * @return void
     */
    protected function installDefaultTemplate()
    {
        //? Config


        //* Routes...
        copy(__DIR__ . '/../../stubs/default/routes/api.php',   base_path('routes/api.php'));
        copy(__DIR__ . '/../../stubs/default/routes/admin.php', base_path('routes/admin.php'));
        copy(__DIR__ . '/../../stubs/default/routes/user.php',  base_path('routes/user.php'));
        copy(__DIR__ . '/../../stubs/default/routes/auth.php',  base_path('routes/auth.php'));
        copy(__DIR__ . '/../../stubs/default/routes/web.php',   base_path('routes/web.php'));
        copy(__DIR__ . '/../../stubs/default/routes/pages.php', base_path('routes/pages.php'));

        copy(
            __DIR__ . '/../../stubs/default/app/Providers/RouteServiceProvider.php',
            app_path('Providers/RouteServiceProvider.php')
        );


        //* Controllers
        copy(
            __DIR__ . '/../../stubs/default/app/Http/Controllers/AdminController.php',
            app_path('Http/Controllers/AdminController.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Http/Controllers/ApiController.php',
            app_path('Http/Controllers/ApiController.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Http/Controllers/PageController.php',
            app_path('Http/Controllers/PageController.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Http/Controllers/TestController.php',
            app_path('Http/Controllers/TestController.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Http/Controllers/UserController.php',
            app_path('Http/Controllers/UserController.php')
        );


        //* Models
        copy(
            __DIR__ . '/../../stubs/default/app/Models/User.php',
            app_path('Models/User.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Models/Page.php',
            app_path('Models/Page.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Models/Test.php',
            app_path('Models/Test.php')
        );


        //* Database Migrations
        // (new Filesystem)->deleteDirectory(base_path('database/migrations'));
        // (new Filesystem)->makeDirectory(base_path('database/migrations'));
        // OR
        // (new Filesystem)->ensureDirectoryExists(base_path('database/migrations'));
        //* OR
        // (new Filesystem)->deleteDirectory(base_path('database/migrations'), true);
        //* OR
        (new Filesystem)->cleanDirectory(base_path('database/migrations'));
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_100001_create_users_table.php',
            base_path('database/migrations/2022_12_03_100001_create_users_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_100002_create_user_password_resets_table.php',
            base_path('database/migrations/2022_12_03_100002_create_user_password_resets_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_200001_create_failed_jobs_table.php',
            base_path('database/migrations/2022_12_03_200001_create_failed_jobs_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_300001_create_pages_table.php',
            base_path('database/migrations/2022_12_03_300001_create_pages_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_900001_create_tests_table.php',
            base_path('database/migrations/2022_12_03_900001_create_tests_table.php')
        );

        //* Database Factories
        copy(
            __DIR__ . '/../../stubs/default/database/factories/UserFactory.php',
            base_path('database/factories/UserFactory.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/factories/TestFactory.php',
            base_path('database/factories/TestFactory.php')
        );

        //* Database Seeders
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/DataBaseSeeder.php',
            base_path('database/seeders/DataBaseSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/UserSeeder.php',
            base_path('database/seeders/UserSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/PageSeeder.php',
            base_path('database/seeders/PageSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/TestSeeder.php',
            base_path('database/seeders/TestSeeder.php')
        );


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
        (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/home'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/pages/home',
            resource_path('views/pages/home')
        );
        (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/admin'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/pages/admin',
            resource_path('views/pages/admin')
        );
        (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/user'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/pages/user',
            resource_path('views/pages/user')
        );
        (new Filesystem)->ensureDirectoryExists(resource_path('views/pages/test'));
        (new Filesystem)->copyDirectory(
            __DIR__ . '/../../stubs/default/resources/views/pages/test',
            resource_path('views/pages/test')
        );

        //* Components Classes
        // (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        // (new Filesystem)->copyDirectory(
        //     __DIR__ . '/../../stubs/default/app/View/Components',
        //     app_path('View/Components')
        // );

        //* "Dashboard" Route...
        // (new Filesystem)->replaceInFile('/home', '/dashboard', app_path('Providers/RouteServiceProvider.php'));
        // (new Filesystem)->replaceInFile('/home', '/dashboard', resource_path('views/welcome.blade.php'));
        // (new Filesystem)->replaceInFile('Home', 'Dashboard', resource_path('views/welcome.blade.php'));


        $this->components->info('Militer Template Default scaffolding installed successfully.');
        $this->line('');
    }
}
