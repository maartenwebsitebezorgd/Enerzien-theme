<?php

$about = get_field('about', 'option');

if (!empty($about)) { ?>
    <div class="w-full bg-white px-10 lg:px-14 py-10 lg:py-14 rounded-md shadow-lg mt-12 lg:mt-20">
        <h2 class="text-3xl mb-6"><?php echo $about['title']; ?></h2>
        <div class="mb-6">
            <?php echo $about['text']; ?>
        </div>
        <a title="<?php echo $about['link']['title']; ?>" href="<?php echo $about['link']['url']; ?>" target="<?php echo !empty($about['link']['target']) ? $about['link']['target'] : '_self'; ?>" class="font-manrope text-base-content underline font-bold">
            <span><?php echo $about['link']['title']; ?></span>
        </a>
    </div>
<?php } ?>