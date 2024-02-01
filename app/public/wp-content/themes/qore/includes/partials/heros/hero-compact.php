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
    $title = get_the_title($page_id);
}

$group = get_field('hero', $page_id);

$post_meta_args = [
    'author' => 'false',
    'date' => 'true',
    'readtime' => 'true',
    'views' => 'true',
];

if (is_page() || is_home()) {
    $max_width = 'max-w-3xl';
} else {
    $max_width = 'mx-auto lg:max-w-2xl';
}
?>

<section class="hero hero-compact text-base-content target-viewport" id="hero">
    <div class="container mx-auto flex px-4 pt-18 lg:px-10 lg:pt-24 pb-8 lg:pb-24">

        <div class="w-full <?php echo $max_width; ?>">

            <?php get_template_part('includes/components/breadcrumbs'); ?>

            <?php if (!empty($group['subtitle'])) { ?>
                <h3 class="hero-subtitle subtitle text-[#1cc6a5]">
                    <?php echo $group['subtitle']; ?>
                </h3>
            <?php } ?>

            <h1 class="hero-title h1 mb-4">
                <?php echo !empty($group['titel']) ? $group['titel'] : $title; ?>
            </h1>

            <?php if (!empty($group['text'])) { ?>
                <div class="hero-text w-full text-lg text-base-content mt-8">
                    <?php echo $group['text']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>