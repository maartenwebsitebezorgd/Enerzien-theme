<div
    class="relative isolate flex flex-col justify-end overflow-clip rounded-xl bg-gray-900 p-4 md:p-6 aspect-[3/4] shadow-lg hover:shadow-sm transition-shadow">
    <div class="service_media-wrap">
        <div class="absolute inset-0 -z-20">
            <?php echo wp_get_attachment_image($item['image']['ID'], 'featured-team', false, ['class' => 'object-cover object-center h-full w-full']); ?>
        </div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-green-950 via-green-900/30"></div>
        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-green-950/10"></div>
    </div>
    <div class="service_body-wrap z-10">
        <div class="service_body-wrap flex flex-col">
            <h3 class="text-lg md:text-xl text-pretty text-white ">
                <a class="hover:!no-underline text-white" href="<?php echo $item['link']; ?>">
                    <span class="absolute inset-0"></span>
                    <?php echo $item['title']; ?>
                </a>
            </h3>
            <p class="opacity-90 text-pretty text-white text-md">
                <?php echo $item['text']; ?>
            </p>
        </div>
    </div>
</div>