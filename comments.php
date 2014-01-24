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
        <p class="alert">This post is password protected. Please log in to view comments.</p>
    </div>
<?php
    return; 
endif;

// ### real start of the comment system 
$have_comments = have_comments();
$comments_open = comments_open();

?>

<div id="comments" class="sectional">

    <span class="leader">Comments</span>

    <?php 

    // ### comments list  ------------------------------
    if (have_comments()){
        include('/lib/techlifemusic_commentslist.php');
    }
    
    // ### comment form --------------------------------
    if (comments_open()) {
        include('/lib/techlifemusic_commentsform.php');
    }    
    ?>

</div>