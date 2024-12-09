<?php

/*
Template Name: Page builder
Template Post Type: post, page
*/

get_header();

?>

<main class="main main-<?php echo get_post_type(); ?> w-full" role="main">

    <?php

    if (!is_front_page()) {
        get_template_part('includes/partials/heros/hero', 'choose');
    } else {
        get_template_part('includes/partials/heros/hero', 'choose');
    }

    get_template_part('includes/partials/global/flexible', 'content');

    ?>

</main>

<?php get_footer();
