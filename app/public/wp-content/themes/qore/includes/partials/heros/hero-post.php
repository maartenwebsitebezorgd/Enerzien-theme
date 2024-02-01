<?php
global $post;

if (is_404()) {
    $page_id = 450;
    $title = get_the_title($page_id);
} elseif (is_home()) {
    $page_id = 9;
    $title = get_the_title($page_id);
} else {
    $page_id = get_the_ID();
    $title = get_the_title();
}

$group = get_field('hero', $page_id);

$post_meta_args = [
    'author' => 'false',
    'date' => 'true',
    'readtime' => 'true',
    'views' => 'true',
];


if (get_post_type() == 'project') {
    $back_url = get_home_url(null, 'projecten/');
} else {
    $back_url = get_post_type_archive_link(get_post_type());;
}

$author_id = $post->post_author;
$nicename = !empty(get_the_author_meta('first_name', $author_id)) && !empty(get_the_author_meta('last_name', $author_id)) ? get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) : get_the_author_meta('nicename', $author_id);
$description = get_the_author_meta('description', $author_id);
$avatar = !empty(get_field('avatar', 'user_' . $author_id)) ? wp_get_attachment_image(get_field('avatar', 'user_' . $author_id)['ID'], 'thumbnail', false, ['class' => 'object-cover object-center h-full w-full']) : get_avatar(get_the_author_meta('ID', $author_id), 96);

?>
<section class="hero hero-compact text-base-content" id="hero">
    <div class="container mx-auto px-4 pt-18 lg:px-10 lg:pt-24 pb-8 lg:pb-16 target-viewport">
        <div class="relative grid grid-cols-12 lg:gap-x-20 text-base-content text-left">

            <div class="col-span-12 lg:col-span-2">
                &nbsp;
            </div>

            <div class="col-span-12 lg:col-span-8 target-viewport">
                <div class="w-full max-w-[640px] mx-auto">

                    <a title="<?php echo __('Terug naar het overzicht', 'qore'); ?>" href="<?php echo $back_url; ?>" class="font-bold text-base-content inline-flex flex-row items-center justify-start mb-8">
                        <svg class="h-5 w-5 mr-3 rotate-180 group-hover:translate-x-1 transition-all" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <g fill="currentColor" fill-rule="evenodd">
                                <path d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z" />
                                <path d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z" />
                            </g>
                        </svg>
                        <span><?php echo __('Terug naar het overzicht', 'qore'); ?></span>
                    </a>

                    <h1 class="hero-title h1 mb-4">
                        <?php echo !empty($group['titel']) ? $group['titel'] : $title; ?>
                    </h1>

                    <?php if (!empty($group['subtitle'])) { ?>
                        <h3 class="hero-subtitle subtitle text-[#1cc6a5]">
                            <?php echo $group['subtitle']; ?>
                        </h3>
                    <?php } ?>

                    <div class="mt-3">
                        <?php get_template_part('includes/partials/articles/post', 'meta', $post_meta_args); ?>
                    </div>

                    <?php if (!empty($group['text'])) { ?>
                        <div class="hero-text w-full text-lg text-base-content mt-4">
                            <?php echo $group['text']; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($description)) { ?>
                        <div class="mt-4 text-base-content font-manrope text-lg font-bold">
                            <p>
                                <strong>
                                    <?php echo $description; ?>
                                </strong>
                            </p>
                        </div>
                    <?php } ?>

                    <?php get_template_part('includes/components/author', 'info'); ?>

                </div>
            </div>

            <div class="col-span-12 lg:col-span-2">
                &nbsp;
            </div>

        </div>
    </div>
</section>