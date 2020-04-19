/**
 * Gulp project builder
 */
var gulp = require('gulp'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	sass = require('gulp-sass'),
	flags = {
		production: false
	};

gulp.task(
	'compile.plugin',
	function (doneCallBack) {
		if (flags.production) {
			gulp.src(['src/js/block.js'])
				.pipe(concat('easy-icon-grid-block.min.js'))
				.pipe(uglify())
				.pipe(gulp.dest('assets/js'));
			gulp.src(['src/js/widget.js'])
				.pipe(concat('easy-icon-grid-widget.min.js'))
				.pipe(uglify())
				.pipe(gulp.dest('assets/js'));
		} else {
			gulp.src(['src/js/block.js'])
				.pipe(concat('easy-icon-grid-block.min.js'))
				.pipe(gulp.dest('assets/js'));
			gulp.src(['src/js/widget.js'])
				.pipe(concat('easy-icon-grid-widget.min.js'))
				.pipe(gulp.dest('assets/js'));
		}

		gulp.src(['src/scss/admin.scss'])
			.pipe(concat('easy-icon-grid-admin.min.css'))
			.pipe(sass({ outputStyle: 'compressed', includePaths: ['src/scss'] }))
			.pipe(gulp.dest('assets/css'));

		gulp.src(['src/scss/frontend.scss'])
			.pipe(concat('easy-icon-grid-frontend.min.css'))
			.pipe(sass({ outputStyle: 'compressed', includePaths: ['src/scss'] }))
			.pipe(gulp.dest('assets/css'));

		doneCallBack();
	}
);

gulp.task('production', function (doneCallback) { flags.production = true; doneCallback(); });

gulp.task('compile', gulp.parallel('compile.plugin'));