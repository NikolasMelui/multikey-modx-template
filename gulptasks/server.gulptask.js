const gulp = require('gulp4');
const browserSync = require('browser-sync');

module.exports = options => {
	return () => {
		browserSync({
			notify: true,
			port: 8081,
		});
		gulp.watch('assets/**/*.{sass,css,js}').on('change', function() {
			browserSync.reload();
		});
	};
};
