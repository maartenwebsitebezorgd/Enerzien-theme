<?php

global $post;
$categories = get_the_category();
$cat = '';
if (!empty ($categories)) {
    $cat = esc_html($categories[0]->name);
}
?>

<div class="post-meta flex flex-row gap-2 flex-wrap items-center justify-start mb-3">

    <?php if (!empty ($cat)): ?>
        <div class="inline-flex items-center justify-start text-base-content text-base font-manrope font-extrabold mr-1">
            <div class="badge badge-secondary badge-md font-manrope font-extrabold">
                <?php echo $cat; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty ($args['author']) && $args['author'] !== 'false') { ?>
        <div
            class="post-meta-item hidden sm:inline-flex items-center justify-start text-base-content text-sm font-manrope font-extrabold">
            <div class="avatar">
                <div class="rounded-full w-8 h-8 mr-2">
                    <?php if (!empty (get_avatar(get_the_author_meta('ID')))): ?>
                        <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd" />
                        </svg>
                    <?php endif; ?>
                </div>
            </div>
            <span>door
                <?php echo get_the_author_meta('display_name'); ?>
            </span>
        </div>
    <?php } ?>

    <?php if (!empty ($args['date']) && $args['date'] == 'true') { ?>
        <div
            class="post-meta-item inline-flex items-center justify-start text-base-content text-sm font-manrope font-extrabold">
            <span>
                <?php echo get_the_date('j F Y'); ?>
            </span>
        </div>
    <?php } ?>

    <?php if (!empty ($args['readtime']) && $args['readtime'] == 'true') { ?>
        <div
            class="post-meta-item inline-flex items-center justify-start text-base-content text-sm font-manrope font-extrabold">
            <span>
                <?php echo calculate_readtime($post->ID); ?>
            </span>
        </div>
    <?php } ?>

</div>