/*
 |--------------------------------------------------------------------------
 | Browser-sync config file
 |--------------------------------------------------------------------------
 |
 | For up-to-date information about the options:
 |   http://www.browsersync.io/docs/options/
 |
 */
module.exports = {
    proxy: 'https://localhost/site-test/', // Set here the url of your site
    notify: false,
    open: false,
    // Reloads the browser when PHP files change.
    files: [
        'dist/css/app.css',
        'dist/css/vendors.css',
        'dist/js/app.js',
        '**/*.php',
        '**/*.twig',
    ],
};
