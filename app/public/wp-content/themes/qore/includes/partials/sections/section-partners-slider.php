<?php
$group = get_sub_field('logo_slider');
$repeater = $group['logos'];
?>

<section class="padding-section-small">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <?php if (!empty($group['title'])): ?>
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">
                <?php echo $group['title']; ?>
            </h2>
        <?php endif; ?>
        <div
            class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            <?php foreach ($repeater as $key => $logo): ?>
                <?php echo wp_get_attachment_image($logo['image']['ID'], 'gallery', false, ['class' => 'col-span-2 max-h-12 w-full object-contain lg:col-span-1']); ?>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>