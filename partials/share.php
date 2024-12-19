<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="fb" target="_blank">
    <i class="fab fa-facebook-f"></i>
</a>
<a href="https://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" class="tw" target="_blank">
    <i class="fab fa-twitter"></i>
</a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" class="lk lk-share-btn" target="_blank">
    <i class="fab fa-linkedin icona-link"></i>
</a>
<a target="_blank" class="pi" href="https://pinterest.com/pin/create/button/?url=<?php the_post_thumbnail_url('large') ?>&media=<?php the_title(); ?>&description=">
    <i class="fab fa-pinterest"></i>
</a>
