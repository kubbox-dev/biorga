var gulp          = require('gulp');
var $             = require('gulp-load-plugins')();
var gulpSass      = require('gulp-sass')(require('sass'));
var autoprefixer  = require('autoprefixer');
var sftp          = require('gulp-sftp');
var fs            = require('fs');

var sassPaths = [
  'node_modules/foundation-sites/scss',
  'node_modules/motion-ui/src'
];

function sass() {
  return gulp.src('assets/scss/theme.scss')
    .pipe(gulpSass({
      includePaths: sassPaths,
      outputStyle: 'compressed'
    })
      .on('error', gulpSass.logError))
    .pipe($.postcss([
      autoprefixer({ overrideBrowserslist: ['last 2 versions', 'ie >= 9'] })
    ]))
    .pipe(gulp.dest('assets/css'))
};

function icons() {
  return gulp.src('assets/scss/icons.scss')
    .pipe(gulpSass({
      outputStyle: 'compressed'
    })
      .on('error', gulpSass.logError))
    .pipe($.postcss([
      autoprefixer({ overrideBrowserslist: ['last 2 versions', 'ie >= 9'] })
    ]))
    .pipe(gulp.dest('assets/css'))
};

// task for deploying files on the server
function deploy(){
var config = {
    "host": "34.198.69.163",
    "user": "bitnami",
    "port": "22",  
    "remote_path": "/opt/bitnami/apps/joomla/htdocs/biorganicos/wp-content/themes/biorga/",
    "ssh_key_file": "~/.ssh/testserver.pem",
}

const globs = [
        'assets/css/theme.css',
];

var conn = sftp({
  host: config.host,
  user: config.user,
  key: config.ssh_key_file,
  port: config.port,
  remotePath: config.remote_path,
});


return gulp.src(globs, { base: '.', buffer: false } )
.pipe(conn)
}

function serve() {
  gulp.watch("assets/scss/*.scss", deploy);
  gulp.watch("assets/scss/*.scss", sass);
}

gulp.task('sass', sass);
gulp.task('serve', gulp.series('sass', serve));
gulp.task('default', gulp.series('sass', serve));
gulp.task('deploy', deploy);