<?php
$group = get_sub_field('content_media');
?>

<section class="padding-section-medium">
    <div class="container">
        <div class="overflow-hidden bg-white">
            <div>
                <div class="grid grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
                    <div class="px-6 lg:px-0 lg:pr-4 lg:pt-4 h-full flex items-center">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
                            <?php if (!empty ($group['subtitle'])): ?>
                                <h3 class="subtitle mb-3">
                                    <?php echo $group['subtitle']; ?>
                                </h3>
                            <?php endif; ?>
                            <?php if (!empty ($group['title'])): ?>
                                <h2 class="h3">
                                    <?php echo $group['title']; ?>
                                </h2>
                            <?php endif; ?>
                            <?php if (!empty ($group['text'])): ?>
                                <p class="text-lg text-gray-600 mt-4">
                                    <?php echo $group['text']; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty ($group['list'])): ?>
                                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                                    <?php foreach ($group['list'] as $key => $value): ?>
                                        <?php if (!empty ($value['text'])): ?>
                                            <div class="relative pl-9">
                                                <dt class="inline font-semibold text-gray-900">
                                                    <div class="absolute left-1 top-1 size-6">
                                                        <?php if (!empty ($value['icon'])): ?>
                                                            <?php echo wp_get_attachment_image($value['icon']['ID'], 'shape-image', false, ['class' => 'h-full w-full']); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if (!empty ($value['bold'])): ?>
                                                        <?php echo $value['bold']; ?>
                                                    <?php endif; ?>
                                                </dt>
                                                <?php if (!empty ($value['text'])): ?>
                                                    <dd class="inline">
                                                        <?php echo $value['text']; ?>
                                                    </dd>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </dl>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="sm:px-6 lg:px-0">
                        <div class="<?php echo $group['main_image']; ?>">
                            <div class="relative aspect-[1/1] w-full mask mask-hexagon ">
                                <?php if (!empty ($group['main_image'])): ?>
                                    <?php echo wp_get_attachment_image($group['main_image']['ID'], 'shape-image', false, ['class' => 'w-full h-full']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>