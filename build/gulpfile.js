const gulp = require('gulp');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const debug = require('gulp-debug');
const themePath = 'wp-content/themes/transhealth/';
const browserSync = require('browser-sync');
const server = browserSync.create();

scripts = () => {
    return gulp.src([
        themePath + "build/node_modules/jquery/dist/jquery.js",
        themePath + "build/node_modules/bootstrap/dist/js/bootstrap.bundle.js",
        themePath + "build/node_modules/blazy/blazy.js",
        themePath + "build/node_modules/paper/dist/paper-core.js",
        themePath + "build/node_modules/@barba/core/dist/barba.umd.js",
        themePath + "build/node_modules/gsap/dist/gsap.js",
        themePath + "build/node_modules/svgxuse/svgxuse.js",
        themePath + "build/js/main.js"
        ], {sourcemaps: true})
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest(themePath));
}

styles = () => 
{
    return gulp.src([
        themePath + 'build/node_modules/hamburgers/_sass/hamburgers/hamburgers.scss',
        themePath + 'build/scss/*.scss'
        ])
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('style.css'))
        .pipe(gulp.dest(themePath))
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
    gulp.watch(themePath + 'build/scss/**/*.scss', gulp.series(styles, reload));
    gulp.watch(themePath + 'build/js/*.js', gulp.series(scripts, reload));
}

gulp.task('default', gulp.series(scripts, styles, serve, watchStyles));