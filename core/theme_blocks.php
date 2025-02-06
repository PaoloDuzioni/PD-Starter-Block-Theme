<?php

add_action('acf/init', 'iw_acf_init');


/**
 * Register ACF Custom blocks
 */
function iw_acf_init(): void {
    if( function_exists('acf_register_block') ) {
        acf_register_block_type(array(
            'name'				=> 'news-section',
            'title'				=> 'Site Sezione News',
            'description'		=> 'Sezione news',
            'render_callback'	=> 'acf_blocks_callback',
            'category'			=> 'site_singoli',
            'keywords'			=> array( 'link', 'home' ),
            'mode' => 'edit'
        ));
        
        acf_register_block_type(array(
            'name'				=> 'slider-fullwidth',
            'title'				=> 'Site Slider Fullwidth',
            'description'		=> 'Slides di testo con immagine fullwidth',
            'render_callback'	=> 'acf_blocks_callback',
            'category'			=> 'site_singoli',
            'keywords'			=> array( 'link', 'home' ),
            'mode' => 'edit'
        ));
    }
}

function acf_blocks_callback( $block, $content = '', $is_preview = false ): void {
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    $slug = str_replace('acf/', '', $block['name']);
    $timber_post = Timber::get_post();
    $context['post'] = $timber_post;
    
    $str = rand();
    $context['custom_block_id'] = md5($str);
    
    if($slug=='news-section') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => get_field('numero_posts_news_section')
        );
        
        if(is_singular('post')) {
            $args['post__not_in'] = array(get_the_ID());
        }
        
        $posts = Timber::get_posts( new WP_Query($args));
        $context['posts'] = $posts;
        $context['news_url'] = get_post_type_archive_link( 'post' );
    }
    
    Timber::$dirname = 'blocks';
    Timber::render( $slug.'.twig', $context);
}

