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
                    '50': '#faf6fe',
                    '100': '#f2ebfc',
                    '200': '#e7dafa',
                    '300': '#d5bdf5',
                    '400': '#bb93ed',
                    '500': '#a169e3',
                    '600': '#8b4ad3',
                    '700': '#7538b8',
                    '800': '#66339a',
                    '900': '#52297a',
                    '950': '#361358',
                    },
                },
        },
    },

    plugins: [forms],
};