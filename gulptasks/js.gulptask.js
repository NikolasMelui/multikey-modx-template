const $ = require('gulp-load-plugins')();

const gulp = require('gulp'),
  combiner = require('stream-combiner2').obj;

module.exports = options => {
  return () => {
    return combiner(
      gulp.src(options.src),
      $.debug({ title: 'Get JS src:' }),
      $.concat('scripts.min.js'),
      gulp.dest('./assets/js'),
      $.debug({ title: 'Write JS to dest:' })
    ).on('error', $.notify.onError());
  };
};
