<?php
$group = !empty(get_sub_field('cta')) ? get_sub_field('cta') : get_field('footer_cta', 9);
$title = !empty($group['title']) ? $group['title'] : 'Laat je informeren naar de mogelijkheden';
$text = !empty($group['text']) ? $group['text'] : 'Wil je meer weten over energieopwekking en de mogelijkheden die op jouw specifieke situatie van toepassing zijn? We maken graag een afspraak om kennis te maken.';
$bg = !empty($group['image']) ? $group['image']['sizes']['post-detail-image-retina'] : esc_url(get_template_directory_uri() . '/dist/img/cta_bg.jpg');
$btn = !empty($group['cta_1']) ? $group['cta_1'] : [
    'title' => 'Maak een afspraak',
    'target' => '_self',
    'url' => esc_url(home_url('/contact/')),
];
?>
<section class="cta bg-white py-20 lg:py-40 target-viewport relative" id="cta-<?php the_ID(); ?>">

    <span class="cta_after hidden w-full h-[320px] bg-base-100 absolute bottom-0 left-0"></span>

    <div class="container mx-auto px-4 md:px-10 relative overflow-hidden">
        <div class="pt-20 pb-15 px-6 lg:pb-36 lg:pt-40 lg:px-40 w-full relative overflow-hidden text-center bg-[#74A3A4] text-white rounded-md bg-cover bg-center bg-no-repeat" style="background-image: url(<?php echo $bg; ?>);">

            <span class="w-full h-full bg-primary bg-opacity-32 absolute top-0 left-0 z-1"></span>

            <div class="relative text-center z-2 flex flex-col items-start justify-center">

                <h2 class="h2 mb-6 text-center max-w-[542px] mx-auto text-white">
                    <?php echo $title; ?>
                </h2>

                <div class="w-full text-center max-w-[610px] mx-auto font-manrope font-extrabold text-lg">
                    <?php echo $text; ?>
                </div>

                <?php if (!empty($btn)) : ?>
                    <div class="flex flex-row flex-wrap items-center justify-center text-center w-full mt-8">
                        <a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="btn btn-secondary">
                            <?php echo $btn['title']; ?>
                            <?php echo btn_icon($btn['url']); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>