var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
var rtlcss = require('gulp-rtlcss');
var rename = require("gulp-rename");
const errorHandler = require('gulp-error-handle');
//var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var gutil = require('gulp-util');
var lec = require('gulp-line-ending-corrector');

//main task
gulp.task('default', function(){
	// gulp.watch('scss/**/*.scss', ['sass-wellco', 'rtl-wellco', 'rtl-wellco-give', 'rtl-wellco-shop','rtl-wellco-events-2', 'rtl-wellco-events-3', 'sass-custom-admin-wellco']);
	gulp.watch('scss/**/*.scss', gulp.series('sass-wellco', 'rtl-wellco', 'rtl-wellco-give', 'rtl-wellco-shop','rtl-wellco-events-2', 'rtl-wellco-events-3', 'sass-custom-admin-wellco'));
})

//gulp.task('develop', gulp.series('sass-wellco', 'rtl-wellco'))


//Task 1 - scss to css
gulp.task('sass-wellco', function(){
	return gulp.src(
		[
		'scss/**/*.scss',
		'!scss/**/custom-theme-color.scss',
		'!scss/custom-admin.scss'
		]
	)
	.pipe(errorHandler())
	.pipe(sass()) // Using gulp-sass
	.pipe(lec()) // gulp-line-ending-corrector
	.pipe(gulp.dest('css'))
});

//Task 2 - css to rtl-css
gulp.task('rtl-wellco', function () {
	return gulp.src('../assets/css/style-main.css')
	.pipe(rtlcss())
	.pipe(rename('style-main-rtl.css'))
	.pipe(lec()) // gulp-line-ending-corrector
	.pipe(gulp.dest('css/'));
});

gulp.task('sass-custom-admin-wellco', function(){
  return gulp.src(
    [
    'scss/custom-admin.scss'
    ]
  )
  .pipe(errorHandler())
  .pipe(sass()) // Using gulp-sass
  .pipe(lec()) // gulp-line-ending-corrector
  .pipe(gulp.dest('../admin/assets/css'))
});

//Task 4 - css to rtl-css give
gulp.task('rtl-wellco-shop', function () {
	return gulp.src('../assets/css/shop/woo-shop.css')
	.pipe(rtlcss())
	.pipe(rename('woo-shop-rtl.css'))
	.pipe(lec())
	.pipe(gulp.dest('css/shop/'));
});

//Task 4 - css to rtl-css give
gulp.task('rtl-wellco-give', function () {
	return gulp.src('../assets/css/give/give-elementor.css')
	.pipe(rtlcss())
	.pipe(rename('give-elementor-rtl.css'))
	.pipe(lec())
	.pipe(gulp.dest('css/give/'));
});

//Task 5 - css to rtl-css events
gulp.task('rtl-wellco-events-2', function () {
	return gulp.src('../assets/css/tribe-events/the-events-calendar.css')
	.pipe(rtlcss())
	.pipe(rename('the-events-calendar-rtl.css'))
	.pipe(lec())
	.pipe(gulp.dest('css/tribe-events/'));
});

//Task 5 - css to rtl-css events
gulp.task('rtl-wellco-events-3', function () {
	return gulp.src('../assets/css/tribe-events/the-events-calendar-responsive.css')
	.pipe(rtlcss())
	.pipe(rename('the-events-calendar-responsive-rtl.css'))
	.pipe(lec())
	.pipe(gulp.dest('css/tribe-events/'));
});