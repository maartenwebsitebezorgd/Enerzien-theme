<?php

// Register menus
register_nav_menus(
    [
        // 'menu-topbar' => __('Topmenu', 'qore'),
        'menu-main' => __('Hoofdmenu', 'qore'),
        'menu-footer' => __('Footer menu', 'qore'),
    ]
);

function qore_top_nav()
{
    wp_nav_menu([
        'container' => false,
        'menu_id' => 'menu-topbar',
        'menu_class' => 'menu',
        'items_wrap' => '<ul class="menu items-center mb-0">%3$s</ul>',
        'theme_location' => 'menu-topbar',
        'depth' => 1,
        'fallback_cb' => false,
    ]);
}

function qore_footer_nav()
{
    wp_nav_menu([
        'container' => false,
        'menu_id' => 'menu-footer',
        'menu_class' => 'menu',
        'items_wrap' => '%3$s',
        'theme_location' => 'menu-footer',
        'depth' => 2,
        'fallback_cb' => false,
    ]);
}

// Add Foundation active class to menu
function required_active_nav_class($classes, $item)
{
    if ($item->current == 1 || $item->current_item_ancestor == true)
    {
        $classes[] = 'active';
    }

    return $classes;
}

add_action('nav_menu_css_class', 'required_active_nav_class', 10, 2);
