<?php if (!defined('ABSPATH'))
{
    exit;
} // Exit if accessed directly

/* *******************************
****** ADMIN OPTIONS PAGE ********
******************************* */

$user = wp_get_current_user();
if ($user && isset($user->user_login) && 'WBRND' == $user->user_login || $user && isset($user->user_login) && 'Qore' == $user->user_login)
{
    add_action('admin_menu', 'admin_filters_add_submenu_page');
    function admin_filters_add_submenu_page()
    {
        add_submenu_page(
            'options-general.php',
            'Admin filters',
            'Admin filters',
            'manage_options',
            'admin-filters',
            'admin_filters_submenu_page'
        );
    }
}

function admin_filters_submenu_page() { ?>

<div class="wrap">
<h1>Admin filters</h1>
<form method="post" action="options.php">
    <?php
        settings_fields('section');
        do_settings_sections('admin-pages');
        do_settings_sections('dashboard-widgets');
        submit_button();
    ?>
    <small><strong>Aangevinkt = uitgeschakeld</strong></small>
</form>
</div>

<?php }

function admin_page_posts() { ?><input type="checkbox" name="admin_page_posts" value="1" <?php checked(1, get_option('admin_page_posts'), true); ?> /><?php }
function admin_page_pages() { ?><input type="checkbox" name="admin_page_pages" value="1" <?php checked(1, get_option('admin_page_pages'), true); ?> /><?php }
function admin_page_extra() { ?><input type="checkbox" name="admin_page_extra" value="1" <?php checked(1, get_option('admin_page_extra'), true); ?> /><?php }
function admin_page_comments() { ?><input type="checkbox" name="admin_page_comments" value="1" <?php checked(1, get_option('admin_page_comments'), true); ?> /><?php }
function admin_page_plugins() { ?><input type="checkbox" name="admin_page_plugins" value="1" <?php checked(1, get_option('admin_page_plugins'), true); ?> /><?php }
function admin_page_users() { ?><input type="checkbox" name="admin_page_users" value="1" <?php checked(1, get_option('admin_page_users'), true); ?> /><?php }

function display_theme_panel_fields()
{
    add_settings_section('section', 'Menu-items', null, 'admin-pages');
    add_settings_field('admin_page_posts', 'Berichten', 'admin_page_posts', 'admin-pages', 'section');
    add_settings_field('admin_page_pages', "Pagina's", 'admin_page_pages', 'admin-pages', 'section');
    add_settings_field('admin_page_comments', 'Reacties', 'admin_page_comments', 'admin-pages', 'section');
    add_settings_field('admin_page_plugins', 'Plugins', 'admin_page_plugins', 'admin-pages', 'section');
    add_settings_field('admin_page_users', 'Gebruikers', 'admin_page_users', 'admin-pages', 'section');
    add_settings_field('admin_page_extra', 'Extra', 'admin_page_extra', 'admin-pages', 'section');

    register_setting('section', 'admin_page_posts');
    register_setting('section', 'admin_page_pages');
    register_setting('section', 'admin_page_comments');
    register_setting('section', 'admin_page_plugins');
    register_setting('section', 'admin_page_users');
    register_setting('section', 'admin_page_extra');
}

add_action('admin_init', 'display_theme_panel_fields');

