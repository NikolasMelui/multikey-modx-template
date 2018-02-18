const browserSync = require('browser-sync').create();

module.exports = options => {
  return () => {
    browserSync.init({ server: { baseDir: options.src }, notify: false, open: false });
    browserSync.watch('./assets/**/*.{sass,css,js,html,php}').on('change', browserSync.reload);
  };
};
