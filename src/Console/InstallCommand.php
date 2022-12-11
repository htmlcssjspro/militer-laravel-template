<?php

namespace Militer\Template\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use RuntimeException;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use InstallsDefaultTemplate, InstallsHelpers, InstallsBlog, InstallsNews;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '
        militer-template:install
        {template=default : The template type that should be installed}
        {--blog : Add Blog to the App}
        {--news : Add News to the App}
        {--all : Add All Militer Template feachers to the App}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Militer Template scaffolding';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $this->updateNodePackages(
            [
                "@tailwindcss/forms" => "^0.5.3",
                "@typescript-eslint/eslint-plugin" => "^5.42.1",
                "@typescript-eslint/parser" => "^5.42.1",
                "alpinejs" => "^3.10.5",
                "autoprefixer" => "^10.4.13",
                "axios" => "^1.1",
                "eslint" => "^8.27.0",
                "laravel-vite-plugin" => "^0.7.0",
                "lodash" => "^4.17.21",
                "postcss" => "^8.4.19",
                "sass" => "^1.56.1",
                "vite" => "^3.2.3",
            ],
            [
                "swiper" => "^8.4.4",
                "tailwindcss" => "^3.2.4",
            ]
        );
        $this->flushNodeModules();
        $this->runShellCommand('npm install');

        $this->installHelpers();
        $this->installLiveWire();
        $this->installLogViewer();
        $this->runShellCommand('php artisan storage:link');

        if ($this->argument('template') === 'default') {
            return $this->installDefaultTemplate();
        }
        if ($this->option('all')) {
            $this->installBlog();
            $this->installNews();
            return;
        } elseif ($this->option('blog')) {
            return $this->installBlog();
        } elseif ($this->option('news')) {
            return $this->installNews();
        }

        $this->components->error('Invalid template type or options. Supported template types are [default]. Supported options are [--all], [--blog], [--news]');

        return 1;
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
            __DIR__ . '/../../stubs/defalt/config/log-viewer.php',
            config_path('log-viewer.php')
        );
    }

    /**
     * Install the given Composer Package into the application.
     *
     * @param  string  $package
     * @return void
     */
    protected function requireComposerPackage(string $package)
    {
        $this->runShellCommand('composer require ' . $package);
    }

    /**
     * Run the given command.
     *
     * @param  string  $command
     * @return void
     */
    protected function runShellCommand($command)
    {
        $process = Process::fromShellCommandline($command, base_path(), null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> ' . $e->getMessage() . PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    ' . $line);
        });
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }

    /**
     * Install the route group to the application RouteServiceProvider.
     *
     * @param  string  $group
     * @param  string  $middleware
     * @return void
     */
    protected function installRouteGroup($group, $middleware = 'web')
    {
        $routeServiceProvider = file_get_contents(app_path('Providers/RouteServiceProvider.php'));

        $routeGroups = Str::before(Str::after($routeServiceProvider, '$this->routes(function () {'), '});');

        $group =
            str_pad('', 12) . "Route::middleware('{$middleware}')" . PHP_EOL .
            str_pad('', 16) . "->group(base_path('routes/{$group}.php'));";
        $before =
            str_pad('', 12) . "Route::middleware('web')" . PHP_EOL .
            str_pad('', 16) . "->group(base_path('routes/web.php'));";

        if (!Str::contains($routeGroups, $group)) {
            $modifiedRouteGroups = str_replace(
                $before,
                PHP_EOL . $group . PHP_EOL . PHP_EOL . $before,
                $routeGroups
            );

            file_put_contents(
                app_path('Providers/RouteServiceProvider.php'),
                str_replace($routeGroups, $modifiedRouteGroups, $routeServiceProvider)
            );
        }
    }

    /**
     * Install the seeder to the application DatabaseSeeder.
     *
     * @param  string  $seeder
     * @return void
     */
    protected function installDatabaseSeeder($seeder)
    {
        $dataBaseSeeder = file_get_contents(app_path('database/seeders/DataBaseSeeder.php'));

        $seederList = Str::before(Str::after($dataBaseSeeder, '$this->call(['), ']);');

        $after = str_pad('', 12) . 'PageSeeder::class,';

        if (!Str::contains($seederList, $seeder)) {
            $modifiedSeederList = str_replace(
                $after,
                $after . PHP_EOL . $seeder . '::class,' . PHP_EOL,
                $seederList
            );

            file_put_contents(
                app_path('database/seeders/DataBaseSeeder.php'),
                str_replace($seederList, $modifiedSeederList, $dataBaseSeeder)
            );
        }
    }

    /**
     * Update the package.json file.
     *
     * @param  array $devDependencies
     * @param  array $dependencies
     * @return void
     */
    protected static function updateNodePackages(array $devDependencies, array $dependencies = [])
    {
        if (!file_exists(base_path('package.json'))) {
            copy(__DIR__ . '/../../stubs/default/package.json', base_path('package.json'));
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $oldDevDependencies = array_key_exists('devDependencies', $packages) ? $packages['devDependencies'] : [];
        $oldDependencies = array_key_exists('dependencies', $packages) ? $packages['dependencies'] : [];

        $packages['devDependencies'] = $devDependencies + $oldDevDependencies;
        $packages['dependencies'] = $dependencies + $oldDependencies;

        ksort($packages['devDependencies']);
        ksort($packages['dependencies']);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     *
     * @return void
     */
    protected static function flushNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));
            $files->delete(base_path('package-lock.json'));
        });
    }
}
