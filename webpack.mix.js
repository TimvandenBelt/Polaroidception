const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css")
    .webpackConfig(require("./webpack.config"));

mix.options({
    hmrOptions: {
        host: "localhost", // Requires adding entry on /etc/hosts file if I want
        port: 8585, // to use laravel.test but localhost, 127.0.0.1
    },
    postCss: [
        require("postcss-import"),
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("postcss-easing-gradients"),
        require("autoprefixer"),
    ],
});

if (!mix.inProduction()) {
    mix.sourceMaps();
}

if (mix.inProduction()) {
    mix.version();
}
