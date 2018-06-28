const $ = require('gulp-load-plugins')();

const gulp = require('gulp4'),
	combiner = require('stream-combiner2').obj;

const isDevelopment = process.env.NODE_ENV == 'development';

module.exports = options => {
	return () => {
		return combiner(
			gulp.src(options.src),
			$.debug({ title: 'Get commonJS src:' }),
			$.if(!isDevelopment, $.uglify()),
			$.concat('common.min.js'),
			gulp.dest('./assets/js'),
			$.debug({ title: 'Wtire commonJS to dest:' })
		).on('error', $.notify.onError());
	};
};
