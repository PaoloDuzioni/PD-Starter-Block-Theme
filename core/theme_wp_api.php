<?php if (!defined('ABSPATH')) exit;

/**
 * THEME WP API CUSTOM ENDPOINTS
 *
 * https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
 */


/**
 * GET POSTS END POINT
 *
 * API URL: http://yoursite.com/wp-json/pd/v1/posts/
 */
add_action('rest_api_init', function () {
    /**
     * Registering of a new route
     *
     * https://developer.wordpress.org/reference/functions/register_rest_route/
     *
     * @param1 - namespace
     * @param2 - route
     * @param3 - args
     */
    register_rest_route('pd/v1', '/posts', array(
        'methods' => 'GET',
        'callback' => 'pd_get_posts',
    ));
});

/*** Calback for the new route ***/
function pd_get_posts($data)
{
    //print debug log to php error log
    error_log(print_r($data, true));

    // Perform your query
    $posts = get_posts();

    // Return the results
    if (empty($posts)) {
        return null;
    }
    return $posts;
}
