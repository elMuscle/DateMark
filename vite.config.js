import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/css/main.css',
                'resources/css/metro-all.min.css',
                'resources/css/datemark-light.css',
                'resources/css/datemark-dark.css',
                'resources/js/app.js',
                'resources/js/bootstrap.bundle.js',
                'resources/js/metro.min.js',
            ],
            refresh: true,
        }),
    ],
});
