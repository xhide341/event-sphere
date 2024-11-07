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
                'resources/css/filament/admin/theme.css',
            ],
            refresh: [
                ...refreshPaths,
                'app/Filament/**',
            ],
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'
        },
        host: '0.0.0.0',
        port: 5173,
    },
});
