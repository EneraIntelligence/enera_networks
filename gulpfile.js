process.env.DISABLE_NOTIFIER = true;
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
    mix.sass('app.scss','public/assets/css/main.css');
    mix.sass('profile.scss','public/assets/css/profile.css');
    mix.sass('loader.scss','public/assets/css/loader.css');
    mix.sass('campaign.scss','public/assets/css/campaign.css');


    //materialize import to public
    mix.copy(
        'node_modules/materialize-css/dist/css/materialize.min.css',
        'public/css/materialize.css'
    );
    mix.copy(
        'node_modules/materialize-css/dist/js/materialize.min.js',
        'public/js/materialize.js'
    );
    mix.copy(
        'node_modules/materialize-css/dist/font',
        'public/font'
    );
});
