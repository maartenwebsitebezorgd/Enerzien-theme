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
            <a class="text-gray-900 hover:no-underline" href="<?php echo get_the_permalink(); ?>">
                <span class="absolute inset-0"></span>
                <?php echo get_the_title(); ?>
              </a>
            </h3>
            <p class="text-gray-700">
                <?php echo excerpt_only(20); ?>
            </p>
        </div>
        <div class="text-sm font-semibold leading-6 text-emerald-800 flex gap-2 items-center"> Klinkt
            goed <span class="size-3" aria-hidden="true"><svg data-slot="icon" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
</svg></span></div>
    </div>
</div>