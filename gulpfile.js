var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
gulp.task('css', function() {
   gulp.src('resources/assets/sass/main.scss')
       .pipe(sass())
       .pipe(autoprefixer('last 10 version'))
       .pipe(gulp.dest('public/css'));
});

// when running gulp watch it will look in the specified
// directory for anything ending in scss and when
// one of those files is changed we run the css task (above)
gulp.task('watch', function() {
   gulp.watch('resources/assets/sass/**/*.scss', ['css']);
});


// here we define what happens by default when we type
// gulp in the terminal, in this case it runs
// gulp watch
gulp.task('default', ['watch']);

/*elixir(function(mix) {
    mix.sass('main.scss');
});*/