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

mix.js('resources/js/app.js', 'public/js').extract(['vue','axios'])	
	// .js('resources/js/main.js','public/js')	
	.sass('resources/sass/app.scss', 'public/css')	
	.copyDirectory('resources/img','public/img')
	.copyDirectory('resources/icon-fonts','public/icon-fonts')
	.copyDirectory('node_modules/mdbootstrap/css', 'public/vendor/mdbootstrap/css')
	.copyDirectory('node_modules/mdbootstrap/font', 'public/vendor/mdbootstrap/font')
	.copyDirectory('node_modules/mdbootstrap/js', 'public/vendor/mdbootstrap/js')
	
	if (mix.inProduction()) {
    	mix.version();
	}