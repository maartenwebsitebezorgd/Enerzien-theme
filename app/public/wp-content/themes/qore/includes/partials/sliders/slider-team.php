<?php
$repeater = get_field('team', 'option');
$team = get_sub_field('team');

if (!empty($repeater)):
    $amount = count($repeater) >= 4 ? 4 : count($repeater);
    ?>
    <section class="py-20 lg:py-40 bg-white target-viewport w-full items-center" id="slider-team-<?php the_ID(); ?>">
        <div class="container relative px-6 max-w-[1422px] overflow-hidden">

            <div
                class="slider-team swiper-container w-full flex flex-row flex-wrap justify-start text-base-content items-center">

                <div
                    class="w-full mb-8 md:mb-12 flex flex-col lg:flex-row lg:justify-start justify-center items-center lg:items-start gap-6 lg:gap-20">
                    <div class="w-full lg:w-5/12 flex flex-col text-center lg:text-left">
                        <h2 class="h2 w-full lg:max-w-md mb-0">
                            <?php echo !empty($team['title']) ? $team['title'] : __('Onze vakkundig en energiek team', 'qore'); ?>
                        </h2>
                    </div>
                    <div class="w-full lg:w-7/12 max-w-md flex flex-col text-center lg:text-left">
                        <?php if (!empty($team['text'])): ?>
                            <p class="text-primary text-lg font-manrope font-bold leading-relaxed grow">
                                <?php echo $team['text']; ?>
                            </p>
                        <?php endif; ?>
                        <div class="flex flex-row flex-wrap items-center justify-center lg:justify-start mt-10 gap-2">
                            <div
                                class="!relative block !h-auto w-6 !inset-auto swiper-button-prev after:hidden transform-none m-0 text-base-content hover:text-primary">
                                <svg class="!h-auto w-6 -rotate-180 transition-all text-base-content" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g fill="currentColor" fill-rule="evenodd">
                                        <path
                                            d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z" />
                                        <path
                                            d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z" />
                                    </g>
                                </svg>
                            </div>
                            <div
                                class="!relative block !h-auto w-6 !inset-auto swiper-button-next after:hidden transform-none m-0 text-base-content hover:text-primary">
                                <svg class="!h-auto w-6 transition-all text-base-content" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g fill="currentColor" fill-rule="evenodd">
                                        <path
                                            d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z" />
                                        <path
                                            d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel content -->
                <div class="swiper-wrapper flex w-full">
                    <?php foreach ($repeater as $key => $lid): ?>
                        <div class="swiper-slide h-full grow py-6 inline-flex w-auto flex-col relative" id=<?php echo 'slide-' . $key; ?>>
                            <div
                                class="inline-flex flex-col bg-white rounded-md text-base-content inner p-6 text-left shadow border border-gray-100">
                                <?php if ($lid['image']): ?>
                                    <div class="bg-base-100 w-full mb-6 flex items-end justify-center pt-5">
                                        <?php echo wp_get_attachment_image($lid['image']['ID'], 'team', false, ['class' => 'w-auto h-auto max-h-[180px] mx-auto']); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="h4 mb-1">
                                    <?php echo $lid['name']; ?>
                                </h2>
                                <?php if ($lid['function']): ?>
                                    <p>
                                        <?php echo $lid['function']; ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ($lid['linkedin']): ?>
                                    <a class="flex gap-2 hover:underline text-inherit" href="<?php echo $lid['linkedin']; ?>">
                                        <span>
                                            <?php echo 'over ' . $lid['name']; ?>
                                        </span>
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M18.335 18.339H15.67v-4.177c0-.996-.02-2.278-1.39-2.278-1.389 0-1.601 1.084-1.601 2.205v4.25h-2.666V9.75h2.56v1.17h.035c.358-.674 1.228-1.387 2.528-1.387 2.7 0 3.2 1.778 3.2 4.091v4.715zM7.003 8.575a1.546 1.546 0 0 1-1.548-1.549 1.548 1.548 0 1 1 1.547 1.549zm1.336 9.764H5.666V9.75H8.34v8.589zM19.67 3H4.329C3.593 3 3 3.58 3 4.297v15.406C3 20.42 3.594 21 4.328 21h15.338C20.4 21 21 20.42 21 19.703V4.297C21 3.58 20.4 3 19.666 3h.003z" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endforeach;
                    wp_reset_postdata(); ?>

                </div>
            </div>
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
    </section>
<?php endif; ?>