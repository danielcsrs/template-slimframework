'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
 
sass.compiler = require('node-sass');
 
gulp.task('sass', function () {
  return gulp.src('./resources/assets/sass/app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./public/assets/css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./resources/assets/sass/**/*.scss', ['sass']);
});