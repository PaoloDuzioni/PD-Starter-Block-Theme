<?php if (!defined('ABSPATH')) exit;

get_header(); ?>
<!--TODO: add a 404 template-->
<section id="page-404" class="wrap-internals container text-center">
    <img class="image" src="<?php echo get_template_directory_uri(); ?>/dist/images/img-404.svg" alt="Page not found">
    <div class="section-title small bold">
        <h1>404 - Pagina non trovata</h1>
    </div>
    <p><?php _e("Sei sicuro quello che stai cercando si trova su questo sito?", 'pdtheme'); ?></p>
    <a class="button" href="<?php echo esc_attr(home_url()); ?>">
        <?php _e("Torna alla home", 'pdtheme'); ?>
    </a>
</section>

<?php get_footer(); ?>
