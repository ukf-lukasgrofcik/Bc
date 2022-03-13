const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/style.scss', 'public/sass') // Custom SASS

    .styles([ // CSS files
        'resources/assets/template/css/twitter-bootstrap-wizard.min.css',
        'resources/assets/template/css/datatables.min.css',
        'resources/assets/template/css/select2.min.css',
        'resources/assets/template/css/bootstrap.min.css',
        'resources/assets/template/css/icons.min.css',
        'resources/assets/template/css/app.min.css',
        'public/sass/style.css', // Custom CSS
    ], 'public/css/style.min.css')

    .scripts([ // JS files
        'resources/assets/template/js/jquery.min.js',
        'resources/assets/template/js/bootstrap.min.js',
        'resources/assets/template/js/metismenu.min.js',
        'resources/assets/template/js/simplebar.min.js',
        'resources/assets/template/js/node-waves.min.js',
        'resources/assets/template/js/waypoints.min.js',
        'resources/assets/template/js/jquery-counterup.min.js',
        'resources/assets/template/js/datatables.min.js',
        'resources/assets/template/js/bootstrap-filestyle.min.js',
        'resources/assets/template/js/select2.min.js',
        'resources/assets/template/js/twitter-bootstrap-wizard.min.js',
        'resources/assets/template/js/form-wizard.init.js',
        'resources/assets/template/js/app.min.js',
        'resources/assets/js/script.js', // Custom JS
    ], 'public/js/script.min.js');
