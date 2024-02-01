<?php
$page_id = is_404() ? 582 : get_the_ID();
$group = get_field('hero', $page_id);
$partners = get_field('partners', 'options');

$partner_slider = [
    'max_width' => true,
];
?>

<section class="hero hero-large text-base-content body-font relative overflow-hidden lg:pt-20 target-viewport" id="hero">

    <div class="w-full sm:container mx-auto lg:px-10">

        <div class="relative bg-transparent">

            <div class="flex flex-row justify-between gap-10 text-left items-start relative z-2">

                <div class="inline-flex flex-col flex-grow px-4 xl:px-0 pt-16 lg:pt-0 pb-32 lg:pb-20">

                    <?php if (!is_front_page()) { ?>
                        <?php get_template_part('includes/components/breadcrumbs'); ?>
                    <?php } ?>

                    <h1 class="h1 mb-8 text-base-content leading-none max-w-xl hyphens-auto sm:hyphens-none">
                        <?php echo !empty($group['titel']) ? $group['titel'] : get_the_title(); ?>
                    </h1>

                    <?php if (!empty($group['subtitle'])) { ?>
                        <h3 class="subtitle text-primary max-w-sm xl:max-w-none">
                            <?php echo $group['subtitle']; ?>
                        </h3>
                    <?php } ?>

                    <?php if (!empty($group['text'])) { ?>
                        <div class="mb-6 leading-relaxed text-primary font-bold text-xl max-w-lg">
                            <?php echo $group['text']; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($group['usps'])) { ?>
                        <div class="flex flex-col lg:flex-row flex-nowrap items-start justify-start bg-transparent lg:mt-14">
                            <?php foreach ($group['usps'] as $key => $value) { ?>
                                <div class="bg-transparent rounded-none border-none p-0 mr-4 mb-4 w-full flex-grow-1 last:mr-0 max-w-[220px]">
                                    <h3 class="text-3xl mb-0"><?php echo $value['title']; ?></h3>
                                    <p class="text-sm whitespace-normal text-base-content opacity-100"><?php echo $value['text']; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>


                    <div class="flex flex-row flex-wrap justify-start items-center mt-16 relative z-1">

                        <span class="-z-1 w-[5000px] h-[5000px] -translate-x-1/2 bg-base-100 absolute top-[-40px] md:top-[-60px] left-0 min-h-150"></span>

                        <?php if (!empty($group['cta_1'])) { ?>
                            <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>" class="group relative z-2 btn w-auto <?php echo $group['cta_1_bg']; ?>" role="button" taget="<?php echo $group['cta_1']['target']; ?>">
                                <span class="hidden lg:block"><?php echo $group['cta_1']['title']; ?></span>
                                <span class="block lg:hidden"><?php echo !empty($group['cta_1_mobile_text']) ? $group['cta_1_mobile_text'] : $group['cta_1']['title']; ?></span>
                                <?php echo btn_icon($group['cta_1']['url']); ?>
                            </a>
                        <?php } ?>

                        <?php if (!empty($group['cta_2'])) { ?>
                            <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>" class="group relative z-2 btn w-auto <?php echo $group['cta_2_bg']; ?> sm:ml-4" role="button" taget="<?php echo $group['cta_2']['target']; ?>">
                                <span><?php echo $group['cta_2']['title']; ?></span>
                                <?php echo btn_icon($group['cta_2']['url']); ?>
                            </a>
                        <?php } ?>
                    </div>

                    <span class="sm:hidden absolute bottom-0 left-0 w-full h-[128px] bg-base-100 z-1"></span>
                </div>

                <div class="inline-flex mb-10 xl:mb-0 lg:h-full lg:relative xl:right-auto lg:bottom-auto absolute bottom-0 right-[-120px] md:right-0 w-[263px] md:w-[400px] md:h-auto z-2 lg:w-6/12">
                    <?php if (!empty($group['image'])) { ?>
                        <div class="mask mask-hexagon xl:mx-auto max-w-[500px]">
                            <?php echo wp_get_attachment_image($group['image']['ID'], 'shape-image', false, ['class' => 'w-full h-full']); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>