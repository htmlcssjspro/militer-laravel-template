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
            __DIR__ . '/../../stubs/default/app/Models/Admin.php',
            app_path('Models/Admin.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Models/Page.php',
            app_path('Models/Page.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Models/Test.php',
            app_path('Models/Test.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/app/Models/User.php',
            app_path('Models/User.php')
        );

        //* Database Migrations
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_100001_create_users_table.php',
            app_path('database/migrations/2022_12_03_100001_create_users_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_100002_create_user_password_resets_table.php',
            app_path('database/migrations/2022_12_03_100002_create_user_password_resets_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_200001_create_failed_jobs_table.php',
            app_path('database/migrations/2022_12_03_200001_create_failed_jobs_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_300001_create_pages_table.php',
            app_path('database/migrations/2022_12_03_300001_create_pages_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_300002_create_admin_pages_table.php',
            app_path('database/migrations/2022_12_03_300002_create_admin_pages_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_300003_create_user_pages_table.php',
            app_path('database/migrations/2022_12_03_300003_create_user_pages_table.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/migrations/2022_12_03_999111_create_tests_table.php',
            app_path('database/migrations/2022_12_03_999111_create_tests_table.php')
        );

        //* Database Factories
        copy(
            __DIR__ . '/../../stubs/default/database/factories/AdminFactory.php',
            app_path('database/factories/AdminFactory.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/factories/UserFactory.php',
            app_path('database/factories/UserFactory.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/factories/TestFactory.php',
            app_path('database/factories/TestFactory.php')
        );

        //* Database Seeders
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/DataBaseSeeder.php',
            app_path('database/seeders/DataBaseSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/UserSeeder.php',
            app_path('database/seeders/UserSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/PageSeeder.php',
            app_path('database/seeders/PageSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/UserPageSeeder.php',
            app_path('database/seeders/UserPageSeeder.php')
        );
        copy(
            __DIR__ . '/../../stubs/default/database/seeders/TestSeeder.php',
            app_path('database/seeders/TestSeeder.php')
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
        $this->runShellCommand('npm install && npx vite');
    }
}
