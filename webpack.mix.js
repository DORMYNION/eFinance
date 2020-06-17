const path = require('path');
const mix = require('laravel-mix');



mix.webpackConfig({
   resolve: {
      alias: {
         "@": ".."
      }
   }
});



/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css', {
   implementation: require('node-sass')
});

mix.copy('../eFinance_ui/public', 'public');