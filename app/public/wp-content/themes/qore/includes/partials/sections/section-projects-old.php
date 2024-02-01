<?php

global $post;

$posts = '';
$group = !empty(get_sub_field('news')) ? get_sub_field('news') : $args;

if (!empty($group['title'])) {
    $title = $group['title'];
} elseif (!empty($args['title'])) {
    $title = $args['title'];
} else {
    $title = __('Referentie projecten', 'qore');
}

if (!empty($group['subtitle'])) {
    $subtitle = $group['subtitle'];
} elseif (!empty($args['subtitle'])) {
    $subtitle = $args['subtitle'];
} else {
    $subtitle = '';
}

if (!empty($group['text'])) {
    $text = $group['text'];
} elseif (!empty($args['text'])) {
    $text = $args['text'];
} else {
    $text = '';
}

if (!empty($group['choose_posts'])) {
    $posts = $group['choose_posts'];
} else {
    $query_args = [
        'post_type' => 'project',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array($post->ID),
        'orderby' => 'date',
        'order' => 'DESC',
        'depth' => 1,
    ];

    $query = new WP_Query($query_args);
    $posts = $query->get_posts();
}

if (!empty($posts)) {
    $post_meta_args = [
        'author' => 'false',
        'date' => 'true',
        'readtime' => 'true',
        'views' => 'true',
    ]; ?>
    <section class="news body-font target-viewport relative overflow-hidden pt-20 lg:pt-40 mb-20 lg:mb-40 last:!mb-0 bg-white" id="nieuws">

        <div class="container px-4 md:px-10 mx-auto text-center mb-6 md:mb-12">
            <h3 class="h5 text-[#1cc6a5] font-manrope mb-4">
                <?php echo $subtitle; ?>
            </h3>
            <h2 class="h2">
                <?php echo $title; ?>
            </h2>
            <div class="prose">
                <p><?php echo $text; ?></p>
            </div>
        </div>

        <span class="hidden md:block before w-full h-[400px] bg-base-100 absolute bottom-0 left-0"></span>

        <div class="container px-4 md:px-10 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-3 xl:grid-cols-3 text-base-content">
                <?php
                foreach ($posts as $post) {
                    get_template_part('includes/partials/articles/article', 'post');
                }
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php
} ?>