const mix = require('laravel-mix');
require('mix-env-file');

mix.env(process.env.ENV_FILE)

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
    .js('resources/js/components/example3/example.js', 'public/js') // 최상위 루트의 경로
    .vue()
    //.sass('resources/sass/app.scss', 'public/css')
    .css('resources/css/app.css', 'public/css')
    .version() // JS / CSS
    .browserSync({
        proxy: process.env.APP_URL
    });
