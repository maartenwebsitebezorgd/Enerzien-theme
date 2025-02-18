<?php
global $post;

$posts = '';
$group = !empty(get_sub_field('highlighted_posts')) ? get_sub_field('highlighted_posts') : $args;

if (!empty($group['choose_posts'])) {
    $posts = $group['choose_posts'];
} else {
    $query_args = [
        'post_type' => 'posts',
        'post_status' => 'publish',
        'posts_per_page' => 6, // Changed to 6 to match grid layout
        'post__not_in' => array($post->ID),
        'orderby' => 'date',
        'order' => 'DESC',
        'depth' => 1,
    ];

    $query = new WP_Query($query_args);
    $posts = $query->get_posts();
}
?>

<section class="overflow-hidden bg-base-100">
    <div class="container">
        <div spotlight-feed style="margin-bottom: clamp(5vh, 2.1vw + 4vh, 8vh)"
            class="grid grid-cols-2 gap-4 s:grid-cols-12 s:gap-[4vw] lg:grid-cols-4 lg:gap-[3vw]">

            <?php
            if ($posts):
                foreach ($posts as $index => $post):
                    setup_postdata($post);

                    // Determine if this is the featured (first) post
                    $is_featured = $index === 0;

                    // Set classes based on post position
                    $item_classes = $is_featured
                        ? "col-span-2 s:col-span-8 s:row-span-2 lg:col-span-2"
                        : "col-span-1 s:col-span-4 lg:col-span-1" .
                        ($index >= 5 ? " hidden s:block lg:hidden" : "");

                    // Add margin top for specific items in different viewports
                    if (!$is_featured && ($index == 1)) {
                        $item_classes .= " s:mt-[3vh] lg:mt-[5vh]";
                    }
                    // Add margin top for specific items in different viewports
                    if (!$is_featured && ($index == 2)) {
                        $item_classes .= " lg:mt-[5vh]";
                    }
                    ?>
                    <div item<?php echo $is_featured ? '-first' : ''; ?> class="<?php echo $item_classes; ?>">
                        <article class="relative overflow-hidden h-full group transition-all duration-300">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="w-full aspect-[4/3]">
                                    <?php
                                    $img_classes = "w-full h-full object-cover";
                                    if ($is_featured) {
                                        the_post_thumbnail('large', ['class' => $img_classes]);
                                    } else {
                                        the_post_thumbnail('medium', ['class' => $img_classes]);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="<?php echo $is_featured ? 'pt-6' : 'pt-4'; ?>">
                                <div
                                    class="flex items-center gap-1 <?php echo $is_featured ? 'text-base' : 'text-sm'; ?>  mb-3 flex-wrap">
                                    <time>
                                        <?php echo get_the_date('F j, Y'); ?>
                                    </time>
                                    <span>
                                        <span>by</span>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                            class="hover:underline">
                                            <?php echo get_the_author(); ?>
                                        </a>
                                    </span>

                                    <?php
                                    $categories = get_the_category();
                                    if ($categories):
                                        ?>
                                        <span>
                                            <span>in</span>
                                            <a href="<?php echo get_category_link($categories[0]->term_id); ?>"
                                                class="hover:underline">
                                                #
                                                <?php echo $categories[0]->name; ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="block group-hover:underline">
                                    <h2 class="<?php echo $is_featured ? 'h3' : 'h5 font-semibold '; ?> mb-3">
                                        <?php the_title(); ?>
                                    </h2>
                                </a>

                                <?php if ($is_featured): ?>
                                    <p class="text-lg line-clamp-6">
                                        <?php echo wp_trim_words(get_the_excerpt(), 50); ?>
                                    </p>
                                <?php else: ?>
                                    <p class="text-base line-clamp-3">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                    <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>