const gulp = require('gulp');
const sass = require ('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify');


function compilaSass() {
    return gulp
    .src('assets/scss/main.scss')
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('assets/css'))
    .pipe(browserSync.stream()); // atualiza os arquivos, sem que seja necessário um reload do browser
}

// Função para iniciar o browser
function browser(){
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
}

function watch() {
    gulp.watch('assets/scss/*.scss', compilaSass);
    gulp.watch('./assets/js/*.js', gulpJS);
    gulp.watch(['*.html']).on('change', browserSync.reload);
}

function gulpJS(){
    return gulp
    .src('./assets/js/*.js')
    .pipe(uglify())
    .pipe(browserSync.stream());
}

gulp.task('sass', compilaSass);
gulp.task('browser-sync', browser);
gulp.task('watch', watch);
gulp.task('mainjs', gulpJS);

gulp.task('default', gulp.parallel('watch', 'browser-sync', 'sass', 'mainjs'));