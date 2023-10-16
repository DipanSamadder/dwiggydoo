import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/responsive.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    base: 'https://projects.cilearningschool.com/dwiggydoo/public/build/',  
});
