<?php

global $post;

?>

<?php
// Get the template if it's selected
if (get_page_template_slug() == 'template-builder.php') {
    get_header();
    get_template_part('includes/partials/heros/hero', 'themas');
    get_template_part('includes/partials/global/flexible', 'content');
    get_footer();
} else {
    // Your default vacancy template code here
    get_header();
    get_template_part('includes/partials/content/content', 'vacatures');
    get_footer();
}