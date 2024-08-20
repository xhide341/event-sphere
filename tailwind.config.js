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
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
                logo: ['McLaren', ...defaultTheme.fontFamily.sans],
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
                'sky-blue': '#99CCFF',
                'alice-blue': '#F0F8FF',
                'patten-blue': '#D5E7F1',
                'angora-blue': '#B8C6D9',
                'white-900': '#F5F5F5',
                'white-800': '#EBEBEB',
                'white-700': '#D6D6D6',
                'white-600': '#C2C2C2',
                'white-500': '#ADADAD',
                'white-400': '#999999',
                'white-300': '#858585',
                'white-200': '#717171',
                'white-100': '#5D5D5D',                
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
