import mix from 'laravel-mix';

mix.js('resources/jss/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);
