<?php
$group = get_sub_field('image_textblock');
$align = !empty($group['align']) ? $group['align'] : 'items-start';
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-medium';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-medium';
?>

<section class=" <?php echo $padding_top ?>  <?php echo $padding_bottom ?>">
    <div class="container">
        <div class="grid grid-cols-1 items-center justify-items-center gap-12 md:gap-20 md:grid-cols-2">
            <div>
                <?php if (!empty($group['subtitle'])): ?>
                    <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                        <?php echo $group['subtitle']; ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($group['title'])): ?>
                    <h2 class="text-pretty h3">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($group['text'])): ?>
                    <div class="mt-5 text-pretty text-base md:text-lg lg:text-xl">
                        <?php echo the_content_more($group['text']); ?>
                    </div>
                <?php endif; ?>
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
            </div>
            <div class="<?php echo $group['image_right'] == true ? 'order-last' : 'order-first'; ?>">
                <div>
                    <div class="mask mask-hexagon ">
                        <?php if (!empty($group['image'])): ?>
                            <?php echo wp_get_attachment_image($group['image']['ID'], 'shape-image', false, ['class' => 'object-cover w-full']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>