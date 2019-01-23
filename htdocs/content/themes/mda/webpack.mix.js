let mix = require('laravel-mix');

mix.options({
  processCssUrls: false
});

mix.copyDirectory('assets/fonts', 'dist/fonts');

mix.js('assets/js/theme.js', 'dist/js/theme.min.js')
    .sass('assets/sass/style.scss', 'dist/css/theme.css');
