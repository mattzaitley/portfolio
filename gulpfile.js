var gulp = require('gulp'),
	sass = require('gulp-ruby-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	// minifycss = require('gulp-minify-css'),
	// jshint = require('gulp-jshint'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	plumber = require('gulp-plumber'),
	notify = require('gulp-notify'),
	cache = require('gulp-cache'),
	livereload = require('gulp-livereload'),
	del = require('del');

gulp.task('styles', function() {
	return gulp.src('src/scss/*.scss')
		.pipe(plumber({errorHandler: notify.onError("Sass error!")}))
		.pipe(sass({ style: 'expanded' }))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(gulp.dest('./'))
		// .pipe(rename({suffix: '.min'}))
		// .pipe(minifycss())
		// .pipe(gulp.dest('./'))
		// .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
	return gulp.src('src/js/**/*.js')
		.pipe(plumber({errorHandler: notify.onError("JS error!")}))
		// .pipe(jshint('.jshintrc'))
		// .pipe(jshint.reporter('default'))
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest('js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('js'))
		// .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('images', function() {
	return gulp.src('src/img/**/*')
		.pipe(plumber())
		.pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
		.pipe(gulp.dest('img'))
		.pipe(notify({ message: 'Images task complete' }));
});

gulp.task('clean', function(cb) {
	del(['css', 'js', 'img'], cb)
});

gulp.task('default', ['clean'], function() {
	gulp.start('styles', 'scripts', 'images');
});

gulp.task('watch', function() {

	// Watch .scss files
	gulp.watch('src/scss/**/*.scss', ['styles']);

	// Watch .js files
	gulp.watch('src/js/**/*.js', ['scripts']);

	// Watch image files
	gulp.watch('src/img/**/*', ['images']);

	// Create LiveReload server
	livereload.listen();
	 
	// Watch any files in dist/, reload on change
	gulp.watch(['dist/**']).on('change', livereload.changed);

});