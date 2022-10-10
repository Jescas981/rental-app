const { src, dest, watch, parallel } = require('gulp');

const cssnano = require('cssnano');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const terser = require('gulp-terser');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss')
const notify = require('gulp-notify');

const paths = {
    scss: "./assets/scss/**/*.scss",
    js: "./assets/js/**/*.js"
};

function scss() {
    return src(paths.scss)
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/css'))
};

function js() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/js'));
};

function watchFiles() {
    watch(paths.scss, scss);
    watch(paths.js, js);
};

exports.scss = scss;
exports.js = js;

exports.default = parallel(scss, js, watchFiles)