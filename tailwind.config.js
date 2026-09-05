// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Pastikan ini 'class' untuk toggle manual JS
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
                // Contoh jika ingin menambah warna biru kustom
                // 'portfolio-blue': {
                //     'light': '#abcdef',
                //     'DEFAULT': '#007bff', // Warna biru utama
                //     'dark': '#0056b3',
                // }
            },
        },
    },

    plugins: [forms],
};