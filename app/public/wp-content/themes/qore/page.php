<?php

global $post;

get_header();

$news_args = [
    'subtitle' => 'Blijf op de hoogte <span class="hidden md:inline">van de laatste ontwikkelingen</span>',
    'title' => 'Gerelateerde blogs',
];

$about = get_field('about', 'option');

?>

<?php

global $post;

if (is_404()) {
    $page_id = 450;
    $title = get_the_title($page_id);
} elseif (is_home()) {
    $page_id = 9;
    $title = get_the_title($page_id);
} else {
    $page_id = get_the_ID();
    $title = get_the_title();
}

$group = get_field('hero', $page_id);
$share = !empty(get_field('show_share')) && get_field('show_share') == true ? true : false;

$post_meta_args = [
    'author' => 'false',
    'date' => 'true',
    'readtime' => 'true',
    'views' => 'true',
];
?>

<main class="main main-page has_table_of_contents w-full" role="main">

    <?php get_template_part('includes/partials/heros/hero', 'page'); ?>

    <article class="relative mx-auto text-base-content" id="content">

        <?php if (!empty(get_the_post_thumbnail())) { ?>
            <div class="container mx-auto md:px-10 mb-10 lg:mb-20 h-auto lg:h-[500px] overflow-hidden md:rounded-md target-viewport">
                <div class="prose lg:prose-lg max-w-none rounded-md">
                    <?php the_post_thumbnail('post-detail-image', ['class' => 'object-cover object-center rounded h-full w-full max-h-[500px] rounded-md']); ?>
                </div>
            </div>
        <?php } ?>

        <div class="container relative mx-auto px-4 lg:px-10 mb-40">
            <div class="relative grid grid-cols-12 lg:gap-x-10 text-base-content text-left">

                <aside class="hidden lg:flex relative col-span-12 lg:col-span-2 justify-start items-center lg:items-end flex-col max-w-xs ml-auto h-full flex-grow-1 target-viewport">
                    <?php if ($share == true) : ?>
                        <?php get_template_part('includes/partials/social/share'); ?>
                    <?php else : ?>
                        &nbsp;
                    <?php endif; ?>
                </aside>

                <section class="col-span-12 lg:col-span-8 target-viewport">
                    <div class="w-full max-w-[640px] mx-auto">
                        <div class="prose lg:prose-lg">

                            <?php if (have_posts()) { ?>

                                <?php while (have_posts()) {
                                    the_post(); ?>

                                    <?php the_content(); ?>

                                <?php } ?>

                            <?php } else { ?>

                                <p><?php echo __('Geen inhoud gevonden.', 'qore'); ?></p>

                            <?php } ?>
                        </div>

                        <?php get_template_part('includes/partials/sections/section', 'about'); ?>

                    </div>

                </section>

                <aside class="relative hidden lg:flex flex-col col-span-12 lg:col-span-2 items-start justify-start max-w-xs ml-auto prose h-full flex-grow-1 target-viewport">
                    <div class="table_of_contents_wrapper lg:sticky lg:top-36">
                        <ul class="table_of_contents"></ul>
                    </div>
                </aside>
            </div>
        </div>

    </article>

</main>

<?php get_footer(); ?>