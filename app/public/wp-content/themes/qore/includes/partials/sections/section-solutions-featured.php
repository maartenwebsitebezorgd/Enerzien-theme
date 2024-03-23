<?php

global $post;

$posts = '';
$group = !empty (get_sub_field('solutions')) ? get_sub_field('solutions') : $args;

if (!empty ($group['choose_posts'])) {
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

?>

<section class="padding-section-medium">
    <div class="container">

        <div class="mb-16 flex max-w-2xl flex-col lg:max-w-3xl">
            <?php if (!empty ($group['subtitle'])): ?>
                <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                    <?php echo $group['subtitle']; ?>
                </h5>
            <?php endif; ?>
            <?php if (!empty ($group['title'])): ?>
                <h2 class="text-pretty text-3xl font-bold sm:text-4xl lg:text-5xl leading-xtight">
                    <?php echo $group['title']; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty ($group['text'])): ?>
                <p class="mt-6 text-pretty text-lg lg:text-xl">
                    <?php echo the_content_more($group['text']); ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="mt-12">
            <?php
            if (!empty ($posts)) {
                $post_meta_args = [
                    'author' => 'false',
                    'date' => 'true',
                    'readtime' => 'true',
                    'views' => 'true',
                ]; ?>
                <div class="grid grid-cols-1 items-stretch gap-4 sm:grid-cols-2 md:grid-cols-3">
                    <?php
                    foreach ($posts as $post) {
                        get_template_part('includes/partials/solutions/solution', 'post');
                    }
                    wp_reset_postdata(); ?>
                </div>
                <?php
            } ?>
        </div>
    </div>
</section>