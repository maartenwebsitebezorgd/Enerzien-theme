<?php

$hide = false;
$title = $args['title'];
$slides = $args['slide'];
?>

<section data-partial="<?php echo basename(__FILE__, '.php'); ?>" class="relative flex flex-col pt-16 pb-28 lg:pt-20 2xl:pt-40 2xl:pb-32 bg-gray-100 text-center w-full overflow-hidden">
    <div class="container">
        <?php if ($title) : ?><h2 class="h1 mb-10 lg:mb-16"><?php echo $title; ?></h2><?php endif; ?>
        <div class="swiper testimonialCards overflow-visible">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $slide) :
                    $text = $slide['text'];
                    $reviewer_image = $slide['reviewer_image'];
                    $reviewer = $slide['reviewer'];
                ?>
                    <div class="swiper-slide w-full max-w-[760px] h-auto bg-white shadow">
                        <div class="card py-10 px-6 md:py-20 md:px-16 text-left md:text-center md:items-center md:justify-center">
                            <?php echo renderStarRating(5, 5); ?>
                            <?php if ($text) : ?><p><?php echo $text; ?></p><?php endif; ?>
                            <div class="flex flex-row items-center justify-start text-left not-prose">
                                <div class="w-12 h-12 rounded-full mr-4 relative">
                                    <img class="w-12 h-12 rounded-full" src="<?php if ($reviewer_image) : echo $reviewer_image['url'];
                                                                                else : echo "https://dummyimage.com/96x96";
                                                                                endif; ?>" alt="placeholder">
                                    <div class="circle absolute w-5 h-5 bottom-0 right-0 bg-white" title="Geplaatst via Google Reviews">
                                        <svg height="40" viewBox="0 0 40 40" width="40" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle cx="20" cy="20" r="19.5" stroke="#dfe4ea" />
                                                <g fill-rule="nonzero" transform="translate(10 10)">
                                                    <path d="m4.43242188 12.08625-.69617188 2.5989063-2.54449219.0538281c-.76042968-1.4104297-1.19175781-3.0241406-1.19175781-4.7389844 0-1.65824219.40328125-3.22199219 1.118125-4.59890625h.00054687l2.26531251.4153125.99234375 2.25171875c-.20769532.60550781-.32089844 1.25550781-.32089844 1.931875.00007812.7340625.13304687 1.4373828.37699219 2.08625z" fill="#fbbb00" />
                                                    <path d="m19.8252734 8.131875c.1148438.60492187.1747266 1.22964844.1747266 1.868125 0 .7159375-.0752734 1.4142969-.2186719 2.0879297-.4867968 2.2923047-1.758789 4.2939453-3.5208593 5.7104297l-.0005469-.0005469-2.8532813-.1455859-.4038281-2.5208985c1.1692188-.6857031 2.0829688-1.758789 2.5642969-3.0433984h-5.3472656v-3.9560547h5.4252734z" fill="#518ef8" />
                                                    <path d="m16.2598828 17.7978125.0005469.0005469c-1.7137109 1.3774609-3.8906641 2.2016406-6.2604297 2.2016406-3.80824219 0-7.11921875-2.1285547-8.80824219-5.2609766l3.24066407-2.6527343c.84449218 2.2538281 3.01867187 3.8582422 5.56757812 3.8582422 1.0955859 0 2.1219922-.2961719 3.0027344-.8132032z" fill="#28b446" />
                                                    <path d="m16.3829687 2.3021875-3.2395703 2.6521875c-.9115234-.56976563-1.9890234-.89890625-3.1433984-.89890625-2.60660156 0-4.82144531 1.67800781-5.62363281 4.01265625l-3.25769532-2.66703125h-.00054687c1.66429687-3.20878906 5.01703125-5.40109375 8.881875-5.40109375 2.4263672 0 4.6510937.86429688 6.3829687 2.3021875z" fill="#f14336" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <strong class="block w-full leading-snug"><?php echo $reviewer; ?></strong>
                                    <small class="block w-full leading-snug">2 dagen geleden</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel arrows -->
            <div class="swiper-button-prev md:flex button-secondary-alt text-secondary focus:bg-secondary focus:text-white hover:bg-secondary hover:text-white after:hidden h-10 w-10 p-0 text-lg rounded-full shrink-0 leading-none top-full mt-8 lg:mt-0 lg:top-1/2">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="swiper-button-next md:flex button-secondary-alt text-secondary focus:bg-secondary focus:text-white hover:bg-secondary hover:text-white after:hidden h-10 w-10 p-0 text-lg rounded-full shrink-0 leading-none top-full mt-8 lg:mt-0 lg:top-1/2">
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-all duration-200 ease-out"></i>
            </div>

        </div>
        <div class="flex items-center justify-center text-center w-full mt-16">
            <a class="button-secondary-alt button-large group" title="Bekijk alle reviews op Google" target="_blank" href="https://www.google.com/search?q=revolutionairgezond&oq=revolutionairgezond&aqs=chrome..69i57j69i60l6j69i65.3981j0j7&sourceid=chrome&ie=UTF-8#lrd=0x47c8aadbaa71ddb7:0x2a3a5dfdf5f763ca,1,,,">
                <span class="font-heading mr-3">Bekijk alle reviews</span>
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-all duration-200 ease-out"></i>
            </a>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'
        var swiper = new Swiper(".testimonialCards", {
            effect: 'coverflow',
            grabCursor: true,
            allowTouchMove: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            direction: 'horizontal',
            initialSlide: 1,
            loop: false,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 1000,
                modifier: 1,
                scale: 1,
                slideShadows: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</section>