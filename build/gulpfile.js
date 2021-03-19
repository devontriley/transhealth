const gulp = require('gulp');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const debug = require('gulp-debug');
//const themePath = 'wp-content/themes/transhealth/';
const themePath = './';
const browserSync = require('browser-sync');
const server = browserSync.create();

scripts = () => {
    return gulp.src([
        themePath + "node_modules/jquery/dist/jquery.js",
        themePath + "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
        themePath + "node_modules/blazy/blazy.js",
        themePath + "node_modules/paper/dist/paper-core.js",
        themePath + "node_modules/@barba/core/dist/barba.umd.js",
        themePath + "node_modules/gsap/dist/gsap.js",
        themePath + "node_modules/svgxuse/svgxuse.js",
        themePath + "js/main.js"
        ], {sourcemaps: true})
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest('./../'));
}

styles = () => 
{
    return gulp.src([
        themePath + 'node_modules/hamburgers/_sass/hamburgers/hamburgers.scss',
        themePath + 'scss/*.scss'
        ])
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./../'))
        //.pipe(debug({title: 'styles:'}));
}

reload = (cb) => 
{
    server.reload();
    cb();
}

serve = (cb) => 
{
    //console.log(server);
    server.init({
        proxy: 'localhost/transhealth',
        open: false,
        notify: false,
        ghostMode: false,
        ui: {
            port: 8001
        }
    });
    cb();
}

watchStyles = () => 
{
    gulp.watch(themePath + 'scss/**/*.scss', gulp.series(styles, reload));
    gulp.watch(themePath + 'js/*.js', gulp.series(scripts, reload));
}

gulp.task('default', gulp.series(scripts, styles, serve, watchStyles));