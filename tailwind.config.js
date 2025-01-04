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
      colors: {
        primary: {
          gold: '#F9A602',
          goldShade: '#FFD700',
        },
        blackBackground: '#1E1E1E',
        blackShader: '#252525',
        text: {
          white: '#FFFFFF',
          mutedGrey: '#A0AEC0',
        },
        link: {
          goldLinks: '#F9A602',
          hover: '#FFD700',
        },
      },
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        cursive: ['Dancing Script', 'cursive'],
        nunito: ['Nunito', 'sans-serif'],
        brushScript: ['Brush Script MT', 'cursive'],
        roboto: ['Roboto Condensed', 'sans-serif'],
        fredoka: ['Fredoka One', 'sans-serif'],
        baby : ['Oooh Baby', 'cursive']
      },
    },
  },

  plugins: [forms],
};