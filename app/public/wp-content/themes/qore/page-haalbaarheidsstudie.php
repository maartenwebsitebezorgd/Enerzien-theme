<?php

get_header();

$form_id = 3;
$form_title = false;
$form_description = false;
$form_inactive = false;
$form_ajax = true;
$form_index = true;
$form_echo = false;
$form_values = [];
$form = gravity_form($form_id, $form_title, $form_description, $form_inactive, $form_values, $form_ajax, $form_index, $form_echo);

$contact = get_field('contact', 'option');
$address = get_field('address', 'option');
$next_steps = get_field('next_steps');
$group = get_field('contact');

$modal_status = !empty($_GET['submit']) && $_GET['submit'] == 'true' ? 'checked' : '';

?>

<main class="main main-page w-full relative" role="main">

    <?php get_template_part('includes/partials/heros/hero', 'choose'); ?>

    <article class="flex flex-col text-base-content flex-grow-1 bg-base-100 md:mt-32" id="content">

        <div class="w-full relative z-2">
            <div class="container md:px-10 pt-0 md:pb-20 mx-auto">
                <div class="grid grid-cols-12 md:gap-x-20">

                    <div class="col-span-12 lg:col-span-8 flex flex-col justify-start items-start mb-10 md:mb-0 md:-mt-20 target-viewport">

                        <div class="relative w-full text-base-300 leading-relaxed flex justify-center items-start">
                            <div class="text-left rounded-sm w-full max-w-4xl mx-auto">
                                <div class="bg-white px-4 sm:px-10 lg:px-16 py-10 lg:py-20 md:rounded-md md:shadow-lg w-full">

                                    <div class="mb-10">
                                        <h2 class="h2 text-base-content mb-4">
                                            <span><?php echo !empty($group['form_title']) ? $group['form_title'] : __('Stuur ons een bericht'); ?></span>
                                        </h2>

                                        <p class="font-manrope font-bold text-base-content text-lg">
                                            <?php echo !empty($group['form_text']) ? $group['form_text'] : 'We komen hier binnen twee werkdagen bij je op terug.'; ?>
                                        </p>
                                    </div>

                                    <?php echo $form; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:px-0 col-span-12 lg:col-span-4 font-manrope inline-flex flex-col justify-start items-start md:max-w-xs mb-10 md:mb-0 mt-20 md:mt-40 target-viewport">
                        <?php get_template_part('includes/components/contact', 'details'); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!--googleoff: index-->
    <!-- <label for="modal_gform_contact" class="btn btn-primary modal-button" aria-hidden="true">open modal</label>  -->
    <input type="checkbox" id="modal_gform_contact" class="modal-toggle" aria-hidden="true" <?php echo $modal_status; ?>>

    <div class="modal" aria-hidden="true">

        <span class="modal-background absolute top-0 left-0 bottom-0 right-0 w-full h-full bg-[#001e1d] opacity-32"></span>

        <div class="modal-box p-0 w-full max-w-4xl rounded-lg text-center">
            <div class="pt-30 pb-16 md:py-16 px-4 md:px-24 bg-base-100 mx-auto overflow-hidden relative">

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

                <div class="relative z-2">
                    <h3 class="subtitle text-[#1cc6a5]">
                        <?php echo !empty($next_steps['subtitle']) ? $next_steps['subtitle'] : 'Dank je wel voor je bericht'; ?>
                    </h3>
                    <h2 class="h2 mb-4">
                        <?php echo !empty($next_steps['title']) ? $next_steps['title'] : 'We hebben je contactaanvraag ontvangen'; ?>
                    </h2>
                    <div class="w-full max-w-xl mx-auto">
                        <p><?php echo !empty($next_steps['text']) ? $next_steps['text'] : 'Bedankt voor je bericht, goed om van je te horen. We zijn benieuwd met welk energietransitie vraagstuk onze experts je kunnen helpen.'; ?></p>
                    </div>
                </div>
            </div>

            <?php if (!empty($next_steps['items'])): ?>
                            <div class="py-14 md:py-16 px-4 md:px-16 bg-white">

                                <h2 class="h3 mb-12">
                                    <?php echo !empty($next_steps['items_title']) ? $next_steps['items_title'] : 'Wat gebeurt er nu?'; ?>
                                </h2>

                                <div class="items relative w-full">
                                    <div class="hidden sm:block absolute top-[26px] left-1/2 w-full h-0 border-dashed border-b-2 border-base-200 z-1 ml-[-256px] max-w-[512px]"></div>
                                    <ul class="relative w-full grid grid-cols-1 sm:grid-cols-3 sm:gap-x-14 z-2 text-left sm:text-center">
                                        <?php foreach ($next_steps['items'] as $key => $value):
                                            $nr = $key + 1;
                                            if (!empty($value['title'])) { ?>
                                                                        <li class="stap mb-10 flex justify-start items-start flex-row sm:flex-col sm:justify-center sm:items-center">
                                                                            <span class="text-2xl w-14 h-14 mb-4 rounded-full bg-primary-tint inline-flex items-center justify-center font-bold text-white flex-shrink-0 mr-8 md:mr-0">
                                                                                <?php echo $nr; ?>
                                                                            </span>
                                                                            <p class="text-base"><?php echo $value['title']; ?></p>
                                                                        </li>
                                                    <?php }
                                        endforeach; ?>
                                    </ul>
                                </div>

                                <div class="modal-action justify-center">
                                    <a title="Terug naar de homepage" href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary md:w-auto w-full">
                                        <span>Terug naar home</span>
                                        <svg class="ml-3 fill-current w-5 h-5" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m17.2725971 15.1315799v-8.93974806l1.3504357.81027961c.4305395.25830549.9889863.11871653 1.2472554-.31180474.25836-.43052127.1187256-.98893166-.3118139-1.24724624l-4.5652999-2.73919817-3.4919513-2.10386157-.000091-.00006364c-.2538146-.15292514-.4486301-.27029623-.6137187-.35854046-.0385449-.02155424-.0776352-.04160851-.1172711-.06014461-.1374526-.06705361-.2565418-.11168935-.3789038-.13865261-.2577236-.05679921-.52481083-.05679921-.78253451 0-.12272556.02703598-.24208753.07183536-.3799947.13917987-.03890855.01823611-.07727165.03792675-.11518021.05906282-.16527043.08831695-.36035861.20585167-.6147187.35910408l-.00009091.00002727-3.49714215 2.10703426-4.56008186 2.73605276c-.43052127.25831458-.57012115.81672497-.31180475 1.24724624.25830549.43052127.81671589.57011023 1.24723716.31180474l1.35041753-.81024324v8.93971169c0 1.0183495 0 1.5274333.19816996 1.9163369.17430666.3421771.45244824.6202641.79456165.7946253.38892185.1980882.89806021.1980882 1.91631873.1980882h1.63634082v-5.4544694c0-1.5062518 1.22098298-2.72723474 2.7272347-2.72723474 1.50625174 0 2.72723474 1.22098294 2.72723474 2.72723474v5.4544694h1.6363408c1.0182585 0 1.5274332 0 1.9163369-.1980882.3420861-.1743612.6202641-.4524482.7945344-.7946253.198179-.3889036.198179-.8979874.198179-1.9163369z" fill="currentColor" fill-rule="evenodd" transform="translate(0 -.04063)" />
                                        </svg>
                                    </a>
                                    <!-- <label for="modal-gform-submit" class="btn">Close</label> -->
                                </div>
                            </div>
            <?php endif; ?>

        </div>
    </div>
    <!--googleon: index-->

</main>

<?php get_footer(); ?>