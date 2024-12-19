<?php if (!defined('ABSPATH')) exit;
/**
 * THEME MAIN FUNCTIONS FILE
 *
 * CONTENTS:
 * - Banner noidex
 * - Custom Pagination
 * - Custom Blocks with ACF
 * - Register Thumbnail & Navigation Menus
 * - Include scripts & styles
 * - Bootstrap 5 Navwalker
 * - Custom WP API endpoints
 * - Yoast Meta Box to bottom of page editor
 */

// Banner di avviso noidex
function robots_notice()
{
    if (get_option('blog_public') == 0) :
        echo '<div class="error notice"><p style="font-size:14px;"><b>Attenzione!!!</b> Modifica l\'impostazione del noindex altrimenti google non indicizzerà il sito!!!</p></div>';
    endif;
}
add_action('admin_notices', 'robots_notice');

if (class_exists('ACF')) {
    // Custom Pagination
    // require_once(dirname(__FILE__) . '/core/theme_pagination.php');

    // Custom Blocks with ACF
    // require_once(dirname(__FILE__) . '/blocks/register-blocks.php');
}

// Register Thumbnail & Navigation Menus
require_once(dirname(__FILE__) . '/core/theme_features_nav.php');

// Include scripts & styles
require_once(dirname(__FILE__) . '/core/theme_site-scripts.php');

// Compatibility for bootstrap 5 classes on WP nav menus
require_once(dirname(__FILE__) . '/core/class-wp-bootstrap-navwalker.php');

// Custom WP API endpoints
//require_once( dirname( __FILE__ ) . '/core/theme_wp_api.php' );

/**
 *  Yoast Meta Box to bottom of page editor
 */
function pd_yoast_to_bottom()
{
    return 'low';
}
add_filter('wpseo_metabox_prio', 'pd_yoast_to_bottom');

/**
 * TESTING MAIL SMTP
 */
function setup_phpmailer_init($phpmailer)
{
    $phpmailer->Host = 'smtp.mailtrap.io';   // for example, smtp.mailtrap.io
    $phpmailer->Port = 2525;                 // set the appropriate port: 465, 2525, etc.
    $phpmailer->Username = 'b00b814c4a876e'; // your SMTP username
    $phpmailer->Password = 'c692e2a0c745e9'; // your SMTP password
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = 'tls'; // preferable but optional
    $phpmailer->IsSMTP();
}
add_action('phpmailer_init', 'setup_phpmailer_init');
