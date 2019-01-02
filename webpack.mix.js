const mix = require('laravel-mix');
const webpack = require('webpack');

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

mix.webpackConfig({
  plugins: [
    // other plugin configs
    new webpack.SourceMapDevToolPlugin({
      exclude: ['popper.js']
    })
  ]
})
  .js('resources/js/bootstrap.js', 'public/js')
  .js('resources/js/admin.js', 'public/js')
  .js('resources/js/public.js', 'public/js')
  .sass('resources/sass/bootstrap.scss', 'public/css')
  .sass('resources/sass/admin.scss', 'public/css')
  .sass('resources/sass/public.scss', 'public/css')
