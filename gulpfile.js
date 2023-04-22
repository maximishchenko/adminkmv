var gulp = require('gulp');
var svgSprite = require('gulp-svg-sprite');

gulp.task('svgSprite', function () {
    return gulp.src('./frontend/web/img/svg/*.svg')
        .pipe(svgSprite({
                mode: {
                    stack: {
                        sprite: "../sprite.svg"
                    }
                },
            }
        ))
        .pipe(gulp.dest('./frontend/web/img/'));
});