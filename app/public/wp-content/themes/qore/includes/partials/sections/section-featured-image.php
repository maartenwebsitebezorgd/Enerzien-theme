<?php
$group = get_sub_field('featured_image');

if (!empty($group['image'])) : ?>

<section class="featured-image target-viewport text-center" id="featured-image-<?php the_ID(); ?>">
    <div class="container mx-auto relative px-4 md:px-10">
        <a href="<?php echo !empty($group['link']) ? $group['link']['url'] : '#' ?>" class="<?php echo empty($group['link']) ? 'pointer-events-none' : ''; ?> block h-full w-full max-h-680 overflow-hidden">
            <?php echo wp_get_attachment_image($group['image']['ID'], 'full', ['class' => 'object-cover object-center h-full w-full']); ?>
        </a>
    </div>
</section>

<?php endif; ?>