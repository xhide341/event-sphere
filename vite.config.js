import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const refreshPaths = [
    'app/Http/Livewire/**',
    'resources/views/**',
    'routes/**',
];

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/initAlpine.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Filament/**',
            ],
        }),
        ViteImageOptimizer(),
    ],
    server: {
        hmr: {
            host: 'localhost'
        },
        host: '0.0.0.0',
        port: 5173,
    },
});