class admin_filters
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'remove_menus']);
        add_action('admin_init', [$this, 'remove_submenus']);
        add_action('after_setup_theme', [$this, 'remove_admin_bar']);
        add_action('wp_before_admin_bar_render', [$this, 'remove_admin_bar_items']);
        add_action('admin_menu', [$this, 'remove_meta_boxes']);
        add_action('admin_init', [$this, 'deactivate_columns']);
        add_action('widgets_init', [$this, 'remove_widgets']);
        add_action('customize_register', [$this, 'remove_customizer']);
    }

    /* *******************************
    ******* DISABLE MENU ITEMS *******
    ******************************* */

    public function remove_menus()
    {
        $admin_page_posts = get_option('admin_page_posts');
        $admin_page_pages = get_option('admin_page_pages');
        $admin_page_comments = get_option('admin_page_comments');
        $admin_page_plugins = get_option('admin_page_plugins');
        $admin_page_users = get_option('admin_page_users');
        $admin_page_extra = get_option('admin_page_extra');

        if ($admin_page_posts)
        {
            remove_menu_page('edit.php');
        }							// Posts
    if ($admin_page_pages)
    {
        remove_menu_page('edit.php?post_type=page');
    }			// Pages
    if ($admin_page_comments)
    {
        remove_menu_page('edit-comments.php');
    }				// Comments
    if ($admin_page_plugins)
    {
        remove_menu_page('plugins.php');
    }						// Plugins
    if ($admin_page_users)
    {
        remove_menu_page('users.php');
    }							// Users
    if ($admin_page_extra)
    {
        remove_menu_page('tools.php');
    }							// Extra
    }

    /* *******************************
    ****** DISABLE SUBMENU ITEMS *****
    ******************************* */

    public function remove_submenus()
    {
        global $submenu;
        $admin_page_comments = get_option('admin_page_comments');
        unset($submenu['edit.php'][16], $submenu['themes.php'][6]);											// View / edit theme
    //unset($submenu['themes.php'][5]);											// View / themes
    											// View / edit theme
    //unset($submenu['options-general.php'][15]);								// Settings / writing
    if ($admin_page_comments)
    {
        unset($submenu['options-general.php'][25]);
    }	// Settings / comments
    //unset($submenu['options-general.php'][40]);								// Settings / permalinks
    remove_submenu_page('gf_entries', 'gf_help');								// Gravity Forms help
    }

    /* *******************************
    ******* POST TYPE SUPPORT ********
    ******************************* */

    public function deactivate_columns()
    {
        $admin_page_comments = get_option('admin_page_comments');
        if ($admin_page_comments)
        {
            remove_post_type_support('post', 'comments');							// Comments - posts
        remove_post_type_support('page', 'comments');							// Comments - pages
        }
        //remove_post_type_support( 'post', 'thumbnail' );							// Featured image - posts
    remove_post_type_support('page', 'thumbnail');							// Featured image - pages
    }

    /* *******************************
    ******* DISABLE METABOXES ********
    ******************************* */

    public function remove_meta_boxes()
    {
        $admin_page_comments = get_option('admin_page_comments');
        remove_meta_box('tagsdiv-post_tag', 'post', 'normal');						// Tags
    remove_meta_box('trackbacksdiv', 'post', 'normal');							// Trackbacks
    remove_meta_box('postcustom', 'post', 'normal');							// Extra fields - posts
    remove_meta_box('postcustom', 'page', 'normal');							// Extra fields - pages
    //remove_meta_box('revisionsdiv', 'page', 'normal');						// Revisions
    if ($admin_page_comments)
    {
        remove_meta_box('commentstatusdiv', 'post', 'normal'); 					// Comments Status
        remove_meta_box('commentsdiv', 'post', 'normal'); 						// Comments
    }
    }

    /* *******************************
    **** DISABLE DEFAULT WIDGETS *****
    ******************************* */

    public function remove_widgets()
    {
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Pages');
    }

    /* *******************************
    ************ ADMINBAR ************
    ******************************* */

    // Remove admin bar for non-admins
    public function remove_admin_bar()
    {
        if (current_user_can('administrator') || is_admin())
        {
            show_admin_bar(true);
        }
        elseif (current_user_can('qore_editor'))
        {
            show_admin_bar(true);
        }
        else
        {
            show_admin_bar(false);
        }
    }

    // Remove admin bar items
    public function remove_admin_bar_items()
    {
        global $wp_admin_bar;
        $admin_page_comments = get_option('admin_page_comments');
        $wp_admin_bar->remove_menu('wp-logo');										// WordPress logo
        if ($admin_page_comments)
        {
            $wp_admin_bar->remove_menu('comments');									// Comments
        }
        $wp_admin_bar->remove_menu('search');										// Search
    }

    // Remove customizer items
    public function remove_customizer($wp_customize)
    {
        $wp_customize->remove_section('themes');									// Themes
    $wp_customize->remove_section('colors');									// Colors
    $wp_customize->remove_section('background_image');							// Background
    $wp_customize->remove_section('static_front_page');							// Front-page settings
    $wp_customize->remove_panel('widgets');										// Widgets
    }
}
$admin_filters = new admin_filters();

/* *******************************
****** REMOVE WPML METABOX *******
******************************* */

add_action('admin_head', 'disable_icl_metabox');
function disable_icl_metabox()
{
    $screen = get_current_screen();
    remove_meta_box('icl_div_config', $screen->post_type, 'normal');
}

/* *******************************
* REMOVE STYLE/SCRIPT ATTRIBUTES *
******************************* */

function remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

