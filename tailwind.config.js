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
                logo: ['Excon-Bold', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#035AA6',
                    dark: '#032859',
                    light: '#0670d1',
                    lighter: '#0784f3',
                },
                secondary: '#000000',
                tertiary: '#000000',
                accent: '#035AA6',            
                danger: '#FF2D20',
                success: '#00C49F',
                warning: '#FF8B00',
                info: '#0081C6',
                'custom-white': '#F5F5F5',
                'custom-black': '#0B1215',
                'milk-white': '#FCFFF5',
                'sky-blue': '#99CCFF',
                'alice-blue': '#F0F8FF',
                'patten-blue': '#D5E7F1',
                'angora-blue': '#B8C6D9',
                'buzz': '#F2C744',
                'blueberry': '#568EBF',  
                'muted-teal': '#91AAB4',
                'broad-blue': '#074973',
                'clarinet': '#032859',
                'navy-blue': '#0B2147'         
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
