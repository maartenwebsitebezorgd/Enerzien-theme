<?php
global $post;
$author_id = $post->post_author == 1 ? 2 : 2;
$nicename = !empty(get_the_author_meta('first_name', $author_id)) && !empty(get_the_author_meta('last_name', $author_id)) ? get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) : get_the_author_meta('nicename', $author_id);
$description = get_the_author_meta('description', $author_id);
$avatar = !empty(get_field('avatar', 'user_' . $author_id)) ? wp_get_attachment_image(get_field('avatar', 'user_' . $author_id)['ID'], 'thumbnail', false, ['class' => 'object-cover object-center h-full w-full']) : get_avatar(get_the_author_meta('ID', $author_id), 96);
?>

<div class="hidden flex-wrap items-center justify-start mt-8">
    <div class="mr-4 rounded-full border border-solid border-base-200 overflow-hidden bg-white h-12 w-12 md:h-14 md:w-14 flex flex-row items-center justify-center">
        <?php echo $avatar; ?>
    </div>
    <div>
        <h4 class="mt-[2px] mb-0 leading-none text-base">
            <?php echo $nicename . ' van ' . get_bloginfo('name'); ?>
        </h4>
        <?php if (!empty(get_field('function', 'user_' . $author_id))) { ?>
            <p class="text-sm text-base-content mb-0">
                <span class="text-sm"><?php echo get_field('function', 'user_' . $author_id); ?></span>
            </p>
        <?php } ?>
    </div>
</div>