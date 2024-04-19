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


// Uglify for default layout
mix.styles([
    'resources/css/argon/nucleo-icons.css',
    'resources/css/argon/nucleo-svg.css',
    'resources/css/argon/font-awesome.css',
    'resources/css/argon/argon-design-system.css',
    'resources/css/argon/devops-center.scss'
], 'public/css/theme.min.css');

mix.scripts([
    'resources/js/argon/core/jquery.min.js',
    'resources/js/argon/core/popper.min.js',
    'resources/js/argon/core/bootstrap.min.js',
    'resources/js/argon/plugin/flatpickr.min.js',
    'resources/js/argon/argon-design-system.js',
    'resources/js/devops-center.js'
], 'public/js/theme.min.js');

// Uglify for Sub Pages layout
mix.styles([
    'resources/css/argon/nucleo-icons.css',
    'resources/css/argon/nucleo-svg.css',
    'resources/css/argon/font-awesome.css',
    'resources/css/select2/select2.css',
    'resources/css/argon/argon-design-system.css',
    'resources/css/argon/devops-center.scss'
], 'public/css/app.min.css');

mix.scripts([
    'resources/js/argon/core/jquery.min.js',
    'resources/js/argon/core/popper.min.js',
    'resources/js/argon/core/bootstrap.min.js',
    'resources/js/argon/plugin/flatpickr.min.js',
    'resources/js/argon/argon-design-system.js'
], 'public/js/app.min.js');

// Uglify for Admin layout
mix.styles([
    'resources/css/argon/nucleo-icons.css',
    'resources/css/argon/nucleo-svg.css',
    'resources/css/argon/font-awesome.css',
    'resources/css/slick/slick.css',
    'resources/css/select2/select2.css',
    'resources/css/flatpickr/flatpickr.min.css',
    'resources/css/datatables/datatables.min.css',
    'resources/css/simditor/simditor.css',
    'resources/css/argon/argon-design-system.css',
    'resources/css/argon/devops-center.scss'
], 'public/css/otheme.min.css');

mix.scripts([
    'resources/js/argon/core/jquery.min.js',
    'resources/js/argon/core/popper.min.js',
    'resources/js/argon/core/bootstrap.min.js',
    'resources/js/argon/argon-design-system.js',
    'resources/js/argon/plugin/flatpickr.min.js',
], 'public/js/otheme.min.js');