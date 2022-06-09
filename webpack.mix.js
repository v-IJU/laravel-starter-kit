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

mix.js(
    ["resources/js/app.js", "resources/assets/backend/extrajs/app.js"],
    "public/js"
)
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .js(
        "resources/assets/backend/extrajs/Location.js",
        "public/js/location.js"
    );
