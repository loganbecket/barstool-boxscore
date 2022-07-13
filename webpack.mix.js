const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        tailwindcss("tailwind.config.js")
    ])
    .webpackConfig({
        plugins: [
            new VuetifyLoaderPlugin(),
        ],
    });

