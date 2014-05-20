var gulp = require('gulp');

var $ = require('gulp-load-plugins')();

var dir = {
    sass: {
        source: 'app/assets/sass',
        target: 'public/assets/frontend/css'
    },
    js: {
        source: 'app/assets/js',
        target: 'public/assets/frontend/js'
    },
    partials: {
        source: 'app/assets/partials',
        target: 'public/assets/frontend/partials'
    },
    fonts: {
        source: 'app/assets/fonts',
        target: 'public/assets/frontend/fonts'
    },
    img: {
        source: 'app/assets/img',
        target: 'public/assets/frontend/img'
    }
}

gulp.task('css', function () {
    return gulp.src(dir.sass.source + '/main.scss')
        .pipe($.rubySass({ style: 'compressed' }).on('error', $.util.log))
        .pipe($.autoprefixer('last 5 version'))
        .pipe(gulp.dest(dir.sass.target))
        .pipe($.notify('Css updated'));
});

gulp.task('js', function () {
    return gulp.src(dir.js.source + '/**/*.js')
        .pipe($.size())
        .pipe(gulp.dest(dir.js.target))
        .pipe($.notify('Js updated'));
});

gulp.task('partials', function () {
    return gulp.src(dir.partials.source + '/**/*.html')
        .pipe(gulp.dest(dir.partials.target))
        .pipe($.notify('Partials updated'));
});

gulp.task('fonts', function () {
    return gulp.src(dir.fonts.source + '/**/*')
        .pipe(gulp.dest(dir.fonts.target))
        .pipe($.notify('Fonts updated'));
});

gulp.task('img', function () {
    return gulp.src(dir.img.source + '/**/*')
        .pipe(gulp.dest(dir.img.target))
        .pipe($.notify('Fonts updated'));
});

gulp.task('watch', function () {
    gulp.watch(dir.sass.source + '/**/*.scss', ['css']);
    gulp.watch(dir.js.source + '/**/*.js', ['js']);
    gulp.watch(dir.partials.source + '/**/*.html', ['partials']);
    gulp.watch(dir.fonts.source + '/**/*', ['fonts']);
    gulp.watch(dir.img.source + '/**/*', ['img']);
});

gulp.task('default', ['css', 'js', 'partials', 'fonts', 'img', 'watch']);
