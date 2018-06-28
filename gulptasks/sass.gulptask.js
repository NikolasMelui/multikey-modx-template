const $ = require('gulp-load-plugins')({
	rename: {
		'gulp-clean-css': 'cleancss',
	},
});

const gulp = require('gulp4'),
	combiner = require('stream-combiner2').obj;

const isDevelopment = process.env.NODE_ENV == 'development';

module.exports = options => {
	return () => {
		return combiner(
			gulp.src(options.src),
			$.debug({ title: 'Get SASS src:' }),
			$.if(isDevelopment, combiner($.sourcemaps.init(), $.debug({ title: 'Init SASS sourcemaps:' }))),
			$.sass({ outputStyle: 'expand' }),
			$.rename({ suffix: '.min', prefix: '' }),
			$.autoprefixer(['last 15 versions']),
			$.if(!isDevelopment, $.cleancss()),
			$.if(isDevelopment, combiner($.sourcemaps.write(), $.debug({ title: 'Write SASS sourcemaps:' }))),
			gulp.dest('assets/css'),
			$.debug({ title: 'Wtite CSS to dest:' })
		).on('error', error => console.log(error));
	};
};