add_filter('style_loader_tag', 'remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'remove_type_attr', 10, 2);

/* *******************************
********* GRAVITY FORMS **********
******************************* */

add_filter('gform_enable_field_label_visibility_settings', '__return_true'); // Hide field label

/* *******************************
******** FIX SHORTCODES **********
******************************* */

function fix_shortcodes($content)
{
    $array = [
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    ];
    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'fix_shortcodes');
add_filter('acf_the_content', 'fix_shortcodes');

/* *******************************
****** REMOVE HEADER URL'S *******
******************************* */

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
//remove_action( 'wp_print_styles', 'print_emoji_styles' );
//remove_action( 'admin_print_styles', 'print_emoji_styles' );

/* *******************************
***** REMOVE H1 FROM TINYMCE *****
******************************* */

function remove_h1_from_tinymce($args)
{
    $args['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;';
    return $args;
}
add_filter('tiny_mce_before_init', 'remove_h1_from_tinymce');

/* *******************************
******** CUSTOM USER ROLE ********
******************************* */

//remove_role( 'qore_editor_v3' ); // Remove old role ID's
$content_editor_id = 'qore_editor';

add_role(
    $content_editor_id,
    'Content beheerder',
    [
        'level_1' => true,
        'unfiltered_html' => true,
        'manage_privacy_options' => true,
        'manage_options' => true,
        'read' => true,
        'edit_posts' => true,
        'edit_private_posts' => true,
        'edit_published_posts' => true,
        'read_private_posts' => true,
        'edit_others_posts' => true,
        'delete_published_posts' => true,
        'delete_private_posts' => true,
        'delete_others_posts' => true,
        'delete_posts' => true,
        'publish_posts' => true,
        'manage_categories' => true,
        'edit_pages' => true,
        'edit_private_pages' => true,
        'edit_published_pages' => true,
        'read_private_pages' => true,
        'edit_others_pages' => true,
        'delete_published_pages' => true,
        'delete_private_pages' => true,
        'delete_others_pages' => true,
        'delete_pages' => true,
        'publish_pages' => true,
        'upload_files' => true,
        'moderate_comments' => true,
        'edit_theme_options' => true,
        'add_users' => true,
        'create_users' => true,
        'promote_users' => true,
        'delete_users' => true,
        'list_users' => true,
        'edit_users' => true,
        // Yoast SEO
        'wpseo_manage_redirects' => true,
        'wpseo_edit_advanced_metadata' => true,
        'wpseo_bulk_edit' => true,
        // Gravity Forms - with editing
        'gravityforms_create_form' => false,
        'gravityforms_delete_forms' => false,
        'gravityforms_edit_forms' => false,
        // Gravity Forms - basics
        'gravityforms_view_entries' => true,
        'gravityforms_view_entry_notes' => true,
        'gravityforms_edit_entries' => true,
        'gravityforms_edit_entry_notes' => true,
        'gravityforms_export_entries' => true,
        'gravityforms_delete_entries' => true,
        // WooCommerce
        'assign_product_terms' => true,
        'assign_shop_coupon_terms' => true,
        'assign_shop_order_terms' => true,
        'delete_others_products' => true,
        'delete_others_shop_coupons' => true,
        'delete_others_shop_orders' => true,
        'delete_private_products' => true,
        'delete_private_shop_coupons' => true,
        'delete_private_shop_orders' => true,
        'delete_product' => true,
        'delete_product_terms' => true,
        'delete_products' => true,
        'delete_published_products' => true,
        'delete_published_shop_coupons' => true,
        'delete_published_shop_orders' => true,
        'delete_shop_coupon' => true,
        'delete_shop_coupon_terms' => true,
        'delete_shop_coupons' => true,
        'delete_shop_order' => true,
        'delete_shop_order_terms' => true,
        'delete_shop_orders' => true,
        'edit_others_products' => true,
        'edit_others_shop_coupons' => true,
        'edit_others_shop_orders' => true,
        'edit_private_products' => true,
        'edit_private_shop_coupons' => true,
        'edit_private_shop_orders' => true,
        'edit_product' => true,
        'edit_product_terms' => true,
        'edit_products' => true,
        'edit_published_products' => true,
        'edit_published_shop_coupons' => true,
        'edit_published_shop_orders' => true,
        'edit_shop_coupon' => true,
        'edit_shop_coupon_terms' => true,
        'edit_shop_coupons' => true,
        'edit_shop_order' => true,
        'edit_shop_order_terms' => true,
        'edit_shop_orders' => true,
        'manage_product_terms' => true,
        'manage_shop_coupon_terms' => true,
        'manage_shop_order_terms' => true,
        'manage_woocommerce' => false,
        'publish_products' => true,
        'publish_shop_coupons' => true,
        'publish_shop_orders' => true,
        'read_private_products' => true,
        'read_private_shop_coupons' => true,
        'read_private_shop_orders' => true,
        'read_product' => true,
        'read_shop_coupon' => true,
        'read_shop_order' => true,
        'view_woocommerce_reports' => true,
        // Mailster
        'delete_newsletters' => true,
        'delete_others_newsletters' => true,
        'delete_private_newsletters' => true,
        'delete_published_newsletters' => true,
        'edit_newsletters' => true,
        'edit_others_newsletters' => true,
        'edit_private_newsletters' => true,
        'edit_published_newsletters' => true,
        'publish_newsletters' => true,
        'read_private_newsletters' => true,
        'mailster_manage_subscribers' => true,
        'mailster_export_subscribers' => true,
        'mailster_import_subscribers' => true,
        'mailster_edit_subscribers' => true,
        'mailster_delete_subscribers' => true,
        'mailster_add_subscribers' => true,
        'mailster_bulk_delete_subscribers' => true,
        'mailster_add_lists' => true,
        'mailster_delete_lists' => true,
        'mailster_edit_lists' => true,
        'mailster_dashboard_widget' => true,
        // WP-Polls
        'manage_polls' => true,
        // AdRotate
        'adrotate_ad_delete' => true,
        'adrotate_ad_manage' => true,
        'adrotate_advertiser' => true,
        'adrotate_advertiser_manage' => true,
        'adrotate_global_report' => true,
        'adrotate_group_delete' => true,
        'adrotate_group_manage' => true,
        'adrotate_moderate' => true,
        'adrotate_moderate_approve' => true,
        'adrotate_schedule_delete' => true,
        'adrotate_schedule_manage' => true,
        // WP Rocket
        'rocket_purge_cache' => true,
        'rocket_purge_opcache' => true,
        'rocket_purge_posts' => true,
        'rocket_purge_terms' => true
    ]
);

// Allow access to plugin 'Redirection'
add_filter('redirection_role', 'redirection_to_editor');
function redirection_to_editor()
{
    return 'edit_pages';
}

/* *******************************
**** USER MGMT CONTENT EDITOR ****
******************************* */

function get_allowed_roles($user)
{
    $allowed = [];
    $content_editor_id = 'qore_editor';

    if (in_array('administrator', $user->roles))
    { // Admin can edit all roles
        $allowed = array_keys($GLOBALS['wp_roles']->roles);
    }
    elseif (in_array($content_editor_id, $user->roles))
    {
        $allowed[] = $content_editor_id;
        // Default WP
        $allowed[] = 'author';
        $allowed[] = 'subscriber';
        // WooCommerce
        $allowed[] = 'shop_manager';
        $allowed[] = 'customer';
        // AdRotate
        $allowed[] = 'adrotate_advertiser';
    }
    return $allowed;
}

/**
 * Remove roles that are not allowed for the current user role.
 */
function custom_editable_roles($roles)
{
    if ($user = wp_get_current_user())
    {
        $allowed = get_allowed_roles($user);

        foreach ($roles as $role => $caps)
        {
            if (!in_array($role, $allowed))
            {
                unset($roles[$role]);
            }
        }
    }

    return $roles;
}

add_filter('editable_roles', 'custom_editable_roles');

/**
 * Prevent users deleting/editing users with a role outside their allowance.
 */
function custom_map_meta_cap($caps, $cap, $user_ID, $args)
{
    if (($cap === 'edit_user' || $cap === 'delete_user') && $args)
    {
        $the_user = get_userdata($user_ID); // The user performing the task
        $user = get_userdata($args[0]); // The user being edited/deleted

        if ($the_user && $user && $the_user->ID != $user->ID /* User can always edit self */)
        {
            $allowed = get_allowed_roles($the_user);

            if (array_diff($user->roles, $allowed))
            {
                // Target user has roles outside of our limits
                $caps[] = 'not_allowed';
            }
        }
    }

    return $caps;
}

add_filter('map_meta_cap', 'custom_map_meta_cap', 10, 4);

// Allow content manager to edit WP Privacy Policy page
function custom_manage_privacy_options($caps, $cap, $user_id, $args)
{
    if (!is_user_logged_in())
    {
        return $caps;
    }

    $user_meta = get_userdata($user_id);
    if (array_intersect(['editor', 'administrator', 'qore_editor'], $user_meta->roles))
    {
        if ('manage_privacy_options' === $cap)
        {
            $manage_name = is_multisite() ? 'manage_network' : 'manage_options';
            $caps = array_diff($caps, [$manage_name]);
        }
    }
    return $caps;
}

  if (is_user_logged_in())
  {
      add_action('map_meta_cap', 'custom_manage_privacy_options', 1, 4);
  }
?>