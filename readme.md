**Task** : to build a responsive homepage with some basic Craft CMS integration.

Figma : `see link`

The project requires docker to be running and DDEV to be installed (see [DDEV Installation](https://ddev.readthedocs.io/en/stable/))

`npx tailwindcss  --output web/static/css/styles.css --watch`

Start the project

`ddev start`

Stop the project

`ddev stop`

Launch the Craft CMS admin console

`ddev launch admin`

We'll' be using Tailwind and here's the config so far. We could maybe do with reducing the colour options and finessing it a bit to take on the regularly used typography in the project

**Tailwind.config.js**

```@type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: ['templates/**/*.twig'],
  theme: {
    screens: {
      sm: '376px',
      md: '769px',
      lg: '1441px',
      xl: '1921px',
    },
    extend: {
      colors: {
        primaryorange: {
          50: '#fef4ee',
          100: '#fde6d7',
          200: '#fac8ae',
          300: '#f7a17a',
          400: '#f26839',
          500: '#ef4c20',
          600: '#e03316',
          700: '#ba2314',
          800: '#941f18',
          900: '#771c17',
          950: '#400a0a',
        },
        primarywhite: '#FFFFFF',
        primaryblack: {
          50: '#f6f6f6',
          100: '#e7e7e7',
          200: '#d1d1d1',
          300: '#b0b0b0',
          400: '#888888',
          500: '#6d6d6d',
          600: '#5d5d5d',
          700: '#4f4f4f',
          800: '#454545',
          900: '#3d3d3d',
          950: '#272727',
        },
        pgrey: '#4F4F4F',
        pgrey: {
          50: '#f6f6f6',
          100: '#e7e7e7',
          200: '#d1d1d1',
          300: '#b0b0b0',
          400: '#888888',
          500: '#6d6d6d',
          600: '#5d5d5d',
          700: '#4f4f4f',
          800: '#454545',
          900: '#3d3d3d',
          950: '#262626',
        },
        bgrey: '#EBEBEB',

        floralwhite: '#FFF9EB',
        thistle: '#DED1DE',
        mintgreen: '#CEECE0',
        formoutline: '#F0E7DC',
        transparent: 'transparent',
        currentColor: 'currentColor',
      },
      content: {
        arrowDownIcon: ['url("../images/dropdown-arrow.svg")'],
      },
      fontFamily: {
        sans: ['"Open Sans"'],
      },
    },
  },
  plugins: [],
};
```
