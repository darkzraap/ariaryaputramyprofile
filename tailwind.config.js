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
            animation : {
                'slide' : 'slide 10s linear infinite',
                'scrollLeft' : 'scrollLeft 40s linear infinite'
            },
             keyframes: {
        // Definisi @keyframes untuk 'slide'
        scrollLeft: {
            to : {
                transform : 'translateX(-156rem)'
            },

        transitionDelay: {
    1: '0s',
    2: '3.33s',
    3: '6.66s',
    4: '10s',
    5: '13.33s',
    6: '16.66s',

  },
        },
    


    },

            colors: {
                ungu: 'var(--color-ungu)',
                sub: 'var(--color-sub)',
                dasar: 'var(--color-dasar)',
                itam : 'var(--color-itam)',
                mera : 'var(--color-mera)',
                kuning : 'var(--color-kuning)',
                oren : 'var(--color-oren)',
                biru : 'var(--color-biru)',
                pin : 'var(--color-pin)'
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                libre: ['Libre Franklin' , 'sans-serif'],
                inter: ['Inter', 'sans-serif']
            },
        },
    },

    plugins: [forms],
};
