<?php

global $post;

$group = !empty(get_sub_field('news')) ? get_sub_field('news') : $args;
$title = !empty($group['title']) ? $group['title'] : (!empty($args['title']) ? $args['title'] : 'Team');
$subtitle = !empty($group['subtitle']) ? $group['subtitle'] : (!empty($args['subtitle']) ? $args['subtitle'] : '');

if (!empty($posts)) { ?>
    <section class="team body-font target-viewport relative overflow-hidden" id="team">
        <div class="container px-4 md:px-10 mx-auto text-center mb-6 md:mb-12">
            <?php if ($subtitle) : ?>
                <h3 class="h5 text-[#1cc6a5] font-manrope mb-4">
                    <?php echo $subtitle; ?>
                </h3>
            <?php endif; ?>
            <h2 class="h2">
                <?php echo $title; ?>
            </h2>
        </div>

        <span class="hidden md:block before w-full h-[400px] bg-base-100 absolute bottom-0 left-0"></span>

        <div class="container px-4 md:px-10 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-3 xl:grid-cols-3 text-base-content">
                <?php echo __('Teamleden hier', 'qore'); ?>
            </div>
        </div>
    </section>
<?php
}
