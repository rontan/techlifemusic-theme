<?php

$siteurl = get_option('siteurl');

?>

<section id="commentsform">

    <h5><?php comment_form_title(
        'Leave a Reply',
        'Leave a Reply to %s'
    ); ?></h5>

    <p><?php cancel_comment_reply_link(); ?></p>

    <?php if (get_option('comment_registration') && !is_user_logged_in()) : 
          // if comments require a user to be logged in ?>

        <p class="alert">
            <a href="<?php echo wp_login_url(get_permalink()); ?>">You must be logged in to post a comment.</a>
        </p>

    <?php else : 
          // if comments are open for anyone ?>

    <form action="<?php echo $siteurl; ?>/wp-comments.post.php" method="post">

        <?php if (is_user_logged_in()): ?>

            <p class="logged-in-as">
                Logged in as <a href="<?php echo $siteurl; ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php wp_logout_url(get_permalink()); ?>">Log out?</a>
            </p>

        <?php else: ?>

            <ul id="form-elements">
                <li>
                    <label for="author">Name</label>
                    <input type="text" id="author" name="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="Your name" tabindex="1" <?php if ($req) { echo "aria-required='true'"; } ?> />
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo esc_attr($comment_author); ?>" placeholder="Your email" tabindex="2" <?php if ($req) { echo "aria-required='true'"; } ?> />
                </li>
                <li>
                    <label for="url">Website</label>
                    <input type="url" id="url" name="url" value="<?php echo esc_attr($comment_author); ?>" placeholder="Got a website?" tabindex="3" />
                </li>
            </ul>

        <?php endif; ?>

        <p><textarea id="comment" name="comment" placeholder="Your comment here!" tabindex="4"></textarea></p>
        <p><input id="submit" name="submit" type="submit" tabindex="5" value="Submit" /></p>

        <div id="comments-allowed-tags" class="alert">
            <strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code>
        </div>

    </form> 

    <?php endif; ?>

</section>