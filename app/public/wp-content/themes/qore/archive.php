<?php get_header(); ?>

<main class="">

    <!-- Hero Heading Section -->
    <section class="py-20 md:py-24">
        <div class="container">
            <h1 class="text-[clamp(2.5rem,5vw,5rem)] leading-[1.1] font-bold max-w-[90%] md:max-w-[80%]">
                <?php
                if (is_category()) {
                    echo single_cat_title('', false) . '. ' . category_description();
                } elseif (is_tag()) {
                    echo single_tag_title('', false) . '. ' . tag_description();
                } elseif (is_author()) {
                    echo 'Articles by ' . get_the_author() . '.';
                } elseif (is_date()) {
                    echo get_the_date('F Y') . ' archives.';
                } else {
                    echo 'See our thoughts, stories and ideas.';
                }
                ?>
            </h1>
        </div>
    </section>

    <?php
    // Get featured posts for current category or general blog
    $featured_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'meta_key' => 'featured_post',
        'meta_value' => '1'
    );

    // If we're on a category page, get featured posts from this category
    if (is_category()) {
        $category = get_queried_object();
        $featured_args['cat'] = $category->term_id;
    }

    $featured_query = new WP_Query($featured_args);
    $featured_posts = $featured_query->posts;

    // Only show featured section if we have featured posts
    if ($featured_posts): ?>
        <section class="overflow-hidden bg-base-100 mb-16">
            <div class="container">
                <div spotlight-feed style="margin-bottom: clamp(5vh, 2.1vw + 4vh, 8vh)"
                    class="grid grid-cols-2 gap-4 s:grid-cols-12 s:gap-[4vw] lg:grid-cols-4 lg:gap-[3vw]">
                    <?php
                    foreach ($featured_posts as $index => $post):
                        setup_postdata($post);
                        $is_featured = $index === 0;
                        $item_classes = $is_featured
                            ? "col-span-2 s:col-span-8 s:row-span-2 lg:col-span-2"
                            : "col-span-1 s:col-span-4 lg:col-span-1" .
                            ($index >= 5 ? " hidden s:block lg:hidden" : "");

                        if (!$is_featured && ($index == 1)) {
                            $item_classes .= " s:mt-[3vh] lg:mt-[5vh]";
                        }
                        if (!$is_featured && ($index == 2)) {
                            $item_classes .= " lg:mt-[5vh]";
                        }
                        ?>
                        <div item<?php echo $is_featured ? '-first' : ''; ?> class="<?php echo $item_classes; ?>">
                            <!-- Your existing article markup -->
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
                                        class="flex items-center gap-1 <?php echo $is_featured ? 'text-base' : 'text-sm'; ?> mb-3 flex-wrap">
                                        <time>
                                            <?php echo get_the_date('F j, Y'); ?>
                                        </time>
                                        <span>by</span>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                            class="hover:underline">
                                            <?php echo get_the_author(); ?>
                                        </a>
                                        <?php
                                        $categories = get_the_category();
                                        if ($categories): ?>
                                            <span>in</span>
                                            <a href="<?php echo get_category_link($categories[0]->term_id); ?>"
                                                class="hover:underline">#
                                                <?php echo $categories[0]->name; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <a href="<?php the_permalink(); ?>" class="block group-hover:underline">
                                        <h2 class="<?php echo $is_featured ? 'h3' : 'h5 font-semibold'; ?> mb-3">
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
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <header class="mb-8">
        <div class="container">
            <h1 class="text-4xl font-bold mb-4">
                What’s new?
            </h1>

           <!-- Category Filters -->
        <div class="relative -mx-4 px-4 md:mx-0 md:px-0">
            <div class="category-filters flex overflow-x-auto scrollbar-hide -mx-1 px-1 py-2">
                <div class="flex gap-3 min-w-full md:min-w-0">
                    <div class="filter shrink-0">
                        <input data-filter="all" value="all" type="radio" name="cat" id="all" 
                            class="peer hidden" <?php echo (!is_category()) ? 'checked' : ''; ?> />
                        <label for="all" 
                            class="min-h-[53px] cursor-pointer transition-all hover:bg-base-300 bg-base-200 inline-flex items-center justify-center rounded-md leading-none font-bold font-heading pt-5 pb-4 px-8 text-primary capitalize peer-checked:bg-primary peer-checked:text-white whitespace-nowrap">
                            <span class="text-inherit">Alle berichten</span>
                        </label>
                    </div>

                    <?php 
                    $categories = get_categories();
                    foreach ($categories as $cat) { 
                        $is_current = is_category($cat->term_id);
                    ?>
                        <div class="filter shrink-0">
                            <input data-filter="<?php echo esc_attr($cat->slug); ?>" 
                                   value="<?php echo esc_attr($cat->slug); ?>" 
                                   type="radio" 
                                   name="cat" 
                                   id="<?php echo esc_attr($cat->slug); ?>" 
                                   class="peer hidden"
                                   <?php checked($is_current, true); ?> />
                            <label for="<?php echo esc_attr($cat->slug); ?>" 
                                   class="min-h-[53px] cursor-pointer transition-all hover:bg-base-300 bg-base-200 inline-flex items-center justify-center rounded-md leading-none font-bold font-heading pt-5 pb-4 px-8 text-primary capitalize peer-checked:bg-primary peer-checked:text-white whitespace-nowrap">
                                <span class="text-inherit"><?php echo esc_html($cat->name); ?></span>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Optional scroll indicators -->
            <div class="absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-white pointer-events-none md:hidden"></div>
            <div class="absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-white pointer-events-none md:hidden"></div>
        </div>
        </div>
    </header>

    <!-- Main content grid with sidebar -->
    <section class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Main content -->
                <div class="lg:col-span-8">
                    <?php if (have_posts()): ?>
                        <div id="posts-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <?php
                            while (have_posts()):
                                the_post();
                                get_template_part('includes/partials/articles/article', 'main');
                            endwhile;
                            ?>
                        </div>

                        <div class="pagination mt-8">
                            <?php
                            echo paginate_links(array(
                                'prev_text' => __('&laquo; Vorige', 'your-theme-textdomain'),
                                'next_text' => __('Volgende &raquo;', 'your-theme-textdomain'),
                                'class' => 'flex justify-center gap-2'
                            ));
                            ?>
                        </div>

                    <?php else: ?>
                        <p class="text-center text-gray-600">
                            <?php _e('Geen berichten gevonden.', 'your-theme-textdomain'); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <aside class="hidden lg:block lg:col-span-4 space-y-8">
                    <!-- About Section -->
                    <div class="bg-gray-100 rounded-lg p-8">
                        <h2 class="text-2xl font-bold mb-4">PITCH<span class="text-primary">.</span></h2>
                        <p class="text-gray-600">
                            Welcome to your go-to destination for fresh perspectives. Dive deep into our rich content
                            pool
                            curated meticulously to enlighten, entertain, and engage readers across the globe.
                        </p>
                    </div>

                    <!-- Featured Posts -->
                    <div class="bg-gray-100 rounded-lg p-8 lg:sticky lg:top-24">
                        <h3 class="text-xl font-bold mb-6">Uitgelichte artikelen</h3>
                        <?php
                        $featured_posts = new WP_Query([
                            'posts_per_page' => 4,
                            'meta_key' => 'featured_post',
                            'meta_value' => true
                        ]);

                        if ($featured_posts->have_posts()):
                            while ($featured_posts->have_posts()):
                                $featured_posts->the_post();
                                ?>
                                <div class="flex gap-4 mb-6 last:mb-0">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>" class="shrink-0">
                                            <?php the_post_thumbnail('thumbnail', ['class' => 'w-16 h-16 rounded-lg object-cover']); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div>
                                        <h4 class="font-medium leading-tight">
                                            <a href="<?php the_permalink(); ?>" class="hover:text-primary">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="text-sm text-gray-500 mt-1">
                                            <?php echo get_the_date('M j, Y'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>