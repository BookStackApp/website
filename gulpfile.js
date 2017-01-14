var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');

gulp.task('styles', function(){
  gulp.src(['themes/bookstack/sass/**/*.scss'])
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


gulp.task('default', ['styles']);

gulp.task('watch', function() {
    gulp.watch('themes/bookstack/sass/**/*.scss', ['styles']);
});