<?php

$posts = '';
$group = !empty(get_sub_field('themes')) ? get_sub_field('themes') : $args;

if (!empty($group['choose_posts'])) {
    $posts = $group['choose_posts'];
} else {
    $query_args = [
        'post_type' => 'themas',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'name',
        'depth' => 1,
    ];

    $query = new WP_Query($query_args);
    $posts = $query->get_posts();
}

if (!empty($posts)) {
?>

    <section class="relation body-font relative target-viewport py-20 lg:pt-0 lg:pb-40 has-pseudo bg-white" id="diensten">
        <span class="absolute inset-0 w-full h-full block lg:hidden bg-base-100"></span>
        <div class="container md:px-10 mx-auto text-left md:text-center relative z-10">
            <div class="columns-1 md:columns-2 m-0 p-0 text-[#001e1d] text-left md:gap-12 xl:gap-20">
                <div class="masonry-item inline-block break-inside-avoid w-full mb-10 md:mb-14 lg:mb-28 last:mb-0">
                    <div class="px-4 md:px-0">
                        <h2 class="h2 md:mt-16 lg:mt-24 text-left max-w-xl mb-0">
                            <?php echo $group['title']; ?>
                        </h2>
                    </div>
                </div>

                <?php if (!empty($posts)) { ?>
                    <?php foreach ($posts as $post) { ?>
                        <div class="masonry-item inline-block break-inside-avoid w-full mb-10 md:mb-14 lg:mb-28 last:mb-0">
                            <?php get_template_part('includes/partials/articles/article', 'thema'); ?>
                        </div>
                    <?php }
                    wp_reset_postdata(); ?>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>