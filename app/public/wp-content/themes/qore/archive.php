<?php get_header(); ?>

<main class="main main-archive w-full" role="main">

<?php

if (!empty($group['choose_posts']))
{
    $posts = $group['choose_posts'];
}
else
{
    $query_args = [
        'post_type' => get_post_type(),
        'post_status' => 'publish',
        'posts_per_page' => 20,
        'order' => 'ASC',
        'orderby' => 'name',
        'depth' => 1,
    ];

    $query = new WP_Query($query_args);
    $posts = $query->get_posts();
}

if (!empty($posts)) :
    foreach ($posts as $key => $value)
    {
        if ($key % 2 == 0)
        {
            $posts['left'][] = $value;
        }
        else
        {
            $posts['right'][] = $value;
        }
    }
?>

    <section class="relation body-font relative target-viewport overflow-hidden text-center md:text-left bg-base-100 md:bg-white mb-40" id="themas">
        <div class="container md:px-10 mx-auto text-left md:text-center relative z-10">
            <div class="grid grid-cols-12 md:gap-x-20 md:gap-y-20 text-base-content text-left pt-8">
                
            <?php if (!empty($posts['left'])) : ?>
                <div class="order-2 md:order-1 col-span-12 md:col-span-6">
                    <?php foreach ($posts['left'] as $post) : ?>
                        <?php get_template_part('includes/partials/articles/article', 'thema'); ?>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
            
            
            <?php if (!empty($posts['right'])) : ?>
                <div class="order-1 md:order-2 col-span-12 lg:col-span-6">

                    <div class="px-4 md:px-0">
                        <?php if ($post_type == 'themas'): ?>
                            <h2 class="h2 mb-10 md:my-16 lg:my-24 md:max-w-sm text-center md:text-left">Zo helpen wij je de kansen in de energietransitie te benutten</h2>
                        <?php else : ?>
                            <h2 class="h2 mb-10 md:my-16 lg:my-24 md:max-w-sm text-center md:text-left"><?php echo get_the_archive_title(); ?></h2>
                        <?php endif; ?>
                    </div>


                    <?php foreach ($posts['right'] as $post) : ?>
                        <?php get_template_part('includes/partials/articles/article', 'thema'); ?>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_template_part('includes/partials/sections/section', 'cta'); ?>

</main>

<?php get_footer(); ?>