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
                lato_bold: ['lato-bold'],
                lato_regural: ['lato-regural'],
                lato_thin: ['lato-thin'],
                lato_light: ['lato-light'],
            },
            colors: {
                "primary-color": "var(--primary-color)",
                "secondary-color": "var(--secondary-color)",
                "third-color": "var(--third-color)",
                "forth-color": "var(--forth-color)",
                "myPrimary": '#FF1919',

            },
        },
        backgroundImage: theme => ({
            'hero-image': "url('{{ asset('images/heroSectionImg.jpg') }}')",
        }),
    },

    plugins: [forms],
};
