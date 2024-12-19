<?php if (!defined('ABSPATH')) exit; ?>

</div><!-- /#main-wrapper -->

<footer class="site-footer text-center" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Your footer here...
                <?php the_field('footer_info', 'option'); ?>
            </div>
        </div>
    </div>

    <div class="footer-copy">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-6 col-text">
                    <?php the_field('footer_copy', 'option'); ?>
                </div>
                <div class="col-md-6 text-md-end">
                    <a class="credits" href="https://www.publifarm.it" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/credits.svg" alt="credits">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>