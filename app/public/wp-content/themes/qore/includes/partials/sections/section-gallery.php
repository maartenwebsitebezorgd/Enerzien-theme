<?php
$group = get_sub_field('gallery');
$repeatertop = $group['media_top'];
$repeaterbottom = $group['media_bottom'];
?>


<!-- gallery -->
<div class="overflow-hidden padding-section-medium">
    <div class="container">
        <div class="section-header grid gap-6 sm:gap-10 md:grid-cols-2 md:gap-12 lg:gap-20">
            <div class="flex flex-col items-start">
                <?php if (!empty($group['subtitle'])): ?>
                        <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                            <?php echo $group['subtitle']; ?>
                        </h5>
                <?php endif; ?>
                <?php if (!empty($group['title'])): ?>
                        <h2 class="text-pretty text-3xl font-bold sm:text-4xl lg:text-5xl leading-xtight">
                            <?php echo $group['title']; ?>
                        </h2>
                <?php endif; ?>
                <?php if (!empty($group['cta_1'])): ?>
                    <div class="mt-10 flex items-center gap-x-6">
                        <?php if (!empty($group['cta_1'])): ?>
                                <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                                    class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                                    <?php echo $group['cta_1']['title']; ?>
                                </a>
                        <?php endif; ?>
                        <?php if (!empty($group['cta_2'])): ?>
                                <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                                    class="font-semibold leading-6 text-gray-900 flex gap-2 items-center transition-all hover:gap-3">
                                    <?php echo $group['cta_2']['title']; ?><span class="w-4" aria-hidden="true"><svg
                                            data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                                        </svg></span>
                                </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <?php if (!empty($group['text'])): ?>
                        <div class="text-pretty text-base md:text-lg">
                            <?php echo $group['text']; ?>
                        </div>
                    </div>
            <?php endif; ?>
        </div>

        <div class="relative inset-x-2/4 ml-[-50vw] mr-[-50vw] mt-20 flex w-screen flex-col gap-2 md:gap-3">
            <div class="-ml-[20vw] grid auto-cols-[1fr] grid-flow-col grid-cols-[1fr] gap-2 md:-ml-[15vw] md:gap-3">
                <?php foreach ($repeatertop as $key => $lid): ?>
                        <div class="col-span-1 aspect-[4/3] w-[40vw] overflow-hidden md:w-[30vw]">
                            <?php echo wp_get_attachment_image($lid['image']['ID'], 'gallery', false, ['class' => 'h-full w-full object-cover']); ?>
                        </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
            <div class="grid auto-cols-[1fr] grid-flow-col grid-cols-[1fr] gap-2 md:gap-3">
                <?php foreach ($repeaterbottom as $key => $lid): ?>
                        <div class="col-span-1 aspect-[4/3] w-[40vw] overflow-hidden md:w-[30vw]">
                            <?php echo wp_get_attachment_image($lid['image']['ID'], 'gallery', false, ['class' => 'h-full w-full object-cover']); ?>
                        </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end gallery -->