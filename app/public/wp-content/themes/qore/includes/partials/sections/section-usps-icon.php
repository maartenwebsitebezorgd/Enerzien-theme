<?php

$group = get_sub_field('icon_usps');

if (!empty($group['items'])): ?>

    <section class="padding-section-medium">
        <div class="container">

            <div class="mx-auto mb-16 flex max-w-2xl flex-col items-center text-center lg:max-w-3xl">
                <?php if (!empty($group['subtitle'])): ?>
                    <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                        <?php echo $group['subtitle']; ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($group['title'])): ?>
                    <h2 class="text-pretty text-3xl font-bold sm:text-4xl lg:text-5xl leading-xtight">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($group['text'])): ?>
                    <p class="mt-5 text-pretty text-lg lg:text-xl">
                        <?php echo the_content_more($group['text']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php if (!empty($group['items'])): ?>
                <div class="mt-12">
                    <div class="grid grid-cols-1 items-stretch gap-4 sm:grid-cols-2 md:grid-cols-3 lg:gap-6">
                        <?php foreach ($group['items'] as $key => $value): ?>
                            <div
                                class="flex flex-col justify-between space-y-6 rounded-lg bg-gray-100 p-4 shadow-xl shadow-gray-100 sm:p-5 md:p-5 lg:p-6">
                                <?php if (!empty($value['icon'])): ?>
                                    <div class="shrink-0">
                                        <div class="flex size-7 items-center justify-center">
                                            <?php echo wp_get_attachment_image($value['icon']['ID'], 'full', true); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div usp_body class="flex grow justify-between">
                                    <div content-top class="space-y-4">
                                        <?php if (!empty($value['title'])): ?>
                                            <h3 class="text-lg font-bold">
                                                <?php echo $value['title']; ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if (!empty($value['text'])): ?>
                                            <p class="text-gray-600">
                                                <?php echo $value['text']; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>