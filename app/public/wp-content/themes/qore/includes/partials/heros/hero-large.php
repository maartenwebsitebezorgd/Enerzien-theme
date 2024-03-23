<?php
$page_id = is_404() ? 450 : get_the_ID();
$group = get_field('hero', $page_id);
?>

<!-- hero-simple -->
<div class="bg-[#005555] padding-section-large xl:py-36 isolate overflow-hidden xl:-mt-20">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#00d084] to-[#7bdcb5] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>
    <div class="container flex flex-wrap">
        <div class="grid items-center justify-items-center gap-12 md:grid-cols-2">
            <div class="">
                <?php if (!empty ($group['subtitle'])): ?>
                    <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-white sm:text-base">
                        <?php echo $group['subtitle']; ?>
                    </h5>
                <?php endif; ?>

                <h1 class="text-pretty text-4xl font-bold tracking-tight text-white sm:text-6xl leading-xtight ">
                    <?php echo !empty ($group['titel']) ? $group['titel'] : get_the_title(); ?>
                </h1>
                <?php if (!empty ($group['text'])): ?>
                    <div class="mt-6 text-lg leading-8 text-white opacity-80">
                        <?php echo $group['text']; ?>
                    </div>
                <?php endif; ?>
                <div class="mt-10 flex flex-wrap items-center gap-6">
                    <?php if (!empty ($group['cta_1'])): ?>
                        <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                            class=" transition-colors rounded-md bg-emerald-600 px-4 py-3.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                            <?php echo $group['cta_1']['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty ($group['cta_2'])): ?>
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
            <?php if (!empty ($group['image'])): ?>
                <div class="mask mask-hexagon relative aspect-[1/1] w-full">
                    <?php echo wp_get_attachment_image($group['image']['ID'], 'shape-image', false, ['class' => 'h-full w-full object-cover']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- end hero -->