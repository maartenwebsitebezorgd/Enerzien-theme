<?php
$group = !empty(get_sub_field('cta')) ? get_sub_field('cta') : get_field('footer_cta', 9);
?>

<div class="padding-section-small">
    <div class="container">
        <div
            class="relative isolate overflow-hidden bg-[#055] px-6 pt-16 shadow-2xl rounded sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
            <svg viewBox="0 0 1024 1024"
                class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                    fill-opacity="0.7" />
                <defs>
                    <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                        <stop stop-color="#002E2E" />
                        <stop offset="1" stop-color="#000" />
                    </radialGradient>
                </defs>
            </svg>
            <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                <?php if (!empty($group['subtitle'])): ?>
                    <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                        <?php echo $group['subtitle']; ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($group['title'])): ?>
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl leading-xtight">
                        <?php echo $group['title']; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($group['text'])): ?>
                    <div class="mt-5 text-lg leading-8 text-gray-200">
                        <?php echo $group['text']; ?>
                    </div>
                <?php endif; ?>
                <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                    <?php if (!empty($group['cta_1'])): ?>
                        <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                            class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                            <?php echo $group['cta_1']['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($group['cta_2'])): ?>
                        <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                            class="font-semibold leading-6 text-white flex gap-2 items-center transition-all hover:gap-3">
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
            <?php if (!empty($group['image'])): ?>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <?php echo wp_get_attachment_image($group['image']['ID'], 'shape-image', false, ['class' => 'absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>