<?php if (!defined('ABSPATH')) exit;

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) { ?>
    This post is password protected. Enter the password to view comments.
<?php
    return;
}
?>

<?php if (have_comments()) : ?>
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ol>
<?php else : // this is displayed if there are no comments so far
?>
    <?php if (comments_open()) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed
    ?>
        <p>Comments are closed.</p>

    <?php endif; ?>
<?php endif; ?>

<?php if (comments_open()) : ?>

    <div id="respond">

        <h2 class="subheader"><small><i class="fa fa-comments-o"></i> <?php comment_form_title('Leave a Reply', 'Leave a Reply to %s'); ?></small></h2>


        <div class="cancel-comment-reply">
            <?php cancel_comment_reply_link(); ?>
        </div>

        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if (is_user_logged_in()) : ?>
                    <div>
                        <a class="tiny button secondary" href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> <a class="tiny button secondary" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
                    </div>
                <?php else : ?>

                    <div>
                        <input placeholder="Name <?php if ($req) echo "(required)"; ?>" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                    </div>

                    <div>
                        <input placeholder="Mail (will not be published) <?php if ($req) echo "(required)"; ?>" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                    </div>

                    <div>
                        <input placeholder="Website" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                    </div>

                <?php endif; ?>

                <div>
                    <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                </div>

                <div style="margin-top:1em;">
                    <input class="button expand" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                    <?php comment_id_fields(); ?>
                </div>

                <?php do_action('comment_form', $post->ID); ?>

            </form>

        <?php endif; // If registration required and not logged in
        ?>

    </div>

<?php endif; ?>