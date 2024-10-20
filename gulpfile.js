/* eslint-disable no-undef */
const { src, dest, series, watch } = require('gulp');
const browsersync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');
require('dotenv').config({
  path: '.env'
});

const jsonVars = {
  proxy: process.env.PROXY
};

const cssSource = 'src/scss';

function buildJs() {
  return src(`src/js/index.js`)
    .pipe(webpackStream(webpackConfig))
    .pipe(rename({ extname: '.min.js' }))
    .pipe(dest('static/js/'));
}

function moveJsVendors() {
  return src(`src/js/vendor/*.js`).pipe(dest('static/js/vendor'));
}

function moveFonts() {
  return src(`src/fonts/**/*.woff`).pipe(dest('static/fonts'));
}

function buildScss() {
  const plugins = [autoprefixer(), cssnano()];
  return src(`${cssSource}/index.scss`)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(plugins))
    .pipe(
      rename({
        extname: '.min.css'
      })
    )
    .pipe(sourcemaps.write())
    .pipe(dest(`static/css/`));
}

function bsReload(cb) {
  browsersync.reload();
  cb();
}

exports.buildJs = buildJs;
exports.buildScss = buildScss;

exports.watch = function() {
  browsersync.init({
    proxy: `${jsonVars.proxy}`, // TODO: create a .env file and set PROXY=yourlocalurl
    open: true,
    injectChanges: true
  });

  watch(
    ['src/js/**/*.js', 'src/scss/**/*.scss', './**/*.twig'],
    { ignoreInitial: false },
    series(buildJs, buildScss, moveJsVendors, moveFonts, bsReload)
  );
};

exports.default = series(buildJs, buildScss, moveJsVendors, moveFonts);
