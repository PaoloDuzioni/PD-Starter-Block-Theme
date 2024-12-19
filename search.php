<?php if (!defined('ABSPATH')) exit;

get_header();
global $wp_query;
$total_results = $wp_query->found_posts; ?>

<?php // Breadcrumbs
get_template_part('partials/breadcrumbs', null, ['space-top' => true]); ?>

<div class="wrap-internals container">
    <section class="wrap-search-results">
        <header>
            <div class="section-title">
                <h1><?php echo sprintf(__('Search for "%s"', 'pdtheme'), esc_html(get_search_query())); ?></h1>
            </div>
            <div class="total-text">
                <?php printf(__('Found %1$s results', 'pdtheme'), $total_results); ?>
            </div>
        </header>

        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <a class="result-item" href="<?php the_permalink(); ?>">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <?php if (get_the_content() != "") { ?>
                        <div class="content">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php } ?>
                    <span class="cta"><?php _e('Read more', 'pdtheme'); ?></span>
                </a>
            <?php endwhile; ?>
            <?php pd_site_pagination(); ?>
        <?php else : ?>
            <p class="no-resutls-found">
                <?php _e('No results found. Please try with different terms. ', 'pdtheme'); ?>
            </p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </section>
</div>


<?php get_footer(); ?>
