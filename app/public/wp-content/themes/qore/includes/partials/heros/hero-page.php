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

?>
<section class="hero hero-compact text-base-content" id="hero">
    <div class="container mx-auto px-4 pt-18 lg:px-10 lg:pt-24 pb-8 lg:pb-16 target-viewport">
        <div class="relative grid grid-cols-12 lg:gap-x-20 text-base-content text-left">

            <div class="col-span-12 lg:col-span-2">
                &nbsp;
            </div>

            <div class="col-span-12 lg:col-span-8 target-viewport">
                <div class="w-full max-w-[640px] mx-auto">

                    <?php get_template_part('includes/components/breadcrumbs'); ?>

                    <h1 class="hero-title h1 mb-4">
                        <?php echo !empty($group['titel']) ? $group['titel'] : $title; ?>
                    </h1>

                    <?php if (!empty($group['subtitle'])) { ?>
                        <h3 class="hero-subtitle subtitle text-[#1cc6a5]">
                            <?php echo $group['subtitle']; ?>
                        </h3>
                    <?php } ?>

                    <?php if (!empty($group['text'])) { ?>
                        <div class="hero-text w-full text-lg text-base-content mt-8">
                            <?php echo $group['text']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-2">
                &nbsp;
            </div>

        </div>
    </div>
</section>