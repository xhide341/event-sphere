import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                gloria: ['Gloria Hallelujah', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0B2147',
                secondary: '#000000',
                tertiary: '#000000',
                accent: '#035AA6',                
                danger: '#FF2D20',
                success: '#00C49F',
                warning: '#FF8B00',
                info: '#0081C6',
                'custom-white': '#F5F5F5',
            },
            animation: {
                'spin-fast': 'spin 0.5s linear infinite',
            },
            rotate: {
                '360': '360deg',
            },
        },
    },

    plugins: [forms],
};
