<?php if (!defined('ABSPATH')) exit;

$context = Timber::context();

Timber::render('page.twig', $context);

//get_header(); ?>
<!---->
<!--<div class="container wrap-internals">-->
<!--    <div class="section-title">-->
<!--        <h1>--><?php //the_title(); ?><!--</h1>-->
<!--    </div>-->
<!---->
<!--    --><?php //if (have_posts()) :
//        while (have_posts()) : the_post(); ?>
<!--            <div class="wrap-content">-->
<!--                --><?php //the_content(); ?>
<!--            </div>-->
<!--        --><?php //endwhile; ?>
<!--    --><?php //endif; ?>
<!--</div>-->
<!---->
<?php //get_footer(); ?>
