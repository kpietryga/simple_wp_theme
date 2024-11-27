<?php
if (post_password_required()) {
    return;
}
if (have_comments()) {
    echo '<h3>Comments</h3>';
    wp_list_comments();
}
comment_form();
?>


