import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/demos.css',
                'resources/css/base-cake.css',
                'resources/css/cake-step-0.css',
                'resources/css/cake-step-1.css',
                'resources/css/cake-step-2.css',
                'resources/css/cake-step-3.css',
                'resources/css/cake-step-4.css',
                'resources/css/cake-step-5.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
