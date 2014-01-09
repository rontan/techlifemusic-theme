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
    // TODO
}

// ### search form
function techlifemusic_wpsearch ($form) {
    // TODO
}

?>