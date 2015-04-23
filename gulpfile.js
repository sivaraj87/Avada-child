var gulp = require('gulp'),
    sass = require('gulp-ruby-sass');

gulp.task('styles', function() {
  return sass('sass')
    .pipe(gulp.dest('css'));
});
