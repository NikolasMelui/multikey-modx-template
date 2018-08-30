const $ = require('gulp-load-plugins')({
	rename: {
		'gulp-uglify': 'uglify',
	},
});

const gulp = require('gulp'),
	combiner = require('stream-combiner2').obj;

const isDevelopment = process.env.NODE_ENV == 'development';

module.exports = options => {
	return () => {
		return combiner(
			gulp.src(options.src),
			$.debug({ title: 'Get JS src:' }),
			$.concat('scripts.min.js'),
			$.if(!isDevelopment, $.uglify()),
			gulp.dest('./assets/js'),
			$.debug({ title: 'Write JS to dest:' })
		).on('error', $.notify.onError());
	};
};
