const gulp = require('gulp');
const plumber = require('gulp-plumber');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const minifycss = require('gulp-minify-css');
const sass = require('gulp-sass');

gulp.task('styles', function() {
  return gulp.src(['themes/bookstack/sass/**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('themes/bookstack/static/css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('themes/bookstack/static/css/'));
});


gulp.task('default', gulp.series('styles'));

gulp.task('watch', function() {
  gulp.watch('themes/bookstack/sass/**/*.scss', gulp.series('styles'));
});