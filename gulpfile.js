process.env.DISABLE_NOTIFIER=true;
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
    var files = [
        'app',
        'article',
        'admin/app',
        'admin/article',
        'admin/auth',
        'admin/form',
        'admin/nav'
    ];

    files.forEach(file => mix.less(file+".less","public/css/"+file+".css"));
});
