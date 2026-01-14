import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
            fontFamily: {
                sans: ['"Noto Sans"', '"Inter var"', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
            },
            colors: {
                    'official-purple': {
                    '50':  '#ebf9ff',
                    '100': '#d1f2ff',
                    '200': '#aeeaff',
                    '300': '#76dfff',
                    '400': '#35caff',
                    '500': '#07a8ff',
                    '600': '#0082ff',
                    '700': '#0069ff',
                    '800': '#004ea8',
                    '900': '#062f65',
                    },
                    'official-red': {
                    '50': '#da291c',
                    },
                },
        },
    },

    plugins: [forms],
};