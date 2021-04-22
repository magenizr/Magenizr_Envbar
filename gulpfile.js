var gulp = require('gulp');
var gulpless = require('gulp-less');

gulp.task('styles', function () {
    return gulp.src(['view/adminhtml/web/less/source/styles.less'])
        .pipe(gulpless())
        .pipe(gulp.dest('view/adminhtml/web/css/source/'))
});
