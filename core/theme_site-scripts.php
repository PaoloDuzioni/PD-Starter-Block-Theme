<?php if (!defined('ABSPATH')) exit;

/**
 * Enqueue front-end scripts and styles.
 */
function pd_theme_styles(): void
{
    // CSS
    wp_enqueue_style('gfonts-css', 'https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');
    wp_enqueue_style('vendors-css', get_template_directory_uri() . '/dist/css/vendors.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/css/app.css');

    // JS
    wp_enqueue_script('main_js', get_template_directory_uri() . '/dist/js/app.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'pd_theme_styles');

/**
 * Admin CSS
 */
function styles_admin(): void
{
    wp_enqueue_style('admin-css', get_template_directory_uri() . '/dist/css/style-admin.css', array(), null);
}
add_action('admin_enqueue_scripts', 'styles_admin');

