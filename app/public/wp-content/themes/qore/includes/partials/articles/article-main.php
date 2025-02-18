<?php
/**
 * Template part for displaying posts in a modern card layout
 * 
 * @package YourTheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('overflow-hidden group transition-all duration-300'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>" class="block aspect-[3/2] overflow-hidden rounded-lg">
            <?php the_post_thumbnail('large', array(
                'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300',
            )); ?>
        </a>
    <?php endif; ?>

    <div class="pt-6">
        <!-- Categories -->
        <div class="flex flex-wrap gap-1 mb-4">
            <?php
            $categories = get_the_category();
            $categories = array_slice($categories, 0, 2); // Limit to first 2 categories
            if ($categories):
                foreach ($categories as $category): ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                        class="inline-block px-4 py-2 rounded-full text-sm font-medium bg-gray-100 hover:bg-gray-200 transition-colors">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach;
            endif; ?>
        </div>

        <!-- Title -->
        <h2 class="h4 mb-4 group-hover:underline transition-colors">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <!-- Excerpt -->
        <div class="text-gray-600 text-base mb-6 line-clamp-3">
            <?php echo get_the_excerpt(); ?>
        </div>

        <!-- Author and Date -->
        <div class="flex items-center gap-2 text-gray-500">
            <?php if (get_avatar(get_the_author_meta('ID'), 32)): ?>
                <div class="shrink-0">
                    <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', array('class' => 'rounded-full w-8 h-8')); ?>
                </div>
            <?php endif; ?>

            <span class="font-medium">
                <?php echo get_the_author(); ?>
            </span>

            <span class="text-gray-400">&middot;</span>

            <time class="text-gray-500">
                <?php echo get_the_date('M j, Y'); ?>
            </time>
        </div>
    </div>
</article>