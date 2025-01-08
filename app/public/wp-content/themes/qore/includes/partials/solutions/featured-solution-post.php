<div class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 p-8 aspect-[3/4]">
    <div class="service_media-wrap">
        <div class="absolute inset-0 -z-20">
            <?php echo wp_get_attachment_image($item['image']['ID'], 'post-thema', false, ['class' => 'object-cover object-center h-full w-full']); ?>
        </div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="service_body-wrap z-10">
        <div class="service_body-wrap flex flex-col">
            <h3 class="h5 text-pretty text-white ">
                <a class="hover:!no-underline text-white" href="<?php echo $item['link']; ?>">
                    <span class="absolute inset-0"></span>
                    <?php echo $item['title']; ?>
                </a>
            </h3>
            <p class="opacity-80 text-pretty text-white">
                <?php echo $item['text']; ?>
            </p>
        </div>
    </div>
</div>