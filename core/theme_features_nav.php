<?php if (!defined('ABSPATH')) exit;

/**
 * ADD THEME FEATURES:
 *
 * - Thumbnails (Featured Image)
 * - Custom thumbnail sizes
 * - Custom Menus
 * - Woocommerce compatibility declaration
 *
 */

function pd_theme_setup()
{
    /**
     * ALLOW POST THUMBNAIL
     */
    add_theme_support('post-thumbnails');

    /**
     * CUSTOM THUMBNAIL sizes
     *
     * add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
     * add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
     */
    //add_image_size('size-1920', 1920);


    /**
     * REGISTER CUSTOM MENU
     */
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu')
        )
    );
    

    /**
     * DECLARE WOOCOMMERCE THEME COMPATIBILITY
     */
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'pd_theme_setup');
