<!-- item -->
<div class="card flex flex-col overflow-hidden rounded-md">
    <?php if (!empty(get_the_post_thumbnail())): ?>
        <div blog_media>
            <div image-wrapper class="relative aspect-[3/2] w-full overflow-hidden">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thema', ['class' => 'object-cover object-center h-full w-full']); ?>
            </div>
        </div>
    <?php endif; ?>
    <div blog_body class="flex grow flex-col justify-between space-y-6 bg-gray-50 p-5">
        <div content-top class="space-y-3">
            <h3 class="text-xl font-bold">
                <?php echo get_the_title(); ?>
            </h3>
            <p class="text-gray-700">
                <?php echo excerpt_only(20); ?>
            </p>
        </div>
        <a href="<?php echo get_the_permalink(); ?>" class="text-sm font-semibold leading-6 text-emerald-800"> Klinkt
            goed <span aria-hidden="true">→</span></a>
    </div>
</div>