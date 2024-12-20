<?php
/**
 * Plugin Name:       Site Blocks
 * Description:       Gutenberg blocks to handle site layout.
 * Requires at least: 5.7
 * Requires PHP:      7.4
 * Version:           1.0.0
 * Author:            Paolo Duzioni
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       site-blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function pd_team_members_block_init() {
	register_block_type_from_metadata( __DIR__ );
}

add_action( 'init', 'pd_team_members_block_init' );

function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {

    $newCategories = [
        array(
            'slug'  => 'site_blocks',
            'title' => __( 'Site Blocks', 'custom-plugin' ),
            'icon'  => null,
        ),
        array(
            'slug'  => 'site_blocks_single',
            'title' => __( 'Site Blocks Singoli', 'custom-plugin' ),
            'icon'  => null,
        )
    ];


    if ( ! empty( $editor_context->post ) ) {
        $merge = array_merge(
            $newCategories,
            $block_categories
        );
    }
    return $merge;
}
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );
