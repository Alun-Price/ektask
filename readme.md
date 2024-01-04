**Task** : to build a responsive homepage with some basic Craft CMS integration.

Figma : `see link`

The project requires docker to be running and DDEV to be installed (see [DDEV Installation](https://ddev.readthedocs.io/en/stable/))

Start the project

`ddev start`

Stop the project

`ddev stop`

Launch the Craft CMS admin console

`ddev launch admin`

Run in watch mode

`npm run watch:css`

Build the css

`npm run build:css`

We'll' be using Tailwind and here's the config so far.

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

**Typography**

The site's typography was updated based on the following suggested styles ..

| Mobile           | MD               | LG               | XL               |
| ---------------- | ---------------- | ---------------- | ---------------- |
| h1 - 45px        | h1 - 54px        | h1 - 90px        | h1 - 96px        |
| h2 - 28px        | h2 - 36px        | h2 - 42px        | h2 - 48px        |
| h3 - 24px        | h3 - 28px        | h3 - 38px        | h3 - 42px        |
| -                | h4 - 26px        | h4 - 36px        | h4 - 36px        |
| -                | h5 - 24px        | h5 - 32px        | -                |
| -                | h6 - 22px        | h6 - 30px        | h6 - 30px        |
| p - large - 18px | p - large - 18px | p - large - 22px | p - large - 22px |
| p - 16px         | p - 16px         | p - 20px         | p - 20px         |

The following was added to the tailwind base css layer;

```js

@layer base {
  h1,
  .h1 {
    @apply text-[45px] font-bold leading-[55px] md:text-[54px] lg:text-[90px] lg:leading-[100px] xl:text-[96px] xl:leading-[108px];
  }

  h2,
  .h2 {
    @apply text-[28px] leading-[34px] font-bold md:text-[36px] md:leading-[44px] lg:text-[42px] lg:leading-[60px] xl:text-[48px];
  }

  h3,
  .h3 {
    @apply text-[24px] leading-[38px] font-bold md:text-[28px] md:leading-[44px] lg:text-[38px] xl:text-[42px];
  }

  h4,
  .h4 {
    @apply md:text-[26px] font-bold lg:text-[36px] xl:text-[36px];
  }

  h5,
  .h5 {
    @apply md:text-[24px] font-bold md:leading-[34px] lg:text-[32px] lg:leading-[42px] xl:text-[36px] xl:leading-[46px];
  }

  h6,
  .h6 {
    @apply md:text-[22px] font-bold lg:text-[30px] xl:text-[30px];
  }

  plarge,
  .plarge {
    @apply text-[18px] font-normal leading-[30px] md:text-[18px] md:leading-[28px] lg:text-[22px] lg:leading-[36px] xl:text-[22px];
  }

  p,
  .p {
    @apply text-[16px] leading-[26px] md:text-[16px] lg:text-[20px] lg:leading-[34px] xl:text-[20px];
  }
}
```

### Self Hosting the Open Sans Font

Initially I used the following links to bring in the font;

````<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> ```

````

but then decided to self-host to avoid the issues with 3rd party Google Font hosting and speed up access.

The fonts live in the @web/static/fonts folder and are accessed via some custom base layer css.

```
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
  @font-face {
    font-family: 'Open Sans';
    font-weight: 400;
    src: url('web/static/fonts/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2')
      format('woff2');
  }
  ,
  @font-face {
    font-family: 'Open Sans';
    font-weight: 700;
    src: url('web/static/fonts/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-mu0SC55I.woff2')
      format('woff2');
  }

```

### Compressing Images

All svg's were passed through [SVGOMG](https://svgomg.net/) with the `comp` suffix denoting a file compressed in this way.
