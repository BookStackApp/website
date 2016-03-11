var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost",
    startPath: 'bookstack-site/public'
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});


gulp.task('styles', function(){
  gulp.src(['sass/**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('public/dist/'))
    .pipe(browserSync.stream())
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('public/dist/'))
    .pipe(browserSync.stream());
});

gulp.task('scripts', function(){
  return gulp.src('scripts/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('main.js'))
    .pipe(babel())
    .pipe(gulp.dest('public/dist/'))
    .pipe(browserSync.stream())
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('public/dist/'))
    .pipe(browserSync.stream())
});

gulp.task('default', ['styles', 'scripts']);

gulp.task('watch', ['browser-sync'], function(){
  gulp.watch(["public/*.*", "public/**/*"], ['bs-reload']);
  gulp.watch('sass/*.scss', ['styles']);
  gulp.watch('scripts/*.js', ['scripts']);
});