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
    // use InstallsApiStack, InstallsBladeStack, InstallsInertiaStacks;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'militer-template:install
                            {stack=default : The development stack that should be installed (default)}
                            {--some-key=value : Some key and their defalt value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Breeze controllers and resources';

    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        // NPM Packages...
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

        // Controllers...
        // (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Auth'));
        // (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Http/Controllers/Auth', app_path('Http/Controllers/Auth'));

        // Views...
        // (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
        // (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        // (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));

        // (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/resources/views/auth', resource_path('views/auth'));
        // (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/resources/views/layouts', resource_path('views/layouts'));
        // (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/resources/views/components', resource_path('views/components'));

        // copy(__DIR__ . '/../../stubs/default/resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));

        // Components...
        // (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        // (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/default/app/View/Components', app_path('View/Components'));

        // Routes...
        // copy(__DIR__ . '/../../stubs/default/routes/web.php', base_path('routes/web.php'));
        // copy(__DIR__ . '/../../stubs/default/routes/auth.php', base_path('routes/auth.php'));

        // "Dashboard" Route...
        // $this->replaceInFile('/home', '/dashboard', resource_path('views/welcome.blade.php'));
        // $this->replaceInFile('Home', 'Dashboard', resource_path('views/welcome.blade.php'));
        // $this->replaceInFile('/home', '/dashboard', app_path('Providers/RouteServiceProvider.php'));

        // Tailwind / Vite...
        copy(__DIR__ . '/../../stubs/default/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../stubs/default/.eslintrc.json', base_path('.eslintrc.json'));
        copy(__DIR__ . '/../../stubs/default/.htaccess', base_path('.htaccess'));
        copy(__DIR__ . '/../../stubs/default/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/default/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/default/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/../../stubs/default/resources/css/app.css', resource_path('css/app.css'));

        $this->runCommands(['npm install', 'npm run build']);
        $this->line('');
        $this->components->info('Militer Template scaffolding installed successfully.');
        $this->components->error('Militer Template Error');

        return 1;
    }

    /**
     * Update the "package.json" file.
     *
     * @param  array $devDependencies
     * @param  array $dependencies
     * @return void
     */
    // protected static function updateNodePackages(callable $callback, $configurationKey = 'devDependencies')
    protected static function updateNodePackages(array $devDependencies, array $dependencies)
    {
        if (!file_exists(base_path('package.json'))) {
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
     * Run the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    '.$line);
        });
    }
}
