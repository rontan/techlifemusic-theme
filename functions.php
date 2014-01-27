<?php
/*
Author: Richard Neil Ilaganm
URL: http://richardneililagan.com

Heavily based off of the Bones framework by Eddie Machado.
http://themble.com/bones
*/


// ### include mandatory files
require_once('lib/techlifemusic.php');
require_once('lib/techlifemusic-custom-post-types.php');
require_once('lib/techlifemusic-shortcodes.php');

// ### thumbnail / image size options
add_image_size('techlifemusic-thumb-600', 600, 150, true);
add_image_size('techlifemusic-thumb-300', 300, 100, true);

add_filter('image_size_names_choose', 'techlifemusic_custom_image_sizes');

function techlifemusic_custom_image_sizes ($sizes) {
    return array_merge($sizes, array(
        'techlifemusic-thumb-600' => '600px by 150px',
        'techlifemusic-thumb-300' => '300px by 100px'
        ));
}

// ### widgets and sidebars
function techlifemusic_register_sidebars () {

    register_sidebar(array(
        'id' => 'main-sidebar',
        'name' => 'Primary Sidebar',
        'description' => 'The primary (duh) sidebar, located in the content area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
        ));
}

// ### commenting system
function techlifemusic_comments ($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment;
    $authoremail = get_comment_author_email();

    ?>

    <li <?php comment_class(); ?>>
        <article id="comment-<?php comment_ID(); ?>">
            <header>
                <img src="" 
                     data-responsive-image="http://www.gravatar.com/avatar/<?php ?>?s=38" 
                     data-responsive-image-width="720"
                     class="load-gravatar avatar avatar-32 photo" 
                     />                
                <cite><?php echo get_comment_author_link(); ?></cite>                
                <time datetime="<?php echo comment_time(DateTime::ISO8601); ?>">
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?></a>
                </time>
            </header>

            <?php if ($comment->comment_approved == '0'): ?>
            <p class="alert">Your comment is awaiting moderation.</p>
            <?php endif; ?>

            <section>
                <?php comment_text(); ?>                
            </section>

            <p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            
        </article>
    <?php // <li> is added by WP automatically lol ?>
<?php 
}

// ### search form
function techlifemusic_wpsearch ($form) {
    // TODO
}

?>