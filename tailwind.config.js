const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                orbitron:['Orbitron'],
                montserrat:['Montserrat']
            },
            backgroundImage:{
                'auth-bg':"url(/public/assets/background/Looper.png)"
            },
            colors:{
                'box':'#FFFFFF',
            }
        },
    },
    daisyui: {
        themes: [
          {
            customLight: {
            
   "primary": "#34d399",
            
   "secondary": "#1c1917",
            
   "accent": "#98f29d",
            
   "neutral": "#111",
            
   "base-100": "#eee",
            
   "info": "#8AAFF5",
            
   "success": "#a3e635",
            
   "warning": "#facc15",
            
   "error": "#f43f5e",
            },
            customDark: {
          
                "primary": "#34d399",
                         
                "secondary": "#44403c",
                         
                "accent": "#bbf7d0",
                         
                "neutral": "#eee",
                         
                "base-100": "#111",
                         
                "info": "#67e8f9",
                         
                "success": "#bef264",
                         
                "warning": "#fde047",
                         
                "error": "#f87171",
                         },
          },
        ],
      },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),require("daisyui"),require('flowbite/plugin')],
};
