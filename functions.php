<?php if (!defined('ABSPATH')) exit;
/**
 * THEME MAIN FUNCTIONS FILE
 *
 * CONTENTS:
 * - Init Timber
 * - Banner noindex
 * - Register Thumbnail & Navigation Menus
 * - Include scripts & styles
 * - Custom Blocks with ACF
 * - Custom WP API endpoints
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Initialize Timber.
Timber\Timber::init();


// Banner di avviso noindex
function robots_notice() : void
{
    if (get_option('blog_public') == 0) :
        echo '<div class="error notice"><p style="font-size:14px;"><b>Attenzione!</b> Modifica l\'impostazione del noindex altrimenti google non indicizzerà il sito!!!</p></div>';
    endif;
}
add_action('admin_notices', 'robots_notice');


// Register Thumbnail & Navigation Menus
require_once(dirname(__FILE__) . '/core/theme_features_nav.php');

// Include scripts & styles
require_once(dirname(__FILE__) . '/core/theme_site-scripts.php');

// Theme setup (menus in context, theme options in context, ecc...)
require_once(dirname(__FILE__) . '/core/theme_setup.php');

// Custom WP API endpoints
//require_once( dirname( __FILE__ ) . '/core/theme_wp_api.php' );


// Custom Blocks with ACF
 require_once(dirname(__FILE__) . '/core/theme_blocks.php');
/**
 * TESTING MAIL SMTP
 */
function setup_phpmailer_init($phpmailer) :void
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
