<?php
$group = get_sub_field('textblock_two_columns');
?>

<section class="text-two-columnst bg-white py-20 lg:py-40" id="<?php echo sanitize_title($group['col_1']['title']); ?>">

    <div class="container mx-auto md:px-10 target-viewport">
        <div class="inner px-4 sm:px-10 lg:px-20 py-20 lg:py-40 bg-base-100 rounded-md">

            <div class="grid lg:gap-x-20 grid-cols-1 lg:grid-cols-2 items-end">
                <div class="inline-flex flex-col">

                    <?php if (!empty($group['col_1']['subtitle'])) { ?>
                        <h3 class="subtitle text-[#1cc6a5] mb-4 leading-tight">
                            <?php echo $group['col_1']['subtitle']; ?>
                        </h3>
                    <?php } ?>

                    <?php if (!empty($group['col_1']['title'])) { ?>
                        <h2 class="h2 font-black w-full text-base-content mb-4 leading-tight">
                            <?php echo $group['col_1']['title']; ?>
                        </h2>
                    <?php } ?>
                </div>

                <div class="inline-flex flex-col">

                    <?php if (!empty($group['col_2']['subtitle'])) { ?>
                        <h3 class="subtitle text-[#1cc6a5] mb-4 leading-tight">
                            <?php echo $group['col_2']['subtitle']; ?>
                        </h3>
                    <?php } ?>

                    <?php if (!empty($group['col_2']['title'])) { ?>
                        <h2 class="h2 font-black w-full text-base-content mb-4 leading-tight">
                            <?php echo $group['col_2']['title']; ?>
                        </h2>
                    <?php } ?>
                </div>
            </div>

            <div class="grid lg:gap-x-20 grid-cols-1 lg:grid-cols-2">
                <div class="inline-flex flex-col">

                    <?php if (!empty($group['col_1']['text'])) { ?>
                        <div class="text-base-content leading-relaxed prose">
                            <?php echo the_content_more($group['col_1']['text']); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($group['col_1']['link'])) { ?>
                        <div class="mt-8">
                            <a href="<?php echo $group['col_1']['link']['url']; ?>" target="<?php echo $group['col_1']['link']['target']; ?>" class="btn btn-secondary">
                                <span><?php echo $group['col_1']['link']['title']; ?></span>
                                <svg viewBox="0 0 14 20" class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m.15980028 11.1828264 7.8239313-10.83306383c.51745334-.71656082 1.64802366-.24480276 1.50268851.62707435l-1.08574889 6.51450173h4.2181478c.6821052 0 1.0773031.77280168.6778405 1.32581949l-7.82384767 10.83307136c-.51752024.7165574-1.64806548.2448454-1.50275542-.6270819l1.08573218-6.5144934h-4.21808095c-.68216372 0-1.07731143-.7728351-.67790736-1.3258278z" fill="#fff" fill-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="inline-flex flex-col">
                    <?php if (!empty($group['col_2']['text'])) { ?>
                        <div class="text-base-content leading-relaxed prose">
                            <?php echo the_content_more($group['col_2']['text']); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($group['col_2']['link'])) { ?>
                        <div class="mt-8">
                            <a title="<?php echo $group['col_2']['link']['title']; ?>" href="<?php echo $group['col_2']['link']['url']; ?>" target="<?php echo $group['col_2']['link']['target']; ?>" class="btn btn-secondary">
                                <span><?php echo $group['col_2']['link']['title']; ?></span>
                                <svg viewBox="0 0 14 20" class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m.15980028 11.1828264 7.8239313-10.83306383c.51745334-.71656082 1.64802366-.24480276 1.50268851.62707435l-1.08574889 6.51450173h4.2181478c.6821052 0 1.0773031.77280168.6778405 1.32581949l-7.82384767 10.83307136c-.51752024.7165574-1.64806548.2448454-1.50275542-.6270819l1.08573218-6.5144934h-4.21808095c-.68216372 0-1.07731143-.7728351-.67790736-1.3258278z" fill="#fff" fill-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if (!empty($group['col_2']['show_author']) && $group['col_2']['show_author'] == true) { ?>
                        <?php get_template_part('includes/components/author', 'info'); ?>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</section>