<?php

$page_id = is_404() ? 582 : get_the_ID();

$contact = get_field('contact', 'option');
$footer = get_field('footer', 'option');
$footer_cta = get_field('footer_cta', $page_id);

$title = !empty($footer['title']) ? $footer['title'] : 'Kom in contact met Enerzien';
$text = !empty($footer['text']) ? $footer['text'] : 'We helpen graag bij het realiseren van jouw verduurzamingsdoelstellingen';
$image = !empty($footer['image']['ID']) ? wp_get_attachment_image($footer['image']['ID'], 'cta_bg', false, ['class' => 'absolute z-1 top-0 left-0 object-cover object-start rounded-lg h-full w-full']) : '';
$link = !empty($footer['link']) ? $footer['link'] : [
    'title' => 'Neem contact op',
    'target' => '_self',
    'url' => esc_url(home_url('/contact/')),
];
?>

<footer class="relative text-base-content body-font bg-base-100 overflow-hidden">

    <?php if (!is_page('contact')) { ?>
        <div class="w-full relative z-2">
            <div class="container px-4 md:px-10 pt-18 lg:pt-36 pb-10 lg:pb-20 mx-auto target-viewport">

                <div class="flex justify-between items-center w-full flex-wrap">
                    <div class="font-manrope inline-flex flex-col justify-start items-start lg:max-w-lg mb-16 lg:mb-0">
                        <h2 class="h1">
                            <?php echo $title; ?>
                        </h2>
                        <p class="font-manrope text-primary font-extrabold text-xl mb-10">
                            <?php echo $text; ?>
                        </p>

                        <?php if (!empty($link)) { ?>
                            <a class="btn btn-secondary" href="<?php echo $link['url']; ?>"
                                title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
                                <span>
                                    <?php echo $link['title']; ?>
                                </span>
                                <?php echo btn_icon($link['url']); ?>
                            </a>
                        <?php } ?>
                    </div>

                    <div
                        class="inline-flex w-full font-manrope flex-col justify-start items-start lg:max-w-xs mb-0 lg:min-w-[370px]">
                        <?php get_template_part('includes/components/contact', 'details'); ?>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>

    <div class="relative z-2">
        <div class="container md:px-5 lg:pb-9 lg:pt-8 mx-auto flex items-center md:flex-row flex-col target-viewport">
            <nav id="menu-footer" class="flex justify-between items-center w-full flex-wrap text-left">

                <ul
                    class="text-base-content menu items-start inline-flex flex-wrap flex-row text-md lg:text-left mb-10 md:mb-0">
                    <?php wp_nav_menu([
                        'container' => false,
                        'menu_id' => 'menu-footer',
                        'menu_class' => 'menu',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'menu-footer',
                        'fallback_cb' => false,
                        'depth' => 1,
                    ]); ?>
                </ul>

                <ul
                    class="text-base-content menu items-start inline-flex flex-wrap flex-row text-md lg:text-right mb-10 md:mb-0">
                    <li class="menu-item">
                        <span>©
                            <?php echo wp_date('Y') . ' ' . get_bloginfo('name'); ?>
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>Webdesign door&nbsp;<a title="Ga naar website van Qore Digital"
                                href="https://qore.digital/?utm_source=<?php echo esc_html(get_site_url()); ?>&utm_medium=footer&utm_campaign=footerlink"
                                target="_blank" class="text-base-content font-bold">Qore Digital</a></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <?php if (!is_page('contact')): ?>
        <svg class="text-base-200 w-[960px] h-[1086px] hidden lg:block absolute bottom-[-365px] ml-0 z-1 left-1/2 select-none pointer-events-none"
            viewBox="0 0 960 1086" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m624.300333 793.476431 143.245287 82.667416-143.245287 82.701517zm-.221662-501.904133-.034102-165.539444 143.381694 82.778248zm-242.652502-191.7510631 73.178545-42.3802118c7.621788-4.4162039 16.125964-6.6200431 24.634404-6.6200431 8.499913 0 17.00409 2.2038392 24.617353 6.6072549l73.195596 42.3546353.038364 218.9175368-97.595549 56.349228-98.026086-56.596467zm-334.3356239 305.7283411-.0980793-84.5686c-.0212776-17.600874 9.3738126-33.86751 24.6259146-42.653027l73.2851136-42.196914 314.931608 181.827392c6.082937 3.512502 12.87349 5.268753 19.65978 5.268753 6.790553 0 13.576843-1.756251 19.664043-5.268753l314.927346-181.827392 73.285113 42.201176c15.252102 8.781255 24.647192 25.047891 24.625915 42.653028l-.098079 84.564337-314.931608 181.823129c-12.165875 7.025004-19.659781 20.009326-19.659781 34.055071v363.650522l-73.18707 42.367422c-7.617526 4.41194-16.121702 6.61152-24.625879 6.61152-8.504176 0-17.008353-2.19958-24.625878-6.61152l-73.182808-42.367422v-363.650522c0-14.050008-7.493906-27.030067-19.65978-34.055071zm287.6031489 333.572592-189.901031 109.688957-73.2936395-42.179863c-15.2521019-8.785517-24.6514549-25.04789-24.6301773-42.648764l.0810283-84.564338 190.2122115-109.867992 97.531608 56.3066zm387.052992-169.529372 190.0076 109.654855.115147 84.564337c.025524 17.600874-9.365304 33.871772-24.617406 42.65729l-73.272325 42.209702-189.679369-109.463031v-113.359181zm-387.308757-443.265812.034102 164.989549-142.904266-82.505431zm-287.897278 333.163369 143.633196 82.927443-143.633196 82.965807zm144.899231 416.649231 143.253812-82.748408v165.449926zm721.013494-250.747455-143.709925-82.931706 143.709925-82.97007zm10.563083-380.484102-407.548271-235.29926664c-22.187588-12.81381176-49.759023-12.80954902-71.946612 0l-407.5482701 235.29926664c-22.1875883 12.809549-35.9733059 36.685184-35.9733059 62.304282v470.598534c0 25.619098 13.7857176 49.494733 35.9733059 62.304282l407.5482701 235.299265c11.095926 6.40691 23.534616 9.60823 35.973306 9.60823 12.438691 0 24.881643-3.20132 35.973306-9.60823l407.552534-235.299265c22.187588-12.809549 35.969043-36.685184 35.969043-62.304282v-470.598534c0-25.619098-13.781455-49.494733-35.973306-62.304282z"
                fill="currentColor" opacity="0.64" transform="translate(.117647)" />
        </svg>
    <?php endif; ?>

</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>