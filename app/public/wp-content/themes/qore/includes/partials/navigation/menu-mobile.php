<div class="offcanvas fixed top-0 left-0 w-full z-40 transition-all duration-500 ease-in-out" id="offcanvas-menu">
    
    <div class="offcanvas-background fixed top-0 left-0 w-full h-full min-h-full bg-primary bg-opacity-32 -z-1"></div>
    <div class="offcanvas-content transition-all duration-350 ease-in-out absolute top-0 right-0 min-h-full bg-white flex flex-grow-1 flex-col justify-start items-start text-left shadow-lg w-full max-w-lg">

        <div class="px-0 md:px-20 py-10 md:py-20 w-full flex-grow-1">
            <div class="px-5 py-3">
                <h3 class="h2">Menu</h3>
            </div>
            <ul class="main text-2xl font-bold menu items-start w-full mb-8">
                <?php wp_nav_menu([
                    'container' => false,
                    'menu_id' => 'menu-main',
                    'menu_class' => 'menu',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'menu-main',
                    'fallback_cb' => false,
                    'depth' => 1,
                ]); ?>
            </ul>
        </div>
        <div class="px-4 md:px-20 py-10 md:py-20 w-full">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary normal-case w-full">
                <span>Neem contact op</span>
                <?php echo btn_icon('contact'); ?>
            </a>
        </div>
    </div>
</div>