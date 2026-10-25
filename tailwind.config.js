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
                sans:    ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Playfair Display', 'Georgia', 'serif'],
                body:    ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                forest: {
                    50:  '#f2f7f2',
                    100: '#e0ede0',
                    200: '#c2dac2',
                    300: '#96be97',
                    400: '#639e65',
                    500: '#3d7e3f',
                    600: '#2d6530',
                    700: '#255128',
                    800: '#1e4020',
                    900: '#193521',
                    950: '#0c1f10',
                },
                earth: {
                    50:  '#faf7f2',
                    100: '#f3ece0',
                    200: '#e5d6be',
                    300: '#d4ba95',
                    400: '#c09870',
                    500: '#ad7e54',
                    600: '#9a6849',
                    700: '#80543d',
                    800: '#694536',
                    900: '#573a2e',
                    950: '#2f1d17',
                },
                amber: {
                    50:  '#fffbeb',
                    100: '#fef3c7',
                    200: '#fde68a',
                    300: '#fcd34d',
                    400: '#fbbf24',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                    800: '#92400e',
                    900: '#78350f',
                    950: '#451a03',
                },
                // Add sikatan brand colors for quick use
                sikatan: {
                    green:  '#2d6530',
                    brown:  '#9a6849',
                    orange: '#d97706',
                    cream:  '#f3ece0',
                },
            },
            backgroundImage: {
                'hero-pattern': "url('/images/hero-bg.jpg')",
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
                'fade-in':    'fadeIn 0.5s ease-out forwards',
                'slide-in':   'slideIn 0.6s ease-out forwards',
            },
            keyframes: {
                fadeInUp: {
                    '0%':   { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%':   { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideIn: {
                    '0%':   { opacity: '0', transform: 'translateX(-20px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
