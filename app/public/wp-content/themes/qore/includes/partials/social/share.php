<?php
global $wp;
$current_url = home_url(add_query_arg([], $wp->request));
?>

<div class="share md:sticky md:top-36 inline-flex flex-col items-center justify-center w-6 h-auto pt-19">
    <span class="absolute top-[21px] text-gray-300 -left-6 rotate-90 whitespace-nowrap"><?php echo __('Delen via', 'qore'); ?>:</span>
    <ul class="list-none inline-flex flex-col items-center justify-start">
        <li class="list-none facebook">
            <a target="_blank" onclick="return share(this);" rel="external nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" data-gacategory="Vacatures" data-gaaction="Delen via Facebook" data-galabel="Bron: <?php echo $current_url; ?>" class="text-[#3b5998] hover:bg-[#3b5998] focus:bg-[#3b5998] hover:bg-opacity-15 focus:bg-opacity-15 facebook fill-current mt-3 transition-all h-12 w-12 bg-white inline-flex justify-center items-center border border-solid border-base-100" title="Facebook">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z" />
                </svg>
            </a>
        </li>
        <li class="list-none twitter">
            <a target="_blank" onclick="return share(this);" rel="external nofollow" href="https://twitter.com/intent/tweet/?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" data-gacategory="Vacatures" data-gaaction="Delen via Twitter" data-galabel="Bron: <?php echo $current_url; ?>" class="text-[#00acee] hover:bg-[#00acee] focus:bg-[#00acee] hover:bg-opacity-15 focus:bg-opacity-15 twitter fill-current mt-3 transition-all h-12 w-12 bg-white inline-flex justify-center items-center border border-solid border-base-100" title="Twitter">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z" />
                </svg>
            </a>
        </li>
        <li class="list-none linkedin">
            <a target="_blank" onclick="return share(this);" rel="external nofollow" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" data-gacategory="Vacatures" data-gaaction="Delen via LinkedIn" data-galabel="Bron: <?php echo $current_url; ?>" class="text-[#0e76a8] hover:bg-[#0e76a8] focus:bg-[#0e76a8] hover:bg-opacity-15 focus:bg-opacity-15 linkedin fill-current mt-3 transition-all h-12 w-12 bg-white inline-flex justify-center items-center border border-solid border-base-100" title="LinkedIn">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z" />
                </svg>
            </a>
        </li>
    </ul>
</div>