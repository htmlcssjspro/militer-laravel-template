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
    protected $signature = 'breeze:install {stack=blade : The development stack that should be installed (blade,react,vue,api)}
                            {--inertia : Indicate that the Vue Inertia stack should be installed (Deprecated)}
                            {--pest : Indicate that Pest should be installed}
                            {--ssr : Indicates if Inertia SSR support should be installed}
                            {--composer=global : Absolute path to the Composer binary which should be used to install packages}';

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



        $this->components->error('Error Description');

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
}
