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
mix.copyDirectory('resources/sass/static/', 'public/css/static');
mix.copyDirectory('resources/js/static/', 'public/js/static');
mix.copyDirectory('resources/fonts/', 'public/fonts');
mix.copyDirectory('resources/images/', 'public/images');
mix.copyDirectory('resources/tabler/', 'public/tabler');

mix.js('resources/js/dashboard/**/*.vue', 'public/js/dashboard/');
mix.js('resources/js/dashboard/**/*.js', 'public/js/dashboard/');

mix.disableNotifications()