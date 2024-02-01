<?php
$group = get_sub_field('image_textblock_background');
$image = !empty($group['image']['ID']) ? wp_get_attachment_image($group['image']['ID'], 'image-textblock-background', false, ['class' => 'object-cover object-center rounded h-full w-full']) : '';
?>

<section class="relative image-textblock-background target-viewport bg-base-100 body-font" id="<?php echo sanitize_title_with_dashes($group['title']); ?>">
    <div class="container px-4 md:px-10 mx-auto">

        <div class="flex flex-row w-full h-full items-center flex-grow-2">

            <?php if ($image) : ?>
                <span class="overlay overlay-image-textblock-background z-20"></span>
                <div class="absolute z-10 top-0 right-0 w-full h-full overflow-hidden flex-grow-2 mb-8 <?php echo $group['image_right'] == true ? 'md:order-last' : 'order-first'; ?>">
                    <?php echo $image; ?>
                </div>
            <?php endif; ?>

            <div class="relative z-30 w-full md:w-1/2 h-full flex items-center rounded-lg flex-grow-2 justify-start py-16 md:py-32 mb-8">
                <div class="w-full h-full relative flex-grow-2">

                    <?php
                    if (!empty($group['icon']['ID'])) {
                        $args = ['image_id' => $group['icon']['ID']];
                        get_template_part('includes/components/icon', 'service', $args);
                    }
                    ?>

                    <h2 class="h2">
                        <?php if (!empty($group['link']['url'])) : ?>
                            <a href="<?php echo $group['link']['url']; ?>" target="<?php echo $group['link']['target']; ?>">
                            <?php endif; ?>
                            <?php echo $group['title']; ?>
                            <?php if (!empty($group['link']['url'])) : ?>
                            </a>
                        <?php endif; ?>
                    </h2>

                    <?php if (!empty($group['subtitle'])) : ?>
                        <h3 class="subtitle text-[#1cc6a5]">
                            <?php echo $group['subtitle']; ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (!empty($group['text'])) : ?>
                        <div class="text-base-content mt-8 prose">
                            <?php echo the_content_more($group['text']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($group['link'])) : ?>
                        <p>
                            <a href="<?php echo $group['link']['url']; ?>" target="<?php echo $group['link']['target']; ?>" class="<?php echo $group['link_type'] == 'button' ? 'btn btn-secondary' : 'link link-primary'; ?> font-bold inline-flex flex-row flex-wrap items-center justify-start mt-8">
                                <span class="mr-3"><?php echo $group['link']['title']; ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="hidden md:block md:w-1/2"></div>

        </div>
    </div>
</section>