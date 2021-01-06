const mix = require('laravel-mix');

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

mix.react('resources/website/js/app.js', 'public/website/js')
    .sass('resources/website/sass/app.scss', 'public/website/css')
    .styles('resources/website/css/*', 'public/website/css/vendor.css');

mix.js('resources/js/vendor.js', 'public/js')
    .scripts('resources/js/app/*', 'public/js/app.js')
    .sass('resources/sass/vendor.scss', 'public/css')
    .styles('resources/css/*', 'public/css/app.css')

    // .js('resources/website/js/vendor.js', 'public/website/js')
    // .scripts('resources/website/js/app/*', 'public/website/js/app.js')
    // .sass('resources/website/sass/vendor.scss', 'public/website/css')
    // .styles('resources/website/css/*', 'public/website/css/app.css');

    if (mix.inProduction()) {
        mix.version();
    }