<?php
$group = get_sub_field('testimonials');

?>
<?php if (!empty($group['choose_posts'])) : ?>
    <section class="mx-auto py-20 bg-white target-viewport w-full items-center" id="slider-testmonials-<?php the_ID(); ?>">
        <div class="container mx-auto relative pl-4 lg:pl-10">
            <div class="w-full flex flex-col lg:flex-row flex-nowrap justify-center lg:justify-between text-base-content items-center text-center lg:text-left 2xl:gap-40">

                <div class="flex flex-col w-full sm:max-w-sm">
                    <h2 class="h2"><?php echo __('Reviews', 'qore'); ?></h2>
                    <p class="text-primary text-lg font-manrope font-bold leading-relaxed">
                        <?php echo __('Dit is wat opdrachtgevers zeggen over hun samenwerking met Enerzien.', 'qore'); ?>
                    </p>
                </div>

                <!-- Carousel content -->
                <div class="slider-testmonials w-full swiper-container overflow-hidden pt-0 lg:pt-10 pb-10 lg:pb-20 text-center">
                    <div class="swiper-wrapper w-full max-w-2xl">
                        <?php $i = 0;
                        foreach ($group['choose_posts'] as $post) {
                            $el = get_field('reviews');
                            $content = get_the_content(null, false, $post->ID);
                            $name = !empty($el['name']) ? $el['name'] : get_the_title();
                            $function = !empty($el['function']) ? $el['function'] : '';
                            $company = !empty($el['company']) ? $el['company'] : '';
                            $url = !empty($el['url']) ? $el['url'] : '';
                        ?>

                            <div class="swiper-slide border bg-white rounded-md text-base-content inner text-left w-full flex-grow-1 px-4 py-8 md:p-8 lg:p-16 relative" id=<?php echo 'slide-' . $i; ?>>
                                <?php if (!empty($content)) { ?>
                                    <div class="mb-8">
                                        <?php echo $content; ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($name)) { ?>
                                    <h4 class="mt-0 mb-0 text-base"><?php echo $name; ?></h4>
                                <?php } ?>

                                <p class="text-md text-base-content mb-0">
                                    <?php if (!empty($url)) { ?>
                                        <span><?php echo $function; ?>, <a class="link link-primary" target="_blank" href="<?php echo $url; ?>"><?php echo $company; ?></a></span>
                                    <?php } else { ?>
                                        <span><?php echo $function; ?>, <?php echo $company; ?></span>
                                    <?php } ?>
                                </p>
                            </div>

                        <?php $i++;
                        } ?>

                    </div>
                    <div class="inline-flex flex-row flex-wrap items-center justify-center lg:justify-start mt-14 gap-2">
                        <div class="!relative block !h-auto w-6 !inset-auto swiper-button-prev after:hidden transform-none m-0 text-base-content hover:text-primary">
                            <svg class="!h-auto w-6 -rotate-180 transition-all text-base-content" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <g fill="currentColor" fill-rule="evenodd">
                                    <path d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z" />
                                    <path d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z" />
                                </g>
                            </svg>
                        </div>
                        <div class="!relative block !h-auto w-6 !inset-auto swiper-button-next after:hidden transform-none m-0 text-base-content hover:text-primary">
                            <svg class="!h-auto w-6 transition-all text-base-content" viewBox="0 0 20 20" xmlns="http://www.w3  .org/2000/svg">
                                <g fill="currentColor" fill-rule="evenodd">
                                    <path d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z" />
                                    <path d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="module">
            import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'
            var swiper = new Swiper(".slider-testmonials", {
                effect: 'coverflow',
                grabCursor: true,
                allowTouchMove: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                autoHeight: true,
                direction: 'horizontal',
                spaceBetween: 40,
                loop: true,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 75,
                    modifier: 1,
                    scale: 1,
                    slideShadows: false,
                },
                navigation: {
                    nextEl: '.slider-testmonials .swiper-button-next',
                    prevEl: '.slider-testmonials .swiper-button-prev',
                },
            });
        </script>
    </section>
<?php endif;
wp_reset_postdata(); ?>