<?php
add_filter('timber/context', 'add_to_context');

/**
 * Global Timber context.
 *
 * @param array $context Global context variables.
 *
 * - Menu registration
 */
function add_to_context($context)
{
    $context['menu'] = Timber::get_menu('main-menu', ['depth' => 2]);
    
    return $context;
}
