<?php
$group = get_sub_field('textblock');
?>

<section class="textblock" id="textblock-<?php the_ID(); ?>">
    <div class="container mx-auto px-4 md:px-10 target-viewport">

        <?php if (!empty($group['subtitle'])) : ?>
            <h3 class="subtitle text-[#1cc6a5]">
                <?php echo $group['subtitle']; ?>
            </h3>
        <?php endif; ?>

        <?php if (!empty($group['title'])) : ?>
            <h2 class="title text-3xl font-black w-full text-base-content mb-12">
                <?php echo $group['title']; ?>
            </h2>
        <?php endif; ?>

        <div class="text-base-content leading-relaxed prose">
            <?php echo the_content_more($group['text']); ?>
        </div>
    </div>
</section>