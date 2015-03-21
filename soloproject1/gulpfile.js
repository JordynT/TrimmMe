var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');


gulp.task('sass', function () {
    gulp.src('./src/*.scss')
        .pipe(sass())
        .pipe(autoprefixer({
                browsers: ['last 5 versions'],
                cascade: false
            }))
        .pipe(gulp.dest('./css'));
});


gulp.task('js', function() {

  return gulp.src([
  		'js/src/**/*.js' 
      // './bower_components/jquery-knob/js/jquery.knob.js', 
      // './bower_components/jquery/dist/jquery.js'
  	])
    .pipe(concat('build.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js/'));

});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(['js/src/**/*.js'], ['js']);
	//gulp.watch(['./src/*.scss'], ['sass']);
  console.log('watch');
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['js', 'sass','watch']);