import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/metro-all.min.css',
                'resources/js/metro.min.js',
            ],
            refresh: true,
        }),
    ],
});
