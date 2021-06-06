const projectFolder = "dist";
const sourceFolder = "src";

const path = {
  build: {
    html: projectFolder + "/",
    css: projectFolder + "/css/",
    js: projectFolder + "/js/",
    images: projectFolder + "/images/",
    fonts: projectFolder + "/fonts/",
  },
  src: {
    html: [sourceFolder + "/*.html", "!" + sourceFolder + "/_*.html"],
    css: sourceFolder + "/scss/style.scss",
    js: sourceFolder + "/js/*.js",
    images: sourceFolder + "/images/**/*.{jpg,png,svg,gif,ico,webp}",
    fonts: sourceFolder + "/fonts/*",
  },
  watch: {
    html: sourceFolder + "/**/*.html",
    css: sourceFolder + "/scss/**/*.scss",
    js: sourceFolder + "/js/**/*.js",
    images: sourceFolder + "/images/**/*.{jpg,png,svg,gif,ico,webp}",
    fonts: sourceFolder + "/fonts/*",
  },
  clean: "./" + projectFolder + "/",
};

const { src, dest } = require("gulp");
const gulp = require("gulp");
const browsersync = require("browser-sync").create();
const del = require("del");
const scss = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const cleanCss = require("gulp-clean-css");
const rename = require("gulp-rename");
const imagemin = require("gulp-imagemin");
const webpack = require("webpack-stream");

function browserSync() {
  browsersync.init({
    server: {
      baseDir: "./" + projectFolder + "/",
    },
    port: 3000,
    notify: false,
  });
}

function html() {
  return src(path.src.html)
    .pipe(dest(path.build.html))
    .pipe(browsersync.stream());
}

function css() {
  return src(path.src.css)
    .pipe(
      scss({
        outputStyle: "expanded",
      })
    )
    .pipe(
      autoprefixer({
        overrideBrowserslist: ["last 5 versions"],
        cascade: true,
      })
    )
    .pipe(dest(path.build.css))
    .pipe(cleanCss())
    .pipe(rename({ extname: ".min.css" }))
    .pipe(dest(path.build.css))
    .pipe(browsersync.stream());
}

function fonts() {
  return src(path.src.fonts)
    .pipe(dest(path.build.fonts))
    .pipe(browsersync.stream());
}

function buildDevdJs() {
  return src(path.src.js)
    .pipe(
      webpack({
        mode: "development",
        output: {
          filename: "bundle.js",
        },
        watch: true,
        devtool: "source-map",
        module: {
          rules: [
            {
              test: /\.m?js$/,
              exclude: /(node_modules|bower_components)/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [
                    [
                      "@babel/preset-env",
                      {
                        debug: true,
                        corejs: 3,
                        useBuiltIns: "usage",
                      },
                    ],
                  ],
                },
              },
            },
          ],
        },
      })
    )
    .pipe(dest(path.build.js));
}

function buildProdJs() {
  return src(path.src.js)
    .pipe(
      webpack({
        mode: "production",
        output: {
          filename: "bundle.js",
        },
        module: {
          rules: [
            {
              test: /\.m?js$/,
              exclude: /(node_modules|bower_components)/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [
                    [
                      "@babel/preset-env",
                      {
                        corejs: 3,
                        useBuiltIns: "usage",
                      },
                    ],
                  ],
                },
              },
            },
          ],
        },
      })
    )
    .pipe(dest(path.build.js));
}

function images() {
  return src(path.src.images)
    .pipe(
      imagemin({
        progressiv: true,
        svgoPlugins: [{ removeViewBox: false }],
        interlaced: true,
        optimizationLevel: 3,
      })
    )
    .pipe(dest(path.build.images))
    .pipe(browsersync.stream());
}

function watchFiles() {
  gulp.watch([path.watch.html], html);
  gulp.watch([path.watch.css], css);
  gulp.watch([path.watch.js], buildDevdJs);
  gulp.watch([path.watch.images], images);
  gulp.watch([path.watch.fonts], fonts);
}

function clean() {
  return del(path.clean);
}

const build = gulp.series(
  clean,
  gulp.parallel(buildDevdJs, css, html, images, fonts)
);
const watch = gulp.parallel(build, watchFiles, browserSync);

exports.fonts = fonts;
exports.images = images;
exports.buildDevdJs = buildDevdJs;
exports.css = css;
exports.html = html;
exports.build = build;
exports.watch = watch;
exports.default = watch;
