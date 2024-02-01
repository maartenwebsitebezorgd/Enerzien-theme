<!-- service item -->
<div class="card flex flex-col bg-gray-50">
    <div>
        <div image-wrapper class="aspect-[3/2] relative w-full">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thema', ['class' => 'object-cover object-center h-full w-full']); ?>
        </div>
    </div>
    <div content class="flex grow flex-col justify-between space-y-6 p-5">
        <div content-top class="space-y-3">
            <h3 class="text-xl font-bold">
                <?php echo get_the_title(); ?>
            </h3>
            <p class="text-gray-600">
                <?php echo excerpt_only(20); ?>
            </p>
        </div>
        <div content-bottom class="">
            <a href="<?php echo get_the_permalink(); ?>"
                class="font-semibold  text-emerald-800 hover:text-emerald-500">Slim investeren
                &rarr;</a>
        </div>
    </div>
</div>