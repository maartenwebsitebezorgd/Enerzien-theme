<!-- service item -->
<div
    class="flex flex-col bg-gray-50 relative transition transform duration-700 ease-in-out hover:-translate-y-2 overflow-hidden rounded-md">
    <div>
        <div class="aspect-[3/2] relative w-full">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thema', ['class' => 'object-cover object-center h-full w-full']); ?>
        </div>
    </div>
    <div class="flex grow flex-col justify-between space-y-6 p-5">
        <div class="space-y-3">
            <h3 class="text-xl font-bold">
                <a class="text-gray-900 hover:no-underline" href="<?php echo get_the_permalink(); ?>">
                    <span class="absolute inset-0"></span>
                    <?php echo get_the_title(); ?>
                </a>
            </h3>
            <p class="text-gray-600">
                <?php echo excerpt_only(20); ?>
            </p>
        </div>
        <div class="">
            <a href="<?php echo get_the_permalink(); ?>"
                class="font-semibold  text-emerald-800 hover:text-emerald-500 flex gap-2 items-center">Lees verder
                <span class="size-3" aria-hidden="true">
                    <svg data-slot="icon" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25">
                        </path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>