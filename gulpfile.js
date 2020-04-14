const gulp = require('gulp'),
      sass = require('gulp-sass'),
      postcss = require('gulp-postcss'),
      autoprefixer = require('autoprefixer'),
      cssnano = require('cssnano'),
      imagemin = require('gulp-imagemin');
var responsive = require('gulp-responsive-images');

sass.compiler = require('node-sass');
 
gulp.task('styles', function () {
  var processors = [
    autoprefixer(),
    cssnano()
  ];
  return gulp.src('src/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(processors))
        .pipe(gulp.dest('dist/css/'));
});

gulp.task('imagemin', async function () {
  gulp.src('./src/img/**/*')
    .pipe(imagemin())
    .pipe(gulp.dest('./dist/img'))
});

gulp.task('fonts', function() {
  return gulp.src('src/scss/fonts/*.ttf')
    .pipe(gulp.dest('dist/css/fonts/'));
});

gulp.task('copyHTML', function() {
  return gulp.src('src/**/*.html')
    .pipe(gulp.dest('dist/'));
});

gulp.task('watch', function () {
  gulp.watch('./src/scss/**/*.scss', gulp.series('styles'));
  console.log('gulp is watching for SCSS changes 👀');
  gulp.watch('.src/**/*.html', gulp.series('copyHTML'));
  console.log('gulp is watching for changes in HTML files ⌨️');
  return
});

gulp.task('default', gulp.series('imagemin', 'fonts', 'copyHTML', 'styles', 'watch'));

// gulp.task('srcset', function(){
//   return gulp.src('./src/img/belga.png}')
//     .pipe(
//       responsive({
//         'belga.png': [{
//           width: 300,
//           rename: { suffix: '-300' }
//         }, {
//           width: 350,
//           rename: { suffix: '-350' }
//         }, {
//           width: 700,
//           rename: { suffix: '-700' }
//         }]
//     }))
//     .pipe(gulp.dest('./src/img/thumbnails'))
// });