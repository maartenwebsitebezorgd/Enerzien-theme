<div class="offcanvas fixed top-0 left-0 w-full z-40 transition-all duration-500 ease-in-out" id="offcanvas-menu">

    <div class="offcanvas-background fixed top-0 left-0 w-full h-full min-h-full bg-primary bg-opacity-32 -z-1"></div>
    <div
        class="offcanvas-content transition-all duration-350 ease-in-out absolute top-0 right-0 min-h-full bg-white flex flex-grow-1 flex-col justify-start items-start text-left shadow-lg w-full max-w-lg">

        <div class="px-0 md:px-20 py-10 md:py-20 w-full flex-grow-1">
            <ul class="main text-2xl font-bold menu items-start w-full mb-8">
                <?php wp_nav_menu([
                    'container' => false,
                    'menu_id' => 'menu-main',
                    'menu_class' => 'menu',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'menu-main',
                    'fallback_cb' => false,
                    'depth' => 2,
                ]); ?>
            </ul>
        </div>
        <div class="flex flex-col gap-4 w-full px-4">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="rounded-md bg-stone-200 px-3.5 py-2.5 text-base font-semibold tracking-wide text-stone-900 shadow-sm hover:bg-stone-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stone-300">Werken
                Bij</a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-base font-semibold tracking-wide text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Gratis
                Advies</a>
        </div>
    </div>
</div>