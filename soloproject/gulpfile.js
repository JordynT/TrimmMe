var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

// var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.less('app.less');
// });


gulp.task('sass', function () {
    gulp.src('./public/scss/*.scss')
        .pipe(sass())
        .pipe(autoprefixer({
                browsers: ['last 5 versions'],
                cascade: false
            }))
        .pipe(gulp.dest('./public/css'));
});


gulp.task('js', function() {

  return gulp.src([
      './bower_components/jquery/dist/jquery.js',
      './bower_components/handlebars/handlebars.js',
  		'./public/js/*.js'
  	])
    .pipe(concat('build.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));

});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(['./public/js/*.js'], ['js']);
	gulp.watch(['./public/scss/*.scss'], ['sass']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'js', 'sass']);