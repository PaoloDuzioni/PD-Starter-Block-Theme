# SITE NAME THEME

## WordPress info

- WordPress min version: 6.5.2

## General info

- ACF 6+
- Bootstrap 5.3.3+
- FontAwesome Pro version 5
- Swiper slider 11
- sass to convert scss to css and minify
- PostCSS with autoprefixer for production build
- esbuild for last generation JS transpiling and minify
- BrowserSync for live reload and external link for testing on mobile devices

## First steps

Move the `.gitignore` file on the root directory of your project.

Rename the theme folder as you wish.

## Development

### Install node dependencies

1. Move on the theme folder: `cd wp-content/themes/your-theme`

2. Install dependencies: `npm install`

    This include last generation JS transpiling, scss compilation, autoprefixing and browser live reload with HMR.

3. Set the proxy path in `.browser-sync.js` to proxy the developement dev to your own local or remote server url.

### Start live server

1. Move on the theme folder: `cd wp-content/themes/your-theme`

2. Start the dev server: `npm run dev`

## Build for production

**This step is important:** the development mode produce **huge** file sizes and are not optimized for production.

1. Move on the theme folder: `cd wp-content/themes/your-theme`

2. Make sure to stop the dev server if it's running.

3. Run `npm run prod` to build the optimised version of JS and CSS files.
4. Now is possible to preview the production version of the site with esternal link for testing on mobile devices with `npm run serve`.

## Custom Blocks Activation with ACF Blocks

To activate custom blocks with ACF Blocks you need to do the following steps:

- Decomment the require *Custom Blocks with ACF* in `functions.php`.
- Decomment the block scss styles in `src/scss/app.scss`.
- Decomment *Enqueue blocks back-end styles.* in `core/theme_site-scripts.php` to allow the style of the block even on the back-end.

In `blocks/` folder you can find the example of a custom block with ACF, called `banner`. It contains the php, scss and json files for definition, logic and style of the block. You can use this block as a template for your custom blocks.

In this folder you can find also `register-blocks.php` file, where you can register your custom blocks.
