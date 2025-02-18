<?php
$group = get_sub_field('video_swiper');
$repeater = $group['videos_list'];
$padding_top = !empty($group['padding_top']) ? $group['padding_top'] : 'padding-top-medium';
$padding_bottom = !empty($group['padding_bottom']) ? $group['padding_bottom'] : 'padding-bottom-medium';
?>

<div class="<?php echo $padding_top ?>  <?php echo $padding_bottom ?> relative overflow-hidden">
    <div class="container">
        <div class="max-w-3xl ">
            <?php if (!empty($group['subtitle'])): ?>
                <h5 class="mb-4 text-sm font-bold uppercase tracking-widest text-emerald-600 sm:text-base">
                    <?php echo $group['subtitle']; ?>
                </h5>
            <?php endif; ?>
            <?php if (!empty($group['title'])): ?>
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl leading-xtight">
                    <?php echo $group['title']; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($group['text'])): ?>
                <div class="mt-5 text-lg leading-8">
                    <?php echo $group['text']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mt-16">
            <!-- Swiper -->
            <div class="swiper-container slider-videos-list">
                <!-- Swiper Wrapper-->
                <div class="swiper-wrapper flex w-full">
                    <?php foreach ($repeater as $key => $item): ?>
                        <!-- Swiper Slide -->
                        <div class="swiper-slide">
                            <?php
                            // Pass the $item to the template part
                            set_query_var('item', $item);
                            get_template_part('includes/partials/videos/short-video', 'component');
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'
    var swiper = new Swiper(".slider-videos-list", {
        grabCursor: true,
        allowTouchMove: true,
        centeredSlides: false,
        autoHeight: false,
        centeredSlides: false,
        direction: 'horizontal',
        loopFillGroupWithBlank: true,
        spaceBetween: 12,
        loop: false,
        slidesPerView: 1.1,
        breakpoints: {
            480: {
                slidesPerView: 1.5,
                spaceBetween: 12,
            },
            768: {
                slidesPerView: 2.2,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            1446: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
        },
        navigation: {
            nextEl: '.slider-services .swiper-button-next',
            prevEl: '.slider-services .swiper-button-prev',
        },
    });
</script>