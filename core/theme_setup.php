<?php

/**
 * Global Timber context.
 *
 * @param array $context Global context variables.
 *
 * - Menu registration
 * - ACF Options
 */
add_filter('timber/context', 'add_to_context');

function add_to_context($context)
{
    $context['menu'] = Timber::get_menu('main-menu', ['depth' => 2]);
    
    $context['options'] = get_fields('option');
    
    return $context;
}
