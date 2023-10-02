const mix = require('laravel-mix');
// const exec = require('child_process').exec;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const glob = require('glob')
// const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    (glob.sync('resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/');
        cb(f, f.replace('resources', 'public'));
    });
}

// Definindo pasta public
mix.setPublicPath('public');

// themes Core stylesheets
mixAssetsDir('sass/admin/core/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css')));

// pages Core stylesheets
mixAssetsDir('sass/admin/pages/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css')));

// Themescss task
mixAssetsDir('sass/admin/plugins/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css')));

mixAssetsDir('sass/site/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css')));

// script js
mixAssetsDir('js/core/**/*.js', (src, dest) => mix.js(src, dest));

// custom script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest));

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/vendors', 'public/vendors');
mix.copyDirectory('resources/data', 'public/data');
mix.copyDirectory('resources/plugins', 'public/plugins');
mix.copyDirectory('resources/css/site', 'public/css/site');

mix.copy('node_modules/@popperjs/core/dist/umd/popper.min.js', 'public/js/core/libraries/popper/popper.js').sourceMaps();
mix.copy('node_modules/components-unison/js/unison.js', 'public/js/core/libraries/unison/unison.js').sourceMaps();
mix.copy('node_modules/jquery-mask-plugin/dist/jquery.mask.js', 'public/js/core/libraries/jquery-mask-plugin/jquery-mask.js').sourceMaps();
mix.copy('node_modules/jquery-confirm/dist/jquery-confirm.min.js', 'public/js/core/libraries/jquery-confirm/jquery-confirm.js').sourceMaps();

mix.sass('resources/sass/admin/bootstrap-extended.scss', 'public/css/admin')
    .sass('resources/sass/admin/bootstrap.scss', 'public/css/admin')
    .sass('resources/sass/admin/colors.scss', 'public/css/admin')
    .sass('resources/sass/admin/components.scss', 'public/css/admin')

mix.version();

// descomentar para visualizar log de erro
// mix.webpackConfig({
//     stats: {
//         children: true
//     }
// });
