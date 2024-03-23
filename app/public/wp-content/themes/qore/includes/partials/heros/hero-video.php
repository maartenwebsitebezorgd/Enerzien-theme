<?php
$page_id = is_404() ? 450 : get_the_ID();
$group = get_field('hero', $page_id);
?>

<section class="relative isolate overflow-hidden xl:-mt-20">
    <video class="absolute inset-0 -z-10 h-full w-full object-cover" autoplay loop muted playsinline>
        <source src="<?php echo $group['video_src'] ?>" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="absolute inset-0 overflow-hidden blur-3xl" aria-hidden="true"></div>
    <div class="container relative flex min-h-[min(100dvh,50rem)] items-end padding-section-medium z-20">
        <div class="max-w-2xl">
            <?php if (!empty ($group['subtitle'])): ?>
                <h5 class="mb-3 text-sm font-bold uppercase tracking-widest text-white sm:text-base">
                    <?php echo $group['subtitle']; ?>
                </h5>
            <?php endif; ?>
            <?php if (!empty ($group['titel'])): ?>
                <h1 class="h1 drop-shadow-xl text-white">
                    <?php echo $group['titel']; ?>
                </h1>
            <?php endif; ?>
            <?php if (!empty ($group['text'])): ?>
                <div class="mt-6 text-lg leading-8 text-white drop-shadow-xl">
                    <?php echo $group['text']; ?>
                </div>
            <?php endif; ?>
            <div class="mt-10 flex flex-wrap items-center gap-6">
                <?php if (!empty ($group['cta_1'])): ?>
                    <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                        class="transition-colors rounded-md bg-emerald-600 px-4 py-3.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                        <?php echo $group['cta_1']['title']; ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty ($group['cta_2'])): ?>
                    <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>"
                        class="font-semibold leading-6 text-white flex gap-2 items-center transition-all hover:gap-3">
                        <?php echo $group['cta_2']['title']; ?><span class="w-4" aria-hidden="true"><svg data-slot="icon"
                                fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                            </svg></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
        aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-black to-black opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>
</section>