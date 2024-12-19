<?php if (!defined('ABSPATH')) exit;
// Main Sidebar
?>

<div class="widget">
    <h4 class="subheader">Search</h4>
    <?php get_search_form(); ?>
</div>

<div class="widget">
    <h4 class="subheader">Archives</h4>
    <ul class="side-nav">
        <?php wp_get_archives('type=monthly'); ?>
    </ul>
</div>

<div class="widget">
    <h4 class="subheader">Categories</h4>
    <ul class="side-nav">
        <?php wp_list_categories('show_count=0&title_li='); ?>
    </ul>
</div>

<div class="widget">
    <h4 class="subheader">Meta</h4>
    <ul class="side-nav">
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
        <?php wp_meta(); ?>
    </ul>
</div>