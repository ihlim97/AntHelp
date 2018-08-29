var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
var browserSync = require("browser-sync").create();

gulp.task("default", ["hello", "js", "serve"]);

gulp.task("sass", function () {
    return gulp.src(["src/scss/*.scss"])
        .pipe(plumber()) // prevent gulp from crashing during sass re-compile
        .pipe(sass())
        .pipe(gulp.dest("src/css"))
        .pipe(browserSync.stream());
});

gulp.task("js", function () {
    return gulp.src(["node_modules/bootstrap/dist/js/bootstrap.min.js", "node_modules/jquery/dist/jquery.min.js", "node_modules/popper.js/dist/popper.min.js"])
        .pipe(gulp.dest("src/js"))
        .pipe(browserSync.stream());
});

gulp.task("serve", ["sass"], function () {

    browserSync.init({
        server: "./src"
    });

    gulp.watch(["src/scss/**/*.scss"], ["sass"]);
    gulp.watch("src/*.html").on("change", browserSync.reload);
});

gulp.task("hello", function() {
    console.log("Hello world!");
});