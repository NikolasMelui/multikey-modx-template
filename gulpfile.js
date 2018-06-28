'use strict';

const gulp = require('gulp');

const lazyRequireTask = (taskName, path, options) => {
	options = options || {};
	options.taskName = taskName;
	gulp.task(taskName, callback => {
		let task = require(path).call(this, options);
		return task(callback);
	});
};

lazyRequireTask('sass', './gulptasks/sass.gulptask.js', {
	src: './assets/sass/main.sass',
});

lazyRequireTask('commonjs', './gulptasks/commonjs.gulptask.js', {
	src: './assets/js/common.js',
});

lazyRequireTask('js', './gulptasks/js.gulptask.js', {
	src: [
		'./assets/libs/jquery/index.js',
		'./assets/libs/inputmask/index.js',
		'./assets/libs/fullpage/index.js',
		'./assets/libs/mmenu/index.js',
		'./assets/libs/slider/index.js',
		'./assets/libs/popup/index.js',
		'./assets/libs/linkactivator/index.js',
		'./assets/js/common.min.js', // Always required last
	],
});

lazyRequireTask('server', './gulptasks/server.gulptask.js');

gulp.task('watch', () => {
	gulp.watch('./assets/sass/**/*.sass', { usePolling: true }, gulp.series('sass'));
	gulp.watch('./assets/js/common.js', { usePolling: true }, gulp.series('commonjs', 'js'));
	gulp.watch('./assets/libs/**/*.js', { usePolling: true }, gulp.series('js'));
});

gulp.task('default', gulp.series(gulp.series('sass', 'commonjs', 'js'), gulp.parallel('server', 'watch')));
