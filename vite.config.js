import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/styles.scss', 'resources/js/app.js', 'resources/css/style.css'],
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
