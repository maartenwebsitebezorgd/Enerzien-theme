<?php
$group = get_sub_field('offgrid_gallery');
?>

<!-- Content section -->
<section class="padding-section-medium overflow-hidden">
    <div class="container lg:flex">
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-12 gap-y-16 lg:mx-0 lg:min-w-full lg:max-w-none lg:flex-none lg:gap-y-8">
            <div class="lg:col-end-1 lg:w-full lg:max-w-lg lg:pb-8">

                <?php if (!empty ($group['title'])): ?>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty ($group['text'])): ?>
                    <p class="mt-6 text-xl leading-8 text-gray-600">
                        <?php echo $group['text']; ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty ($group['subtext'])): ?>
                    <p class="mt-6 text-base leading-7 text-gray-600">
                        <?php echo $group['subtext']; ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="flex flex-wrap items-start justify-end gap-6 sm:gap-8 lg:contents">
                <div class="w-0 flex-auto lg:ml-auto lg:w-auto lg:flex-none lg:self-end">
                    <?php echo wp_get_attachment_image($group['image_1']['ID'], 'image', false, ['class' => 'aspect-[7/5] w-[37rem] max-w-none rounded-2xl bg-gray-50 object-cover']); ?>
                </div>
                <div
                    class="contents lg:col-span-2 lg:col-end-2 lg:ml-auto lg:flex lg:w-[37rem] lg:items-start lg:justify-end lg:gap-x-8">
                    <div class="order-first flex w-64 flex-none justify-end self-end lg:w-auto">
                        <?php echo wp_get_attachment_image($group['image_2']['ID'], 'image', false, ['class' => 'aspect-[4/3] w-[24rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover']); ?>
                    </div>
                    <div class="flex w-96 flex-auto justify-end lg:w-auto lg:flex-none">
                        <?php echo wp_get_attachment_image($group['image_3']['ID'], 'image', false, ['class' => 'aspect-[7/5] w-[37rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover']); ?>
                    </div>
                    <div class="hidden sm:block sm:w-0 sm:flex-auto lg:w-auto lg:flex-none">
                        <?php echo wp_get_attachment_image($group['image_4']['ID'], 'image', false, ['class' => 'aspect-[4/3] w-[24rem] max-w-none rounded-2xl bg-gray-50 object-cover']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>