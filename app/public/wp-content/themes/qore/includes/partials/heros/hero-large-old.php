<?php
$page_id = is_404() ? 450 : get_the_ID();
$group = get_field('hero', $page_id);

$get_partners_args = [
    'post_type' => 'partners',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'numberposts' => 3,
];

$show_partners = !empty($group['show_partners']) ? $group['show_partners'] : false;
$get_partners = !empty($group['partners']) ? $group['partners'] : get_posts($get_partners_args);

if (is_front_page()) {
    $inner = 'relative rounded-lg pt-20 sm:pt-32 pb-32 px-4 md:px-10 lg:px-20 lg:md-0 md:pb-20 overflow-hidden bg-base-100';
    $container = 'w-full md:container mx-auto lg:px-10 target-viewport';
} else {
    $inner = 'relative rounded-lg pt-20 sm:pt-32 pb-32 px-4 md:px-10 lg:px-20 lg:md-0 md:pb-20 overflow-hidden bg-base-100';
    $container = 'w-full md:container mx-auto lg:px-10 target-viewport';
}

$partner_slider = [
    'max_width' => true,
];
?>

<section class="hero hero-large text-base-content body-font relative overflow-hidden" id="hero">
    <div class="<?php echo $container; ?>">
        <div class="<?php echo $inner; ?>">

            <svg class="text-base-300 absolute z-1 h-[1285px] w-[1681px] left-[-53px] top-[-135px] pointer-events-none select-none" viewBox="0 0 701 532" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linejoin="round" stroke-width=".5" transform="matrix(0 -1 1 0 .286818 531.286818)">
                    <path d="m221.650902 184.545419-167.9295441-37.989581-53.7211577-141.89810774 136.5632898 43.88556894z" />
                    <path d="m53.7223589 146.555838-26.8612796 134.061149-26.86067889-275.95925674z" />
                    <path d="m349.28152 83.4507502-127.630618 101.0946688-85.087412-136.0021198 85.087412-28.7942426z" />
                    <path d="m372.189785 236.777464-86.17852 127.765756-117.437266-84.83816 53.076903-95.049529z" />
                    <path d="m515.791623 195.002038 14.782012 76.290479-158.38385-34.515053 66.542579-175.6063404z" />
                    <path d="m438.732364 61.1701226-66.542579 175.6073414-150.537882-52.232045 127.630618-101.0946688z" />
                    <path d="m438.732364 61.1701226-89.449843 22.2806276-127.630618-63.7016936 182.355195-15.09132634z" />
                    <path d="m438.732364 61.1701226 77.059259 133.8309144 14.782012-195.001037-126.566537 4.65773026z" />
                    <path d="m168.573999 279.70506-141.7129197.911927 26.8612796-134.061149 167.9285431 38.099693z" />
                    <path d="m315.737454 448.905896-29.725188-84.362676 86.17852-127.765756 79.191425 135.478589z" />
                    <path d="m172.562049 419.382913-99.8143685 4.921999-45.8876022-143.687925 141.7139207-.911927z" />
                    <path d="m504.183835 419.382913-52.801624-47.12686-79.191425-135.478589 158.382849 34.515053z" />
                    <path d="m315.737454 448.905896-143.174404-29.522983-3.989051-139.677853 117.438267 84.83816z" />
                    <path d="m257.64846 567.62146-197.1732431 29.625087 12.2724636-172.941635 99.8143685-4.921999z" />
                    <path d="m396.733711 520.893004-139.08425 46.728456-85.086411-148.238547 143.174404 29.522983z" />
                    <path d="m396.733711 520.893004-80.996257-71.987108 135.644757-76.649843 52.801624 47.12686z" />
                    <path d="m530.573635 580.882928-91.841271 44.906606-41.998653-104.89653 107.450124-101.510091z" />
                    <path d="m60.4762179 597.246547-51.11521113-8.444577-9.36050626-139.895073 72.74818099-24.601985z" />
                    <path d="m.00040041 448.905896 26.86067889-168.288909 45.8876022 143.687925z" />
                    <path d="m196.289146 700-102.2688617-15.425666-33.5440664-87.327787 197.1732431-29.625087z" />
                    <path d="m94.0202843 684.574134-94.019984 15.425666 9.36050627-111.19783 51.11541133 8.444577z" />
                    <path d="m438.732364 625.789534-55.906777 55.452616-125.176126-113.62069 139.08425-46.728456z" />
                    <path d="m196.289146 700 61.360315-132.37854 125.177127 113.621491z" />
                    <path d="m382.825587 681.242651 147.748048 14.099318v-114.459041l-91.841271 44.907607z" />
                    <path d="m136.56349 48.5432992-136.5632898-43.88556894 221.6507018 15.09132634z" />
                    <path d="m308.922533 515.454481 167.929544 37.989581 53.721558 141.897807-136.56369-43.885268z" />
                    <path d="m476.852077 553.444062 27.331758-133.724807 26.3898 275.622714z" />
                    <path d="m181.291915 616.54915 127.630618-101.094669 85.087412 136.00212-85.087412 28.794142z" />
                    <path d="m158.38365 463.222435 86.17852-127.765755 117.437266 84.838159-53.076903 95.04953z" />
                    <path d="m10.0271833 503.099934-10.0271833-54.635486 158.38365 14.757987-66.5425788 175.607342z" />
                    <path d="m91.8420722 638.829777 66.5425788-175.607342 150.537882 52.232046-127.630618 101.094669z" />
                    <path d="m91.8420722 638.829777 89.4498428-22.280627 127.630618 63.701393-182.355195 15.091326z" />
                    <path d="m91.8420722 638.829777-81.8143884-135.729843-10.02718329 196.899666 126.56683749-4.657731z" />
                    <path d="m362.000437 420.294839 142.183398-.575584-27.331758 133.724807-167.928543-38.099693z" />
                    <path d="m214.836982 251.094004 29.725188 84.362676-86.17852 127.765755-79.1914246-135.478588z" />
                    <path d="m358.011386 280.616987 99.814369-4.921999 46.357079 144.024267-142.183398.575584z" />
                    <path d="m26.3906015 280.616987 52.8016239 47.12686 79.1914246 135.478588-158.38294929-14.757987z" />
                    <path d="m214.836982 251.094004 143.174404 29.522983 3.989051 139.677852-117.438267-84.838159z" />
                    <path d="m272.924975 132.37844 197.173243-29.625087-12.272463 172.941635-99.814369 4.921999z" />
                    <path d="m133.839724 179.106896 139.085251-46.728456 85.086411 148.238547-143.174404-29.522983z" />
                    <path d="m133.839724 179.106896 80.997258 71.987108-135.6447566 76.649843-52.8016239-47.12686z" />
                    <path d="m.00040041 119.116972 91.84167179-44.9066061 41.9976518 104.8965301-107.4491225 101.510091z" />
                    <path d="m470.098218 102.753353 51.542345 16.363619 8.933072 152.174544-72.74788 4.403472z" />
                    <path d="m530.573635 271.292517-26.3898 148.426738-46.35808-144.024267z" />
                    <path d="m334.285291 0 102.26786 15.4256659 33.545067 87.3276871-197.173243 29.625087z" />
                    <path d="m436.553151 15.4256659 94.020484-15.4256659-8.933072 119.116972-51.542345-16.363619z" />
                    <path d="m91.8420722 74.2103659 55.9067778-55.4523158 125.176125 113.6203899-139.085251 46.728456z" />
                    <path d="m334.285291 0-61.360316 132.37844-125.177127-113.6213909z" />
                    <path d="m147.747848 18.7570491-147.7477479-14.09931884v114.45924174l91.8409711-44.9076071z" />
                    <path d="m394.009945 651.456601 136.56369 43.885469-221.651102-15.091327z" />
                </g>
            </svg>

            <span class="sm:hidden absolute bottom-0 left-0 w-full h-[128px] bg-white z-2"></span>

            <div class="grid grid-cols-12 lg:gap-x-6 text-left items-start relative z-2">

                <div class="order-2 xl:order-1 inline-flex flex-col flex-grow col-span-12 xl:col-span-6">

                    <?php if (!is_front_page()) : ?>
                        <?php get_template_part('includes/components/breadcrumbs'); ?>
                    <?php endif; ?>

                    <?php if (!empty($group['subtitle'])) : ?>
                        <h3 class="hero-subtitle block subtitle text-[#1cc6a5]">
                            <?php echo $group['subtitle']; ?>
                        </h3>
                    <?php endif; ?>

                    <h1 class="hero-title h1 block mb-8 text-base-content leading-xtight max-w-xl hyphens-auto sm:hyphens-none">
                        <?php echo !empty($group['titel']) ? $group['titel'] : get_the_title(); ?>
                    </h1>

                    <?php if (!empty($group['text'])) : ?>
                        <div class="hero-text block mb-6 leading-relaxed text-primary font-bold text-xl max-w-lg">
                            <?php echo $group['text']; ?>
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-row flex-wrap justify-start items-center max-w-[170px] md:max-w-none">

                        <?php if (!empty($group['cta_1'])) : ?>
                            <a title="<?php echo $group['cta_1']['title']; ?>" href="<?php echo $group['cta_1']['url']; ?>" class="group font-bold inline-flex justify-center items-center w-auto mb-6 <?php echo $group['cta_1_bg']; ?>" role="button" taget="<?php echo $group['cta_1']['target']; ?>">
                                <span class="hidden lg:block"><?php echo $group['cta_1']['title']; ?></span>
                                <span class="block lg:hidden"><?php echo !empty($group['cta_1_mobile_text']) ? $group['cta_1_mobile_text'] : $group['cta_1']['title']; ?></span>
                                <span class="hidden md:flex"><?php echo btn_icon($group['cta_1']['url']); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($group['cta_2'])) : ?>
                            <a title="<?php echo $group['cta_2']['title']; ?>" href="<?php echo $group['cta_2']['url']; ?>" class="group font-bold inline-flex justify-center items-center w-auto mb-6 <?php echo $group['cta_2_bg']; ?> sm:ml-5" role="button" taget="<?php echo $group['cta_2']['target']; ?>">
                                <span><?php echo $group['cta_2']['title']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if ($show_partners == true && !empty($get_partners)) : ?>
                        <div class="hidden md:flex flex-col items-start justify-start text-[#b5b5b5] mt-16 max-w-sm xl:max-w-none">

                            <div class="w-full">
                                <p>Met deze organisaties zijn wij de energietransitie al gestart</p>
                            </div>

                            <ul class="flex flex-row flex-wrap">
                                <?php foreach ($get_partners as $post) :
                                    $partners = get_field('partners');
                                    $partner = [
                                        'class' => 'inline-flex items-center justify-center box-content px-4 py-2',
                                        'title' => get_the_title(),
                                        'link' => $partners['url'],
                                        'image_id' => $partners['image']['id'],
                                        'target' => '_blank',
                                    ];
                                ?>
                                    <li class="mr-2 mb-2 inline-flex items-center justify-center box-content rounded-sm bg-white shadow-lg h-[66px]">
                                        <a href="<?= !empty($partner['link']) ? $partner['link'] : '#'; ?>" class="<?= empty($partner['link']) ? 'pointer-events-none' : ''; ?> <?= $partner['class']; ?>" title="<?= $partner['title']; ?>" target="<?= !empty($partner['target']) ? $partner['target'] : '_self'; ?>">
                                            <?php echo wp_get_attachment_image($partner['image_id'], 'large', false, ['class' => 'inline-block w-full h-auto max-h-[35px] max-w-[100px]']); ?>
                                        </a>
                                    </li>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="order-1 xl:order-2 inline-flex md:w-full md:h-auto md:max-w-[376px] xl:max-w-[516px] mb-16 xl:mb-0 col-span-12 xl:col-span-6 xl:relative xl:right-auto xl:bottom-auto absolute bottom-[-180px] md:bottom-[-120px] right-[-120px] w-[263px] h-[298px]">
                    <?php if (!empty($group['image'])) : ?>
                        <div class="mask mask-hexagon">
                            <?php echo wp_get_attachment_image($group['image']['ID'], 'shape-image', false, ['class' => 'w-full h-full']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>