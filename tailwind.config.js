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
            },

            colors: {
                blue: 'rgb(0,123,255)',
                green: 'rgb(25,134,85)',
                lightGreen: 'rgb(32,176,111)',
                veryLightGreen: 'rgb(213,237,219)',
                darkGreen: 'rgb(23,79,46)',
                orange: 'rgb(250,99,65)',
                red: 'rgb(244,55,92)',
                gray: 'rgb(198,199,198)',
                lightGray: 'rgb(243,244,246)',
                darkGray: 'rgb(109,117,124)',
                veryDarkGray: 'rgb(73,81,86)',
              },
        },
    },

    plugins: [forms],
};
