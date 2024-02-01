<?php

$repeater = get_field('team', 'option');
$group = get_sub_field('team-featured');

if (!empty($repeater)):
    $amount = count($repeater) >= 4 ? 4 : count($repeater);

    ?>


    <section class="overflow-hidden padding-section-medium">
        <div class="container">

            <div class="mb-12 flex max-w-2xl flex-col lg:max-w-3xl">
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
                <?php if (!empty($group['text'])): ?>
                    <p class="mt-5 text-pretty text-lg lg:text-xl">
                        <?php echo the_content_more($group['text']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Swiper -->
            <div class="swiper-container slider-team">
                <!-- Swiper Wrapper-->
                <div class="swiper-wrapper flex w-full">
                    <?php foreach ($repeater as $key => $lid): ?>
                        <!-- Swiper Slide -->
                        <div class="swiper-slide h-full grow inline-flex w-auto flex-col relative" id=<?php echo 'slide-' . $key; ?>>
                            <!-- team item -->
                            <div class="flex w-full flex-col bg-gray-50 rounded-md overflow-hidden">
                                <div team-media class="relative w-full overflow-hidden">
                                    <?php if ($lid['image']): ?>
                                        <div class="aspect-[3/4]">
                                            <?php echo wp_get_attachment_image($lid['image']['ID'], 'full', false, ['class' => 'h-full w-full object-cover']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div team-body class="flex grow flex-row justify-between space-x-4 p-5">
                                    <div team-body-top class="space-y-1">
                                        <?php if ($lid['name']): ?>
                                            <h3 class="text-xl font-bold">
                                                <?php echo $lid['name']; ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if ($lid['function']): ?>
                                            <p class="text-emerald-600">
                                                <?php echo $lid['function']; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div team-body-bottom>
                                        <?php if ($lid['linkedin']): ?>
                                            <a href="<?php echo $lid['linkedin']; ?>"
                                                class="flex size-6 flex-col items-center justify-center text-gray-800 hover:text-gray-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    aria-hidden="true" role="img" class="iconify iconify--bx" width="100%"
                                                    height="100%" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                                    <path
                                                        d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8.339 18.337H5.667v-8.59h2.672v8.59zM7.003 8.574a1.548 1.548 0 1 1 0-3.096a1.548 1.548 0 0 1 0 3.096zm11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277c-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387c2.704 0 3.203 1.778 3.203 4.092v4.71z"
                                                        fill="currentColor" />
                                                </svg></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php if (!empty($group['banner_text'])): ?>
                <div class="mt-6">
                    <div
                        class="relative isolate flex items-center justify-center gap-x-6 overflow-hidden rounded-md bg-gray-50 px-6 py-2.5 sm:px-3.5 md:rounded-full">
                        <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl"
                            aria-hidden="true">
                            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#7bdcb5] to-[#00d084] opacity-30"
                                style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)">
                            </div>
                        </div>
                        <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl"
                            aria-hidden="true">
                            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#7bdcb5] to-[#00d084] opacity-30"
                                style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)">
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
                            <p class="text-sm leading-6 text-gray-900 mb-0">
                                <strong class="font-semibold">
                                    <?php echo $group['banner_bold']; ?>
                                </strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <?php echo $group['banner_text']; ?>
                            </p>
                            <?php if (!empty($group['cta_1'])): ?>
                                <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>"
                                    class="rounded-full bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">
                                    <?php echo $group['cta_1']['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <script type="module">
            import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'
            var swiper = new Swiper(".slider-team", {
                grabCursor: true,
                allowTouchMove: true,
                centeredSlides: false,
                autoHeight: false,
                centeredSlides: false,
                direction: 'horizontal',
                loopFillGroupWithBlank: true,
                spaceBetween: 24,
                loop: false,
                slidesPerView: 1,
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                    1280: {
                        slidesPerView: 3.5,
                    },
                    1446: {
                        slidesPerView: <?php echo $amount; ?>,
                    },
                },
                navigation: {
                    nextEl: '.slider-team .swiper-button-next',
                    prevEl: '.slider-team .swiper-button-prev',
                },
            });
        </script>
    <?php endif; ?>
</section>