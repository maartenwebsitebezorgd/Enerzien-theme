

<div class="flex gap-6 flex-col md:flex-row p-5 md:p-6 bg-white border border-gray-100 shadow-lg rounded-lg relative">
        <?php if (!empty(get_the_post_thumbnail())): ?>
                                                                        <div class=" w-1/4 shrink-0 ">
                                                                            <div class="relative aspect-[1/1] w-full overflow-hidden rounded-md">
                                                                                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thema', ['class' => 'object-cover object-center h-full w-full']); ?>
                                                                            </div>
                                                                        </div>
    <?php endif; ?>
         <div class="group flex-grow">
            <h3 class=" text-2xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <a href="<?php echo get_the_permalink(); ?>">
                <span class="absolute inset-0"></span>
                <?php echo get_the_title(); ?>
              </a>
            </h3>
            <p class="mt-5 line-clamp-3 leading-6 text-gray-600"><?php echo excerpt_only(40); ?></p>
          </div>
</div>