<?php
$categories = get_the_category();

$post_meta_args = [
    'author' => 'false',
    'date' => 'true',
    'readtime' => 'true',
    'views' => 'true',
];
?>

<article <?php post_class('w-full relative mb-8'); ?> role="article">

        <div class="grid grid-cols-1 md:gap-x-20 md:grid-cols-2 text-base-content text-left items-center xl:items-end">

        <?php if (!empty(get_the_post_thumbnail())): ?>
            <a title="Ga naar het artikel" href="<?php echo get_the_permalink(); ?>" class="group bg-base-100 overflow-hidden rounded-md flex items-center justify-center text-white font-bold text-xl md:flex-shrink-0 mb-4 md:mb-0 transition-all">
                <?php the_post_thumbnail('post-blog-large', ['class' => 'object-cover object-center rounded-md h-full w-full group-hover:scale-105 origin-center transition-all']); ?>
            </a>
        <?php endif; ?>

        <div class="py-0 rounded-sm flex flex-col items-start justify-start flex-grow-2 relative">

            <?php get_template_part('includes/partials/articles/post', 'meta', $post_meta_args); ?>

            <h3 class="text-3xl text-base-content mb-4">
                <a class="text-inherit" href="<?php echo get_the_permalink(); ?>">
                    <?php echo get_the_title(); ?>
                </a>
            </h3>

            <div class="leading-relaxed max-w-2xl text-base-content mb-6 text-lg">
                <?php echo excerpt_only(20); ?>
            </div>

            <div>
                <a title="Ga naar het artikel" href="<?php echo get_the_permalink(); ?>" class="group link link-primary font-bold flex flex-row flex-wrap items-center justify-start">
                    <span class="mr-2"><?php echo __('Lees meer', 'qore'); ?></span>
                    <svg class="h-4 w-4 group-hover:translate-x-1 transition-all" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor" fill-rule="evenodd"><path d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z"/><path d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z"/></g></svg>
                </a>
            </div>
        </div>
    </div>

</article>