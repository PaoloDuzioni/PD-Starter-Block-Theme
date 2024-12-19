<?php if (!defined('ABSPATH')) exit;
/**
 * Template Name: Homepage
 */
?>
<?php get_header(); ?>


<!-- SLIDER -->
<section class="mb-5">
    <!-- Slider main container -->
    <div class="swiper site-carousel">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img src="https://picsum.photos/id/1/1920/410" alt="Lorem ipsum" /></div>
            <div class="swiper-slide"><img src="https://picsum.photos/id/2/1920/410" alt="Lorem ipsum" /></div>
            <div class="swiper-slide"><img src="https://picsum.photos/id/3/1920/410" alt="Lorem ipsum" /></div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>


<!-- CUSTOM QUERY -->
<section class="container mb-5">
    <div class="row">
        <div class="col">
            <?php // CUSTOM QUERY
            $args = array(
                'post_type' => 'post'
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) : ?>
                <div class="section-title"><h2>From our blog</h2></div>

                <ul>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else :
                echo 'No posts found.';
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>


<!-- THE WP LOOP -->
<section class="container">
    <div class="row">
        <div class="col">
            <h1><?php the_title(); ?></h1>
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>

                    <div class="wrap-content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>