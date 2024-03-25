<?php

global $post;

$posts = '';
$group = !empty (get_sub_field('projects')) ? get_sub_field('projects') : $args;

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

<div class="bg-gray-800 padding-section-large">
    <div class="container">
        <div class="mx-auto mb-16 max-w-2xl text-center lg:max-w-3xl">
            <?php if (!empty ($group['subtitle'])): ?>
                <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                    <?php echo $group['subtitle']; ?>
                </h5>
            <?php endif; ?>
            <?php if (!empty ($group['title'])): ?>
                <h2 class="text-pretty text-3xl font-bold text-white sm:text-4xl lg:text-5xl leading-xtight">
                    <?php echo $group['title']; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty ($group['text'])): ?>
                <div class="mt-5 text-pretty text-lg text-white lg:text-xl">
                    <?php echo the_content_more($group['text']); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        if (!empty ($posts)) {
            $post_meta_args = [
                'author' => 'false',
                'date' => 'true',
                'readtime' => 'true',
                'views' => 'true',
            ]; ?>

            <div class="grid grid-cols-1 items-stretch gap-4 sm:grid-cols-2 md:grid-cols-3 md:gap-5 lg:gap-6">
                <?php
                foreach ($posts as $post) {
                    get_template_part('includes/partials/projects/project', 'post');
                }
                wp_reset_postdata(); ?>
            </div>
            <?php
        } ?>

        <div class="mt-10 flex flex-wrap items-center justify-center gap-6">
            <?php if (!empty ($group['cta_1'])): ?>
                <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                    class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                    <?php echo $group['cta_1']['title']; ?>
                </a>
            <?php endif; ?>
            <?php if (!empty ($group['cta_2'])): ?>
                <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                    class="font-semibold leading-6 text-white flex gap-2 items-center transition-all hover:gap-3">
                    <?php echo $group['cta_2']['title']; ?><span class="w-4" aria-hidden="true"><svg data-slot="icon"
                            fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3">
                            </path>
                        </svg></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>