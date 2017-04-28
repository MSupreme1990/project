'use strict';

let path = require('path'),
    del = require('del'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    gulpif = require('gulp-if'),
    autoprefixer = require('gulp-autoprefixer'),
    csso = require('gulp-csso'),
    imagemin = require('gulp-imagemin'),
    watch = require('gulp-watch'),
    plumber = require('gulp-plumber'),
    browserSync = require('browser-sync').create(),
    flatten = require('gulp-flatten'),
    bsConfig = require('./browser-sync.config');

let isProd = process.env.NODE_ENV == 'production';

let dst = {
    scss: '../public/css',
    js: '../public/js',
    images: '../public/images',
    fonts: '../public/fonts'
};

let paths = {
    images: './images/**/*{.jpg,.jpeg,.png}',
    fonts: './fonts/**/*{.otf,.eot,.ttf,.svg,.woff,.woff2}',
    scss: [
        './scss/**/*.scss',
        './fonts/**/*.css'
    ],
};

let sassOptions = {
    includePaths: [
        path.join(__dirname, "node_modules/flexy-framework")
    ]
};

gulp.task('images', () => {
    return gulp.src(paths.images)
        .pipe(gulp.dest(dst.images))
        .pipe(gulpif(isProd, imagemin()))
        .pipe(browserSync.stream());
});

gulp.task('fonts', () => {
    return gulp.src(paths.fonts)
        .pipe(flatten())
        .pipe(gulp.dest(dst.fonts));
});

gulp.task('css', ['fonts'], () => {
    return gulp.src(paths.scss)
        .pipe(plumber())
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(concat('bundle.css'))
        .pipe(autoprefixer({
            browsers: [
                '>1%',
                'last 4 versions',
                'Firefox ESR',
                'not ie < 9', // React doesn't support IE8 anyway
            ]
        }))
        .pipe(csso())
        .pipe(gulp.dest(dst.scss))
        .pipe(browserSync.stream());
});

gulp.task('clean', () => {
    return del.sync(['../public/'], { force: true });
});

gulp.task('build', ['clean'], () => {
    return gulp.start(['css', 'images']);
});

gulp.task('browser-sync', () => {
    browserSync.init(bsConfig)
});

gulp.task('serve', ['build', 'browser-sync'], () => {
    watch(paths.images, () => {
        gulp.start('images');
        browserSync.reload();
    });

    watch(paths.scss, () => {
        gulp.start('css');
    });

    watch(paths.fonts, () => {
        gulp.start('css');
    });

    watch([
        '../templates/**/*.html',
        '../../../../../app/Resources/templates/**/*.html',
    ], () => {
        browserSync.reload();
    });
});

gulp.task('default', () => {
    return gulp.start('build');
});
