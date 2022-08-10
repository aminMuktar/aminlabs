const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'white': '#ffffff',
            'input-grey':'#aeafb0',
            'custom': {
                100:'#242738',
               

            //   100: '#cffafe',
            //   200: '#a5f3fc',
            //   300: '#67e8f9',
            //   400: '#22d3ee',
            //   500: '#06b6d4',
            //   600: '#0891b2',
            //   700: '#0e7490',
            //   800: '#155e75',
            //   900: '#164e63',
            },
            // 
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
