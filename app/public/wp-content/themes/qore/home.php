<?php

get_header();

$post_args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 15,
    'orderby' => 'date',
    'order' => 'DESC',
];

$get_posts = new WP_Query($post_args);

$query = [];
$featured_array = [];
$other_array = [];

$i = 0;
while ($get_posts->have_posts()) : $get_posts->the_post();
    if ($i == 0) {
        $query['featured'][] = $get_posts->posts[0];
        $featured_array[] = $query['featured'][0]->ID;
    }
    $i++;
endwhile;
wp_reset_postdata();

$categories_args = [
    'hide_empty' => false,
    'exclude' => 1,
];
$categories = get_categories($categories_args); //This returns both used and unused categories

?>

<main class="main main-archive w-full" role="main">

    <?php

    get_template_part('includes/partials/heros/hero', 'compact');

    if (!empty($query)) : ?>

        <section class="posts bg-base-100 relative target-viewport" id="uitgelicht">

            <span class="hidden xl:block before w-full h-40 xl:h-20 bg-white absolute top-0 left-0"></span>

            <div class="container px-4 lg:px-10 pt-20 xl:pt-0">
                <div class="flex flex-col bg-base-100">
                    <?php foreach ($query['featured'] as $post) {
                        get_template_part('includes/partials/articles/article', 'post-large');
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <?php if (!empty($query)) : ?>
        <section class="posts bg-base-100 pt-8 md:pt-28 relative mb-10 target-viewport" id="blogs">

            <span class="hidden md:block before w-full h-[400px] bg-white absolute bottom-0 left-0"></span>

            <div class="container px-4 md:px-10">
                <?php if (!empty($categories)) : ?>
                    <form method="get" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="inline-flex w-full flex-row flex-wrap mb-8" id="post_filter">

                        <?php if (wp_is_mobile()) : ?>
                            <select data-filter name="cat" id="filter" class="inline-flex xl:hidden w-full shadow-lg border-none rounded-md h-14 pl-4">
                                <option selected value="all"><?php echo __('Alle blogs', 'qore'); ?></option>
                                <?php foreach ($categories as $cat) { ?>
                                    <option value="<?php echo $cat->slug; ?>" name="cat" id="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                                <?php } ?>
                            </select>
                        <?php else : ?>
                            <div class="w-full flex-row flex-wrap hidden xl:inline-flex">
                                <div class="filter">
                                    <input checked data-filter="all" value="all" type="radio" name="cat" id="all" class="peer hidden" />
                                    <label for="all" class="min-h-[53px] cursor-pointer transition-all hover:bg-base-300 bg-base-200 inline-flex items-center justify-center rounded-md leading-none font-bold font-heading pt-5 pb-4 px-8 text-primary capitalize mr-4 mb-4 peer-checked:bg-primary peer-checked:text-white">
                                        <span class="text-inherit"><?php echo __('Alle blogs', 'qore'); ?></span>
                                    </label>
                                </div>

                                <?php foreach ($categories as $cat) { ?>
                                    <div class="filter">
                                        <input data-filter="<?php echo $cat->slug; ?>" value="<?php echo $cat->slug; ?>" type="radio" name="cat" id="<?php echo $cat->slug; ?>" class="peer hidden" />
                                        <label for="<?php echo $cat->slug; ?>" class="min-h-[53px] cursor-pointer transition-all hover:bg-base-300 bg-base-200 inline-flex items-center justify-center rounded-md leading-none font-bold font-heading pt-5 pb-4 px-8 text-primary capitalize mr-4 mb-4 peer-checked:bg-primary peer-checked:text-white">
                                            <span class="text-inherit"><?php echo $cat->name; ?></span>
                                            <span class="text-inherit"><?php echo svg($cat->slug); ?></span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" name="post_type" value="post">
                        <input type="hidden" name="action" value="filter_values">
                    </form>
                <?php endif; ?>
            </div>

            <div class="container md:px-5">
                <div class="grid grid-cols-1 sm:gap-x-5 sm:grid-cols-2 lg:grid-cols-3 text-base-content text-left md:min-h-[540px]">
                    <?php foreach ($get_posts->posts as $post) :
                        get_template_part('includes/partials/articles/article', 'post');
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <?php get_template_part('includes/partials/sections/section', 'cta'); ?>

</main>

<?php get_footer();
