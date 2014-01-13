<?php

/* Core library file

Heavily based off of Bones by Eddie Machado.
http://themble.com/bones
*/



// this wires up the theme and loads it into wordpress.
add_action('after_setup_theme', 'techlifemusic_gogogo', 16);

function techlifemusic_gogogo () {    
    
    add_action('init', 'techlifemusic_head_cleanup');

    add_filter('the_generator', 'techlifemusic_rss_version');
    add_filter('wp_head', 'techlifemusic_remove_wp_widget_recent_comments_style', 1);
    add_filter('wp_head', 'techlifemusic_remove_recent_comments_style', 1);
    add_filter('gallery_style', 'techlifemusic_remove_gallery_style');

    add_action('wp_enqueue_scripts', 'techlifemusic_scripts_and_styles');

    techlifemusic_theme_support();        

    add_action('widgets_init', 'techlifemusic_register_sidebars');

    add_filter('get_search_form', 'techlifemusic_wpsearch');
    add_filter('the_content', 'techlifemusic_filter_ptags_on_images');
    add_filter('excerpt_more', 'techlifemusic_excerpt_more');
}

// ---------------------------------------------------------------------

// @function removes unnecessary stuff from the default wordpress header flush
function techlifemusic_head_cleanup () {

    // remove category feeds
    remove_action('wp_head', 'feed_links_extra', 3);

    // remove editURI link
    remove_action('wp_head', 'rsd_link');

    // remove windows live writer support
    remove_action('wp_head', 'wlwmanifest_link');

    // remove index page link
    remove_action('wp_head', 'index_rel_link');

    // remove parent page link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);

    // remove start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);

    // remove links to adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    // remove the wordpress version (very important!)
    remove_action('wp_head', 'wp_generator');

    // remove wp version from static resource files
    add_filter('style_loader_src', 'techlifemusic_remove_wp_ver_statics');
    add_filter('script_loader_src', 'techlifemusic_remove_wp_ver_statics');
}

// @function returns nothing as the RSS version. blanks this out on feeds.
function techlifemusic_rss_version () {
    return '';
}

// @function removes the wordpress version from static resource files
function techlifemusic_remove_wp_ver_statics ($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// @function remove the injected styles for the recent comments widget
function techlifemusic_remove_wp_widget_recent_comments_style() {
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

function techlifemusic_remove_recent_comments_style () {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

// @function remove the injected styles for the gallery
function techlifemusic_remove_gallery_style ($css) {
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// @function load scripts for theme
function techlifemusic_scripts_and_styles () {

    global $wp_styles;
    if (!is_admin()) {

        // load modernizr (header)
        wp_register_script('techlifemusic-modernizr', get_stylesheet_directory_uri() . '/js/lib/modernizr.min.js', array(), '', false);

        // load app logic (footer)
        wp_register_script('techlifemusic-logic', get_stylesheet_directory_uri() . '/js/app.min.js', array(), '', true);

        // load primary stylesheet (header)
        wp_register_style('techlifemusic-stylesheet', get_stylesheet_directory_uri() . '/css/style.min.css', array(), '', 'all');

        // queue
        wp_enqueue_script('techlifemusic-modernizr');
        wp_enqueue_script('techlifemusic-logic');

        wp_enqueue_style('techlifemusic-stylesheet');
    }
}

// @function enables theme support features
function techlifemusic_theme_support () {

    // post thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(125, 125, true);

    // rss thingy (thanks bones)
    add_theme_support('automatic-feed-links');

    // post formats
    // NOTE : comment out anything that isn't going to be used
    add_theme_support('post-formats', 
        array(
            'gallery'
        ));

    // menus (duh)
    add_theme_support('menus');
    register_nav_menus(
        array(
            'main-nav' => 'Main Menu',
            'footer-nav' => 'Footer Menu'
        ));
}

// @function register menus
function techlifemusic_menus () {

    // main menu
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
        'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
        'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
        'theme_location' => 'main-nav',                 // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0                                    // limit the depth of the nav
        ));

    // footer menu
    wp_nav_menu(array(
        'container' => '',                              // remove nav container
        'container_class' => 'footer-nav clearfix',     // class of container (should you choose to use it)
        'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
        'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
        'theme_location' => 'footer-nav',               // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0                                    // limit the depth of the nav
        ));
}

// @function removes <p> tags wrapping <img/> tags
function techlifemusic_filter_ptags_on_images ($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// @function removes the ellipsis in a Read More link
function techlifemusic_excerpt_more ($more) {
    global $post;
    // edit this
    return '<a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'bonestheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

function techlifemusic_get_the_author_posts_link() {
    global $authordata;
    if (!is_object($authordata)) {
        return false;
    }

    $link = sprintf(
        '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
        get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
        esc_attr(sprintf('Posts by %s', get_the_author())), 
        get_the_author()
    );
}

?>