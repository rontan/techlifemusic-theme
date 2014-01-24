<?php

// want to modify the way comments look like?
// this is where you modify that.
require_once('/lib/techlifemusic_class_commentwalker.php');

wp_list_comments(array(
    'walker' => new CommentWalker()
));


?>