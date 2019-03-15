var gulp = require("gulp");
var babel = require("gulp-babel");
var sass = require("gulp-sass");

// TODO: set up minify tasks
gulp.task("sass", function() {
  return gulp
    .src("src/scss/*.scss")
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest("dist/css"));
});

gulp.task("script", function() {
  return gulp
    .src("src/js/*.js")
    .pipe(
      babel({
        presets: ["@babel/react"],
      }),
    )
    .pipe(gulp.dest("dist/js"));
});

gulp.task("watch", function() {
  gulp.watch("src/scss/*.scss", gulp.series(["sass"]));
  gulp.watch("src/js/*.js", gulp.series(["script"]));
});

// gulp.task("build", [`clean`, `sass`, `useref`, `images`, `fonts`], function() {
//   console.log("Building files");
// });

gulp.task("build", gulp.series("sass", "script"));

// gulp.task("build", ["sass", "script"], function(cb) {
//   //console.log("Building files");
//   cb();
// });

// gulp.task("build", function(cb) {
//   gulp.series(["sass", "script"]);
//   // gulp.series(["jsx"]);
//   cb();
// });
