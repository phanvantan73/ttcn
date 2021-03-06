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

mix.copy('resources/assets/css/', 'public/css/')
	.copy('resources/assets/js/', 'public/js/')
	.copy('resources/assets/image/', 'public/image/')
	.copy('resources/assets/img/', 'public/img/')
	.copy('resources/assets/files/', 'public/files/')
	.copy('resources/assets/svg/', 'public/svg/')
	.copy('resources/assets/favicon.ico', 'public/favicon.ico');
