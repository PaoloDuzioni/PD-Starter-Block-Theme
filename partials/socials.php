<div class="wrap-socials">
    <?php if (have_rows('contacts_social', 'option')) : ?>
        <?php while (have_rows('contacts_social', 'option')) : the_row(); ?>
            <a href="<?php the_sub_field('single_social_url'); ?>" target="_blank">
                <?php the_sub_field('single_social'); ?>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
