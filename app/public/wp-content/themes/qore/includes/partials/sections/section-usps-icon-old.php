<?php

$group = get_sub_field('icon_usps');

if (!empty($group['items'])) : ?>

    <section class="icon_usps bg-white py-20 lg:py-40">

        <?php if (!empty($group['title']) || !empty($group['text'])) : ?>
            <div class="container px-4 md:px-10 mx-auto text-center mb-6 lg:mb-16 last:mb-0 max-w-3xl">

                <?php if (!empty($group['title'])) : ?>
                    <h2 class="h2">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($group['text'])) : ?>
                    <div class="w-full mt-8 text-lg text-base-content">
                        <p><?php echo $group['text']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-6 xl:grid-cols-4 text-base-content">

                <?php if (!empty($group['items'])) : ?>
                    <?php foreach ($group['items'] as $key => $value) : ?>
                        <article class="w-full px-4 md:px-6 pt-10 pb-6 relative mb-6 xl:mb-16 bg-white shadow rounded-md flex items-start justify-start flex-col flex-grow-1" role="article">

                            <?php if (!empty($value['icon']['ID'])) : ?>
                                <div class="mb-6 h-10 w-10 inline-flex items-center justify-center bg-base-200 text-primary rounded-full font-bold text-xl flex-shrink-0">
                                    <?php echo wp_get_attachment_image($value['icon']['ID'], 'full', true); ?>
                                </div>
                            <?php endif; ?>

                            <div class="w-full">

                                <?php if (!empty($value['title'])) : ?>
                                    <h3 class="h4 mb-2 flex-grow-1 inline-flex items-start justify-start xl:min-h-[54px] text-[#001e1d]">
                                        <?php echo $value['title']; ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($value['text'])) : ?>
                                    <div class="block leading-relaxed mb-4 text-base-content">
                                        <?php echo $value['text']; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($value['link'])) : ?>
                                    <hr class="mt-7 mb-3 border-base-200">
                                    <a title="<?php echo $value['link']['title']; ?>" href="<?php echo $value['link']['url']; ?>" target="<?php echo $value['link']['target']; ?>" class="group link link-primary flex flex-row flex-wrap items-center justify-start mt-8">
                                        <span class="mr-2"><?php echo $value['link']['title']; ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                            </div>
                        <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>