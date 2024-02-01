<?php

get_header();

$get_partners_args = [
    'post_type' => 'partners',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'numberposts' => 6,
];

$get_reviews_args = [
    'post_type' => 'reviews',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'numberposts' => 1,
];

// ACF groups
$intro = get_field('introductie');
$services = get_field('services');

$get_reviews = !empty($intro['review']) ? $intro['review'] : get_posts($get_reviews_args);
$get_partners = !empty($intro['partners']) ? $intro['partners'] : get_posts($get_partners_args);
?>

<main class="main main-single has_table_of_contents w-full" role="main">

    <?php get_template_part('includes/partials/heros/hero', 'themas'); ?>

    <article class="flex flex-col w-full max-w-none mx-auto text-base-content flex-grow-1 relative" id="content">

        <section class="relative bg-white pb-20 lg:pb-40 overflow-hidden" id="help">

            <div class="inner relative">
                <div class="container md:px-10 mx-auto text-left md:text-center target-viewport">
                    <div class="grid grid-cols-12 lg:gap-x-20 xl:gap-x-0 text-base-content text-left">
                        <div class="w-full col-span-12 lg:col-span-5 xl:col-span-4">

                            <div class="relative px-4 md:px-0 bg-base-100 sm:bg-transparent xl:pt-30 pb-20 z-1">
                                <span class="hidden -z-1 md:block before w-[5000px] -translate-x-1/2 bg-base-100 absolute top-0 left-0 h-full min-h-150"></span>
                                <div class="relative z-2">
                                    <?php if (!empty($intro['title'])) { ?>
                                        <h2 class="h2 mb-8"><?php echo $intro['title']; ?></h2>
                                    <?php } ?>

                                    <?php if (!empty($intro['text'])) { ?>
                                        <div class="prose">
                                            <?php echo $intro['text']; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($intro['link'])) { ?>
                                        <div>
                                            <a title="<?php echo $intro['link']['title']; ?>" href="<?php echo $intro['link']['url']; ?>" target="<?php echo !empty($intro['link']['target']) ? $intro['link']['target'] : '_self'; ?>" class="btn btn-secondary mt-12">
                                                <span><?php echo $intro['link']['title']; ?></span>
                                                <?php echo btn_icon($intro['link']['url']); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php if (!empty($get_reviews)) { ?>
                                <div class="relative z-2 reviews mt-10 lg:mt-20 px-4 md:px-0 prose">
                                    <h3 class="subtitle !text-[#1cc6a5]">
                                        <?php echo !empty($intro['review_title']) ? $intro['review_title'] : __('Referentie', 'qore'); ?>
                                    </h3>
                                    <?php foreach ($get_reviews as $post) {
                                        $reviews = get_field('reviews');
                                        $image = !empty($reviews['image']['ID']) ? wp_get_attachment_image($reviews['image']['ID'], 'thumbnail', false, ['class' => 'object-contain object-center w-full max-w-[80%] pointer-events-none select-none']) : ''; ?>
                                        <div class="relative text-base-content">
                                            <?php if (!empty($post->post_content)) { ?>
                                                <div class="mb-8">
                                                    <?php echo $post->post_content; ?>
                                                </div>
                                            <?php } ?>

                                            <div class="flex flex-wrap items-center justify-start">
                                                <div class="mr-4 rounded-full border border-solid border-base-200 overflow-hidden bg-white h-12 w-12 flex flex-row items-center justify-center">
                                                    <?php echo $image; ?>
                                                </div>
                                                <div>
                                                    <?php if (!empty($reviews['name'])) { ?>
                                                        <h4 class="mt-0 mb-0 leading-none text-base"><?php echo $reviews['name']; ?></h4>
                                                    <?php } ?>

                                                    <p class="text-sm text-base-content mb-0">
                                                        <?php if (!empty($reviews['url'])) { ?>
                                                            <span><?php echo $reviews['function']; ?>, <a class="link link-primary" target="_blank" href="<?php echo $reviews['url']; ?>"><?php echo $reviews['company']; ?></a></span>
                                                        <?php } else { ?>
                                                            <span class="text-sm"><?php echo $reviews['function']; ?>, <?php echo $reviews['company']; ?></span>
                                                        <?php } ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    <?php
                                    }
                                    wp_reset_postdata(); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty($get_partners)) { ?>
                                <div class="px-4 sm:px-0">
                                    <h4 class="text-lg mt-16 mb-3">
                                        <?php echo __('Onze klanten', 'qore'); ?>
                                    </h4>
                                    <ul class="relative z-2 flex flex-row flex-wrap">
                                        <?php foreach ($get_partners as $post) {
                                            $partners = get_field('partners');
                                            $partner = [
                                                'class' => 'inline-flex items-center justify-center box-content px-4 py-2',
                                                'title' => get_the_title(),
                                                'link' => $partners['url'],
                                                'image_id' => $partners['image']['id'],
                                                'target' => '_blank',
                                            ]; ?>
                                            <li class="mr-4 mb-4 inline-flex items-center justify-center box-content rounded-sm bg-white border border-solid border-gray-100 h-[66px]">
                                                <a href="<?php echo !empty($partner['link']) ? $partner['link'] : '#'; ?>" class="<?php echo empty($partner['link']) ? 'pointer-events-none' : ''; ?> <?php echo $partner['class']; ?>" title="<?php echo $partner['title']; ?>" target="<?php echo !empty($partner['target']) ? $partner['target'] : '_self'; ?>">
                                                    <?php echo wp_get_attachment_image($partner['image_id'], 'large', false, ['class' => 'inline-block w-full h-auto max-h-[35px] max-w-[100px]']); ?>
                                                </a>
                                            </li>
                                        <?php }
                                        wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="relative z-2 col-span-12 lg:col-span-7 xl:col-span-8">
                            <?php if (!empty($services['text'])) { ?>
                                <div class="px-4 sm:px-10 lg:px-20 py-10 lg:py-20 bg-white md:rounded-md prose shadow-lg max-w-none xl:max-w-2xl mx-auto xl:mt-30 lg:mr-0 lg:ml-auto">
                                    <?php echo $services['text']; ?>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('includes/partials/global/flexible', 'content'); ?>

    </article>

</main>

<?php get_footer(); ?>