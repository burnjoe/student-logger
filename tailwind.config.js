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
            animation: {
                'spin-slow': 'spin 3s linear infinite',
            },

            colors: {
                blue: 'rgb(0,123,255)',
                lightBlue: 'rgb(71, 160, 255)',
                veryLightBlue: 'rgb(205,228,255)',
                darkBlue: 'rgb(0,64,133)',
                green: 'rgb(25,134,85)',
                lightGreen: 'rgb(32,176,111)',
                veryLightGreen: 'rgb(213,237,219)',
                darkGreen: 'rgb(23,79,46)',
                orange: 'rgb(250,99,65)',
                lightOrange: 'rgb(255,130,102)',
                darkOrange: 'rgb(209,59,25)',
                red: 'rgb(244,55,92)',
                lightRed: 'rgb(252,101,131)',
                veryLightRed: 'rgb(253,242,242)',
                darkRed: 'rgb(181,33,62)',
                gray: 'rgb(198,199,198)',
                lightGray: 'rgb(243,244,246)',
                darkGray: 'rgb(109,117,124)',
                veryDarkGray: 'rgb(73,81,86)',
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            screens: {
                'xs': '0px',    
            },
        },
    },

    plugins: [forms],
};
