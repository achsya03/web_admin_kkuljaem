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

mix.styles([
    'resources/architectui/main.css',
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'node_modules/sweetalert2/dist/sweetalert2.css',
    'node_modules/jquery-toast-plugin/dist/jquery.toast.min.css',
], 'public/css/app.css')
.scripts([
    'resources/architectui/assets/scripts/main.js',
    'node_modules/ckeditor/ckeditor.js',
    'node_modules/jquery/dist/jquery.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
    'node_modules/sweetalert2/dist/sweetalert2.js',
    'node_modules/jquery-toast-plugin/dist/jquery.toast.min.js',
    'node_modules/moment/min/moment.min.js',
], 'public/js/app.js')
.copy([
    'resources/architectui/assets/fonts',
], 'public/css/assets/fonts');