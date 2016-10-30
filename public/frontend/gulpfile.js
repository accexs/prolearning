var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var LessAutoprefix = require('less-plugin-autoprefix');
var autoprefix = new LessAutoprefix({ browsers: ['last 2 versions'] });
var browserSync = require('browser-sync').create();


gulp.task('default', function () {
	gulp.start('watch');
});

gulp.task('watch', ['browser-sync'], function() {
	gulp.watch('./**/*.html')
		.on('change', browserSync.reload );
	gulp.watch('./bower_components/bootstrap/less/**/*.less', ['styles'] );
	console.log('Frontend watchers started');
});

gulp.task('styles', function () {
	console.log('Compiling style files');
	gulp.src('./bower_components/bootstrap/less/bootstrap.less')
		.pipe(less({
      		paths: [ path.join(__dirname, 'less', 'includes') ],
      		plugins: [ autoprefix ]
		}).on('error', function(err){
			console.log(err);
		}))
		.pipe(gulp.dest('./bower_components/bootstrap/dist/css'))
		.pipe(browserSync.reload({stream:true}));
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "prolearning.local"
    });
});
