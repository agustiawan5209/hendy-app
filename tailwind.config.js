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
                inter: ['Inter', ],
            },
        },
    },
    daisyui: {
        themes: [{
            mytheme: {

                "primary": "#269d9d",

                "secondary": "#F000B8",

                "accent": "#335B8A",

                "neutral": "#3D4451",

                "base-100": "#FFFFFF",

                "info": "#0c4a6e",

                "success": "#36D399",

                "warning": "#FBBD23",

                "error": "#F87272",
            },
        }, ],
    },

    plugins: [require('@tailwindcss/forms'), require("daisyui")],
};
