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
  src: './assets/sass/main.sass'
});

lazyRequireTask('commonjs', './gulptasks/commonjs.gulptask.js', {
  src: './assets/js/common.js'
});

lazyRequireTask('js', './gulptasks/js.gulptask.js', {
  src: [
    './assets/libs/jquery/dist/jquery.min.js',
    './assets/libs/inputmask/dist/min/inputmask/inputmask.min.js',
    './assets/libs/inputmask/dist/min/inputmask/jquery.inputmask.min.js',
    './assets/js/common.min.js' // Always required last
  ]
});

lazyRequireTask('server', './gulptasks/server.gulptask.js', {
  src: 'assets'
});

gulp.task('watch', () => {
  gulp.watch('./assets/sass/**/*.sass', gulp.series('sass'));
  gulp.watch('./assets/js/common.js', gulp.series('commonjs', 'js'));
  gulp.watch('./assets/libs/**/*.js', gulp.series('js'));
});

gulp.task(
  'default',
  gulp.series(
    gulp.parallel('sass', gulp.series('commonjs', 'js')),
    gulp.parallel('server', 'watch')
  )
);
