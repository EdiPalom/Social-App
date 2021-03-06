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

mix.options({
   processCssUrls: false 
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
       
    ]);

mix.js('resources/js/post.js','public/js');
mix.js('resources/js/comment.js','public/js');

mix.postCss('resources/css/normalize.css','public/css');
mix.postCss('resources/css/mobile-l.css','public/css');
mix.postCss('resources/css/tablet.css','public/css');
mix.postCss('resources/css/laptop.css','public/css');
