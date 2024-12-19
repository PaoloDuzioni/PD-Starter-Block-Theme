<?php

/**
 * Site pagination
 */

function pd_site_pagination($custom_query = null)
{
    // Get global query or custom query
    global $wp_query;
    $query = $custom_query ? $custom_query : $wp_query;

    // Prev and next symbols
    if (get_field('prev_pag_symbol', 'option')) {
        $prev_symbol = get_field('prev_pag_symbol', 'option');
    } else {
        $prev_symbol = '<svg class="pagination-icon" viewBox="0 0 20 20"><path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path></svg>';
    }

    if (get_field('next_pag_symbol', 'option')) {
        $next_symbol = get_field('next_pag_symbol', 'option');
    } else {
        $next_symbol = '<svg class="pagination-icon" viewBox="0 0 20 20"><path fill="none" d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z"></path></svg>';
    }


    // Build pagination links

    // Needed to work properly
    // https://developer.wordpress.org/reference/functions/paginate_links/#user-contributed-notes
    $big = 999999999;
    $links = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big, false)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $query->max_num_pages,
        'prev_next' => false,
        'type' => 'array'
    ));

    // Internal anchor for links
    $anchor = is_search() ? '' : '#top-list';

    if ($links) :
        echo '<div class="pagination">';
        echo '<ul class="page-numbers list-unstyled d-flex align-items-center ' . get_field('pagination_alignement', 'option') . '">';

        // Add prev link if needed (get_previous_posts_link will return a string or void)
        $prev_posts_link = get_previous_posts_page_link();
        if ($prev_posts_link && get_query_var('paged') > 1) :
            echo '<li class="prev-link">';
            echo '<a href="' . $prev_posts_link . $anchor . '">' . $prev_symbol . '</a>';
            echo '</li>';
        endif;

        // Add numeric links
        $first = true;
        foreach ($links as $link) {
            echo '<li class="page-numbers-li' . ($first == true ? ' no-dot' : '') . '">';
            // hash internal link defined in functions.php for specific CPT
            echo $link;
            echo '</li>';
            $first = false;
        }

        // Add next link if needed
        $next_posts_link = get_next_posts_page_link();
        if ($next_posts_link && get_query_var('paged') < $query->max_num_pages) :
            echo '<li class="next-link">';
            echo '<a href="' . $next_posts_link . $anchor . '">' . $next_symbol . '</a>';
            echo '</li>';
        endif;
        echo '</ul></div>';
    endif;
}
