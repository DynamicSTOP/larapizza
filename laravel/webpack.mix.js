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

// TODO combine css

mix.scripts([
    'resources/js/plugins/jquery-3.4.1.min.js',
    'resources/js/plugins/popper.min.js',
    'resources/js/plugins/waypoint.js',
    'resources/js/plugins/bootstrap.min.js',
    'resources/js/plugins/jquery.magnific-popup.min.js',
    'resources/js/plugins/jquery.slimScroll.min.js',
    'resources/js/plugins/imagesloaded.min.js',
    'resources/js/plugins/jquery.steps.min.js',
    'resources/js/plugins/jquery.countdown.min.js',
    'resources/js/plugins/isotope.pkgd.min.js',
    'resources/js/plugins/slick.min.js',
    'resources/js/map.js',
    'resources/js/main.js'
    ], 'public/assets/js/vendor.js').version()
    .js('resources/js/app.js', 'public/assets/js').version()
    .sass('resources/sass/app.scss', 'public/assets/css/app.css').version();
