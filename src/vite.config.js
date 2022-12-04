import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',

                // 'resources/views/components/app/app.js',
                // 'resources/views/components/app/app.scss',

                'resources/views/pages/home/home.js',
                'resources/views/pages/home/home.scss',

                // 'resources/views/pages/admin/admin.js',
                // 'resources/views/pages/admin/admin.scss',

                // 'resources/js/breeze.js',
                // 'resources/css/breeze.css',

                // 'resources/css/tailwind.css',
            ],
            refresh: true,
        }),
    ],
    build: {
        sourcemap: true,
    },
    css: {
        devSourcemap: true,
    },
});
