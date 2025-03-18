const gulp = require('gulp');
// const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const imagemin = require('gulp-imagemin');
const sourceMaps = require('gulp-sourcemaps');
const autoprefixer = require("gulp-autoprefixer");
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const replace = require('gulp-replace');
const terser = require('gulp-terser');
const postcss = require('gulp-postcss');
const browserSync = require("browser-sync").create();
const cssnano = require('cssnano');
const cleanCSS = require('gulp-clean-css');

// All paths
const paths = {
  php: {
    src: ['./assets/**/*.php'],
    dest: './dist/',
  },
  images: {
    src: ['./assets/img/**/*'],
    dest: './dist/img/',
  },
  copyFonts: {
    src: ['./assets/fonts/**/*'],
    dest: './dist/fonts/',
  },
  styles: {
    src: ['./assets/scss/**/*.scss'],
    dest: './dist/css/',
  },
  scripts: {
    src: ['./assets/js/**/*.js'],
    dest: './dist/js/',
  },
  copycss: {
    src: ['./assets/css/**/*.css'],
    dest: './dist/css/',
  },
  cachebust: {
    src: ['./dist/wp_enqueue.php'],
    dest: './dist/wp_enqueue.php',
  },
};

// browserSync
const server = function(cb) {
  browserSync.init({
    notify: false,
    proxy: 'https://rodosdreamtours.local',
    port: 3016,
    https: true,
    open: true,
  });

  cb();
}

const compileSass = function() {
  return gulp.src(paths.styles.src)
    .pipe(sourceMaps.init()) // Odpalenie sourceMap przed działaniem na plikach
    .pipe(
      sass({
        outputStyle: 'compressed' //styl kodu - extended, compressed
      }).on('error', sass.logError)
    )
    .pipe(autoprefixer()) // Należy wskazać jakie przeglądarki, najlepiej w pliku package.json
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourceMaps.write('.')) // Przed wypuszczeniem (.dest) dodajemy opcje .write, z ('.') zapisuje do osobnego pliku np. style.css.map
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream());
}

// const html = function() {
//   return gulp.src('src/**/*.html')
//     .pipe(gulp.dest('dist'))
//     .pipe(browserSync.stream());
// }

function image() {
  return gulp.src(paths.images.src)
    .pipe(imagemin([
      imagemin.gifsicle({interlaced: true}),
      imagemin.mozjpeg({quality: 75, progressive: true}),
      imagemin.optipng({optimizationLevel: 5}),
      imagemin.svgo({
        plugins: [
          {removeViewBox: false},
          {cleanupIDs: false}
        ]
      })
    ]).on('error', (error) => console.log(error)))
    .pipe(gulp.dest(paths.images.dest));
}

function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(terser().on('error', (error) => console.log(error)))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(browserSync.stream());
}

const php = function() {
  return gulp.src(paths.php.src)
    .pipe(gulp.dest(paths.php.dest))
    .pipe(browserSync.stream());
}

const copyFonts = function() {
  return gulp.src(paths.copyFonts.src)
    .pipe(gulp.dest(paths.copyFonts.dest))
    .pipe(browserSync.stream());
}

const copyCss = function() {
  return gulp.src(paths.copycss.src)
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.copycss.dest))
    .pipe(browserSync.stream());
}

const watch = function(cb) {
    gulp.watch(paths.styles.src, gulp.series(compileSass));
    gulp.watch(paths.scripts.src, gulp.series(scripts));
    gulp.watch(paths.copycss.src, gulp.series(copyCss));
    gulp.watch(paths.php.src).on("change", gulp.series(php), browserSync.reload);
    gulp.watch(paths.images.src, gulp.series(image));
    gulp.watch('./**/*.php').on("change", browserSync.reload);
    cb();
}

exports.default = gulp.series(watch, server);
exports.build = gulp.series(compileSass, scripts, php, image, copyCss, copyFonts, watch, server);
exports.compileSass = compileSass;
exports.php = php;
exports.watch = watch;
exports.scripts = scripts;
exports.image = image;
exports.copyCss = copyCss;
exports.copyFonts = copyFonts;