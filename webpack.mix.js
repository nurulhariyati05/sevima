let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.bundle.js')
	.webpackConfig({
	    output: { 
	        chunkFilename: 'jsc/[name].bundle.js',
	        publicPath: '/',
	    },
	});

mix.version();