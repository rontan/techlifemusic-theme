<?php

// IMPORTANT
// These lines prevent unauthorized or otherwise unintended access.
// do not delete.

// ::   Do not access this page directly via URL
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])):
        die('Please do not load this page directly.');
endif;

// ::   If the post is password protected, 
//      comments shouldn't be loaded either.
if (post_password_required()):
?>
    <div class="">
        <p class="nocomments">This post is password protected. Please log in to view comments.</p>
    </div>
<?php
    return; 
endif;
?>

<?php // ### real start of the comment system 

// want to modify the way comments look like?
// this is where you modify that.
require_once('/lib/techlifemusic_class_commentwalker.php');

?>

<?php 

$have_comments = have_comments();
$comments_open = comments_open();

?>

<h3>Comments</h3>

<?php 

// ### comments list  ------------------------------

if (have_comments()):

    $args = array(
        'walker' => new CommentWalker()
        );
    wp_list_comments($args);
?>

<?php endif; // ------------------------------------ ?>



<?php 
// ### comment form --------------------------------
if (comments_open()) :
?>

<?php endif; // ------------------------------------ ?>