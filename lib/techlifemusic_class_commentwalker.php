<?php

class CommentWalker extends Walker {

    function start_el (&$output, $element, $depth = 0, $args = array(), $current_object_id = 0) {
        $output .= '<li>';
    }

    function end_el (&$output, $element, $depth = 0, $args = array(), $current_object_id = 0) {
        $output .= '</li>';
    }

    function start_lvl (&$output, $depth = 0, $args = array()) {
        $output .= '<ol>';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ol>';
    }
}

?>