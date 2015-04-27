var gulp = require('gulp'),
    sass = require('gulp-ruby-sass');

gulp.task('styles', function() {
  return sass('sass', {
    bundleExec: true
  })
    .pipe(gulp.dest('css'));
});
