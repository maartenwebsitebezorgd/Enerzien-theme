<?php
$background = !empty($args['background']) ? $args['background'] : 'bg-white';
$categories = get_the_category();

$post_meta_args = [
    'author' => 'false',
    'date' => 'true',
    'readtime' => 'true',
    'views' => 'true',
];
?>

<article <?php post_class('w-full relative mb-8 ' . $background); ?> role="article">

    <div class="flex flex-row justify-between items-center">
        <div class="py-0 rounded-sm flex flex-col items-start justify-start flex-grow-2 relative">

            <span class="mb-3 text-secondary text-md">
                <?php echo !empty($categories) ? esc_html($categories[0]->name) : 'blogbericht' ?>
            </span>

            <h3 class="title-font text-2xl text-base-content mb-5">
                <a href="<?php echo get_the_permalink(); ?>">
                    <?php echo get_the_title(); ?>
                </a>
            </h3>

            <div class="leading-relaxed max-w-2xl text-base-content mb-8 text-lg">
                <?php echo excerpt_only(20); ?>
            </div>

            <?php get_template_part('includes/partials/articles/post', 'meta', $post_meta_args); ?>
        </div>

        <?php if (!empty(get_the_post_thumbnail())): ?>
            <a href="<?php echo get_the_permalink(); ?>" class="group bg-base-100 overflow-hidden flex items-center justify-center text-white font-bold text-xl lg:flex-shrink-0 mb-4 transition-all">
                <?php the_post_thumbnail('post-blog-row', ['class' => 'object-cover object-center rounded h-full w-full group-hover:scale-105 origin-center transition-all']); ?>
            </a>
        <?php endif; ?>
    </div>

</article>