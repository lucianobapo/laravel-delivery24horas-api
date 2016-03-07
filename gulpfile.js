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
    mix.sass('scss/ionic.scss');

    //mix.styles([
    //    'ionic.min.css'
    //], 'public/css/app.compiled.css');

    mix.scripts([
        'ionic.bundle.min.js',
        'app.js'
    ], 'public/js/app.compiled.js');

    mix.version([
        'public/js/app.compiled.js',
        'public/css/ionic.css'
        //'public/css/app.compiled.css'
    ]);

    //mix.sass('app.scss');
    //mix.phpUnit();
});
