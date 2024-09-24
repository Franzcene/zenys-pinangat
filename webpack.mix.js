const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css');

mix
    .styles([
        'resources/css/bootstrap.min.css',
        'resources/css/your-template-style.css',
    ], 'public/css/all.css')
    .scripts([
        'resources/js/bootstrap.bundle.min.js',
        'resources/js/your-template-script.js',
    ], 'public/js/all.js');

