var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .styles([
        './bower_components/bootstrap/dist/css/bootstrap.css',
        './bower_components/font-awesome/css/font-awesome.css',
        'dataTables.bootstrap.css'
    ], 'public/css/styles.css')
    .scripts([
        './bower_components/jquery/dist/jquery.js',
        './bower_components/bootstrap/dist/js/bootstrap.js',
        'jquery.dataTables.js',
    ], 'public/js/scripts.js')
    .copy([
        './bower_components/font-awesome/fonts',
        './bower_components/bootstrap/dist/fonts'
    ],'public/fonts');
});
