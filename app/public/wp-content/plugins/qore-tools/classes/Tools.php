<?php

//namespace Qore\Tools;

/**
 * Tools class
 */
class QoreToolsTools
{
    /**
     * Initialize functions here, mostly actions and filters.
     */
    public function init()
    {
        // Action for adding a custom favicon to WP-admin
        //add_action('admin_head', array($this, 'qoreFavicon'));
        //add_action('login_head', array($this, 'qoreFavicon'));

        // Action for removing dashboard widgets
        add_action('admin_menu', array($this, 'disableDefaultDashboardWidgets'));

        // Action for removing submenu pages
        add_action('admin_init', array($this, 'removeSubmenuPages'), 100);

        // Set correct environment type
        add_action('init', array($this, 'setEnvironmentType'));

        // Add notice if is development site
        add_action('admin_menu', array($this, 'developmentNotice'));

        // Deactivate plugins if is development site or local
        add_action('admin_init', array($this, 'deactivatePlugins'));

        // Add no-index if is development site or local
        add_action('init', array($this, 'noIndexAdmin'));

        // Admin Enqueue Scripts
        add_action('admin_enqueue_scripts', array($this, 'adminEnqueueScripts'));

        // Action for custom admin footer
        add_action('admin_footer_text', array($this, 'customAdminFooter'));

        // Actions for dashboard color scheme
        add_action('admin_init', array($this, 'additionalAdminColorSchemes'));
        add_action('user_register', array($this, 'setDefaultAdminColor'));
        add_action('get_user_option_admin_color', array($this, 'changeDashboardColor'));

        // Actions for login styles
        add_action('login_enqueue_scripts', array($this, 'loginCss'), 10);
        add_action('login_headerurl', array($this, 'loginUrl'));
        add_action('login_headertext', array($this, 'loginTitle'));

        // Hide update notices
        add_action('admin_head', array($this, 'hideUpdateNotices'), 1);

        // Add ACF options page
        add_action('acf/init', array($this, 'addACFoptionsPage'));

        // ACF License key activation
        add_action('admin_init', array($this, 'autoSetLicenseKeys'));

        // Yoast block
        add_filter('wpseo_metabox_prio', array($this, 'wpSeoMetaboxPriority'));

        // Disable Fullscreen Editor
        add_action('enqueue_block_editor_assets', array($this, 'disableEditorFullscreenByDefault'));

        // Add capabilities to the editor user role
        add_action('admin_init', array($this, 'editorRoleCapabilities'));

        // Allow editor to manage the privacy page
        add_action('map_meta_cap', array($this, 'editorManagePrivacyPage'), 1, 4);

        // Add large update/publish post button to the edit screens
        add_action('post_submitbox_start', array($this, 'largeUpdateButton'));

        // Allow editor to add certain users
        add_filter('editable_roles', array($this, 'editorAddUsers'));

        // Add a post ID column to every post type
        add_filter('manage_posts_columns', array($this, 'posts_columns_id'), 5);
        add_action('manage_posts_custom_column', array($this, 'posts_custom_id_columns'), 5, 2);
        add_filter('manage_pages_columns', array($this, 'posts_columns_id'), 5);
        add_action('manage_pages_custom_column', array($this, 'posts_custom_id_columns'), 5, 2);

        // Add a term ID column to every taxonomy
        add_filter('manage_edit-category_columns', array($this, 'taxonomy_columns_id'), 10);
        add_filter('manage_category_custom_column', array($this, 'taxonomy_custom_id_columns'), 10, 3);

        // Add a ALT text column to the media library
        add_filter('manage_media_columns', array($this, 'media_columns_alt'));
        add_action('manage_media_custom_column', array($this, 'media_column_alt'), 10, 2);
    }

    /**
     * Add a custom favicon to WP-admin
     */
    public function qoreFavicon()
    {
        echo '<link rel="apple-touch-icon" sizes="180x180" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="180x180" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/favicon.svg">
		<link rel="icon" type="image/png" sizes="32x32" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="32x32" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/favicon.svg">
		<link rel="icon" type="image/png" sizes="16x16" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/favicon-16x16.png">
		<link rel="icon" type="image/png" sizes="16x16" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/favicon.svg">
		<link rel="manifest" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/site.webmanifest">
		<link rel="mask-icon" href="' . QORETOOLS_PLUGIN_URL . 'dist/img/favicon/safari-pinned-tab.svg" color="#050310">
		<meta name="msapplication-TileColor" content="#050310">
		<meta name="theme-color" content="#050310">';
    }

    /**
     * Disable default dashboard widgets
     */
    public function disableDefaultDashboardWidgets()
    {
        remove_meta_box('dashboard_primary', 'dashboard', 'core');                    // WordPress news
        remove_meta_box('dashboard_activity', 'dashboard', 'core');                    // Activities
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');             // Incoming links
        remove_meta_box('dashboard_plugins', 'dashboard', 'core');                    // Plugin news
        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');                // QuickPress
        remove_meta_box('icl_dashboard_widget', 'dashboard', 'side');                // WPML
        remove_meta_box('itsec-dashboard-widget', 'dashboard', 'side');                // iThemes Security
        remove_meta_box('mandrill_widget', 'dashboard', 'side');                    // Mandrill
        remove_action('welcome_panel', 'wp_welcome_panel');                        // Welcome

        // Removing plugin dashboard boxes
        remove_meta_box('yoast_db_widget', 'dashboard', 'normal');                   // Yoast's SEO plugin widget
    }

    /**
     * Remove subpages that don't need to be displayed
     */
    public function removeSubmenuPages()
    {
        $user_id = get_current_user_id();

        if ($user_id == false) {
            return false;
        }

        if ($user_id != '1') {
            remove_submenu_page('themes.php', 'themes.php');
            remove_submenu_page('themes.php', 'theme-editor.php');
        }
    }

    /**
     * Shorthand for var_dump variable. Dumps all data of given string/array
     */
    public function vd($value)
    {
        var_dump($value);
    }

    /**
     * Shorthand for var_dump variable. Dumps all data of given string/array in a readable way
     */
    public function pr($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    /**
     * Add a define rule to wp-config.php if site development environment.
     *
     * @return string returns development or production based on user extention
     */
    public function setEnvironmentType()
    {
        $environment = 'production';
        $development = ['.qore.digital', '.test', '.local'];

        foreach ($development as $key => $value) {
            if (strpos($_SERVER['HTTP_HOST'], $value) !== false) {
                $environment = 'development';
            }
        }

        if ($environment == 'development') {
            define('WP_ENVIRONMENT_TYPE', 'development');
        } else {
            define('WP_ENVIRONMENT_TYPE', 'production');
        }
    }

    /**
     * Add a button to WP-admin if is development site for non-administrators
     *
     * @return string Development site notice
     */
    public function developmentNotice()
    {

        // if (strpos($_SERVER['HTTP_HOST'], '.local') !== false &! current_user_can('administrator') || strpos($_SERVER['HTTP_HOST'], '.test') !== false &! current_user_can('administrator') || strpos($_SERVER['HTTP_HOST'], '.qore.digital') !== false &! current_user_can('administrator')) {
        if (wp_get_environment_type() === 'development' & !current_user_can('administrator')) {
            add_menu_page('Development omgeving', 'Development omgeving', 'read', 'development-omgeving', array($this, 'developmentNoticePage'), 'dashicons-warning', 1);
        }
    }

    /**
     * Show text on the development site notice page
     *
     * @return string Development site notice page
     */
    public function developmentNoticePage()
    {
        if (wp_get_environment_type() === 'development') {
            echo '<div class="wrap">';
            echo '<h1>' . __('Development omgeving', 'qore-tools') . '</h1>';
            echo '<p>' . __('Let op: dit is de development omgeving. Alle wijzgingen die je aanbrengt worden niet op de live applicatie getoond.', 'qore-tools') . '</p>';
            echo '</div>';
        }
    }

    /**
     * Deactivate plugins if development site
     *
     * @return string Deactivate plugin
     */
    public function deactivatePlugins()
    {

        $plugins_array = array(
            '/backupbuddy/backupbuddy.php',
            '/ithemes-security-pro/ithemes-security-pro.php',
            '/iwp-client/init.php',
            '/wp-cerber/wp-cerber.php'
        );

        // if (strpos($_SERVER['HTTP_HOST'], strval('.local'), 1 !== false) || strpos($_SERVER['HTTP_HOST'], strval('.test'), 1 !== false) || strpos($_SERVER['HTTP_HOST'], strval('.qore.digital'), 1 !== false)) {
        if (wp_get_environment_type() === 'development') {
            deactivate_plugins($plugins_array);
        }
    }

    /**
     * Add no-index if is development site or local
     *
     * @return string Deactivate plugin
     */
    public function noIndexAdmin()
    {

        // if (strpos($_SERVER['HTTP_HOST'], strval('..test'), 1 !== false) || strpos($_SERVER['HTTP_HOST'], strval('.test'), 1 !== false) || strpos($_SERVER['HTTP_HOST'], strval('.qore.digital'), 1 !== false)) {
        if (wp_get_environment_type() === 'development') {
            update_option('blog_public', 0);
        }
    }

    /**
     * Admin enqueue scripts
     *
     * @return string Text with links
     */

    public function adminEnqueueScripts()
    {
        //wp_enqueue_style('admin-your-css-file-handle-name', get_template_directory_uri().'/css/your-css-file.css');
        wp_enqueue_script('qore-tools-admin-js', plugins_url('qore-tools/dist/js/qore-tools-admin.js'));
    }

    /**
     * Custom admin footer
     *
     * @return string Text with links
     */
    public function customAdminFooter($text)
    {
        $text = '<span id="footer-thankyou">';
        $text .= __('Ontwikkeld door ', 'qore-tools');
        $text .= '<a href="https://qore.digital/" target="_blank">Qore Digital B.V.</a> ';
        $text .= __('Hulp nodig? Mail naar ', 'qore-tools');
        $text .= '<a href="mailto:service@qore.digital">service@qore.digital</a></span>.';

        return $text;
    }

    /**
     * Adds a new admin dashboard color scheme
     */
    public function additionalAdminColorSchemes()
    {
        wp_admin_css_color(
            'Qore',
            __('Qore', 'qore'),
            plugins_url('qore-tools/dist/css/qore-tools-admin.css'),
            array('#191919', '#4310E8', '#f4f4f4', '#ffffff')
        );
    }

    /**
     * Set the default admin dashboard color
     *
     * @param string $user_id User id
     */
    public function setDefaultAdminColor($user_id)
    {
        $args = array(
            'ID' => $user_id,
            'admin_color' => 'Qore',
        );

        wp_update_user($args);
    }

    /**
     * Change the default dashboard color
     *
     * @param  [type] $result [description]
     * @return string Theme name
     */
    public function changeDashboardColor($result)
    {
        return 'Qore';
    }

    /**
     * Calling your own login css so you can style it
     */
    public function loginCss()
    {
        wp_enqueue_style('qore_login_css', QORETOOLS_PLUGIN_URL . 'dist/css/qore-tools-login.css', false);
    }

    /**
     * Changing the logo link from wordpress.org to your site
     *
     * @return string Home url
     */
    public function loginUrl()
    {
        return home_url();
    }

    /**
     * Changing the alt text on the logo to show your site name
     *
     * @return string Blogname
     */
    public function loginTitle()
    {
        return get_option('blogname');
    }

    /**
     * Hide update notices from users except Qore users
     *
     * @return [type] [description]
     */
    public function hideUpdateNotices()
    {
        if (!current_user_can('administrator')) {
            remove_action('admin_notices', 'update_nag', 3);
        }
    }

    /**
     * Checks current user email if it's Qore
     *
     * @return [type] [description]
     */
    public function checkCurrentUserEmail()
    {
        $current_user = wp_get_current_user();

        if (!$current_user->exists()) {
            return false;
        }

        $email = explode('@', $current_user->user_email);

        if ($email[1] === 'qore.digital') {
            return true;
        }

        return false;
    }

    public function addACFoptionsPage()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'post_id'       => 'qore-tools',
                'page_title'     => __('Qore Digital - Tools', 'qore-tools'),
                'menu_title'    => __('Tools', 'qore-tools'),
                'menu_slug'     => __('Qore Digital - Tools', 'qore-tools'),
                'capability'    => 'edit_posts',
                'redirect'        => false,
                'position'        => 999,
                'icon_url'        => 'data:image/svg+xml;base64,' . base64_encode('<svg width="63" height="62" xmlns="http://www.w3.org/2000/svg"> <path d="M53.264 49.13c-.933 1.201-2.24 2.29-4.779 2.29-4.069 0-5.936-1.915-6.346-4.543H62v-.6C62 37.791 56.624 34 47.963 34 39.563 34 34 37.754 34 44.962 34 52.51 39.077 56 48.187 56c8.624 0 12.469-3.491 13.44-6.87h-8.363ZM15.337 5C20.31 5.02 29 5.586 29 16c0 2.641-.559 4.649-1.474 6.175l1.514 4.809-6.283-1.026C20.113 26.933 17.153 27 15 27c-4.906 0-14-.346-14-11C1 5.585 9.69 5.02 14.663 5h.674ZM34 16c0 10.654 9.42 11 14.5 11S63 26.654 63 16 53.58 5 48.5 5 34 5.346 34 16ZM1 55h8.469v-6.162h8.16c1.561 0 2.192.894 2.192 2.38V55h8.827v-6.723c-.15-1.736-.633-2.745-1.894-3.08v-.057c2.462-.672 2.24-2.689 2.24-4.566 0-2.185-.796-4.117-2.388-4.846-1.171-.532-2.643-.728-5.075-.728H1v20Z" fill="#FFF"/></svg>'),
            ));
        }
    }

    // Set ACF 5 license key
    public function autoSetLicenseKeys()
    {
        // Check if ACF is running
        if (is_plugin_active('advanced-custom-fields-pro/acf.php')) {
            // Check if ACF License is not empty
            if (get_option('acf_pro_license') != '') {
                return;
            }

            // Check if constant is defined
            if (defined('ACF_PRO_LICENSE') == false) {
                return;
            }

            // Check if constant is not empty
            if (defined('ACF_PRO_LICENSE') != '') {
                return;
            }

            // Loads ACF plugin
            include_once ABSPATH . 'wp-content/plugins/advanced-custom-fields-pro/acf.php';

            // Connect
            $post = array(
                'acf_license' => ACF_PRO_LICENSE,
                'acf_version' => acf_get_setting('version'),
                'wp_name' => get_bloginfo('name'),
                'wp_url' => home_url(),
                'wp_version' => get_bloginfo('version'),
                'wp_language' => get_bloginfo('language'),
                'wp_timezone' => get_option('timezone_string'),
            );

            // Connect
            $response = acf_updates()->request('v2/plugins/activate?p=pro', $post);

            // Ensure response is expected JSON array (not string)
            if (is_string($response)) {
                $response = new WP_Error('server_error', esc_html($response));
            }

            // Success
            if ($response['status'] == 1) {
                acf_pro_update_license($response['license']); // Update license
            }

            // Show message
            echo '<div class="notice notice-success is-dismissible"><p>' . __($response['message'], 'Qore') . '</p></div>';
        } else {
            // Show message if ACF is not active
            echo '<div class="notice error is-dismissible"><p>';
            _e('Advanced Custom Fields Pro is vereist om de Qore Digital - Tools plugin te laten functioneren.', 'qore-tools');
            echo '</p></div>';
        }
    }

    // Yoast block
    public function wpSeoMetaboxPriority()
    {
        return 'low'; // Accepts 'high', 'default', 'low'.
    }

    // Disable Fullscreen Mode Gutenberg
    public function disableEditorFullscreenByDefault()
    {
        $script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";

        wp_add_inline_script('wp-blocks', $script);
    }

    // Add capabilities to the editor user role
    public function editorRoleCapabilities()
    {
        $role = get_role('editor');

        // WordPress - Users
        $role->add_cap('add_users');
        $role->add_cap('create_users');
        $role->add_cap('promote_users');
        $role->add_cap('delete_users');
        $role->add_cap('list_users');
        $role->add_cap('edit_users');

        // WordPress - Appearance
        $role->add_cap('edit_theme_options');

        // AdRotate (PRO)
        $role->add_cap('adrotate_ad_delete');
        $role->add_cap('adrotate_ad_manage');
        $role->add_cap('adrotate_advertiser');
        $role->add_cap('adrotate_advertiser_manage');
        $role->add_cap('adrotate_global_report');
        $role->add_cap('adrotate_group_delete');
        $role->add_cap('adrotate_group_manage');
        $role->add_cap('adrotate_moderate');
        $role->add_cap('adrotate_moderate_approve');
        $role->add_cap('adrotate_schedule_delete');
        $role->add_cap('adrotate_schedule_manage');

        // Gravity Forms
        $role->add_cap('gravityforms_create_form');
        $role->add_cap('gravityforms_delete_forms');
        $role->add_cap('gravityforms_edit_forms');
        $role->add_cap('gravityforms_view_entries');
        $role->add_cap('gravityforms_view_entry_notes');
        $role->add_cap('gravityforms_edit_entries');
        $role->add_cap('gravityforms_edit_entry_notes');
        $role->add_cap('gravityforms_export_entries');
        $role->add_cap('gravityforms_delete_entries');

        // Mailster
        $role->add_cap('delete_newsletters');
        $role->add_cap('delete_others_newsletters');
        $role->add_cap('delete_private_newsletters');
        $role->add_cap('delete_published_newsletters');
        $role->add_cap('edit_newsletters');
        $role->add_cap('edit_others_newsletters');
        $role->add_cap('edit_private_newsletters');
        $role->add_cap('edit_published_newsletters');
        $role->add_cap('publish_newsletters');
        $role->add_cap('read_private_newsletters');
        $role->add_cap('mailster_manage_subscribers');
        $role->add_cap('mailster_export_subscribers');
        $role->add_cap('mailster_import_subscribers');
        $role->add_cap('mailster_edit_subscribers');
        $role->add_cap('mailster_delete_subscribers');
        $role->add_cap('mailster_add_subscribers');
        $role->add_cap('mailster_bulk_delete_subscribers');
        $role->add_cap('mailster_add_lists');
        $role->add_cap('mailster_delete_lists');
        $role->add_cap('mailster_edit_lists');
        $role->add_cap('mailster_dashboard_widget');

        // Yoast SEO (premium)
        $role->add_cap('wpseo_manage_redirects');
        $role->add_cap('wpseo_edit_advanced_metadata');
        $role->add_cap('wpseo_bulk_edit');

        // WooCommerce
        $role->add_cap('assign_product_terms');
        $role->add_cap('assign_shop_coupon_terms');
        $role->add_cap('assign_shop_order_terms');
        $role->add_cap('delete_others_products');
        $role->add_cap('delete_others_shop_coupons');
        $role->add_cap('delete_others_shop_orders');
        $role->add_cap('delete_private_products');
        $role->add_cap('delete_private_shop_coupons');
        $role->add_cap('delete_private_shop_orders');
        $role->add_cap('delete_product');
        $role->add_cap('delete_product_terms');
        $role->add_cap('delete_products');
        $role->add_cap('delete_published_products');
        $role->add_cap('delete_published_shop_coupons');
        $role->add_cap('delete_published_shop_orders');
        $role->add_cap('delete_shop_coupon');
        $role->add_cap('delete_shop_coupon_terms');
        $role->add_cap('delete_shop_coupons');
        $role->add_cap('delete_shop_order');
        $role->add_cap('delete_shop_order_terms');
        $role->add_cap('delete_shop_orders');
        $role->add_cap('edit_others_products');
        $role->add_cap('edit_others_shop_coupons');
        $role->add_cap('edit_others_shop_orders');
        $role->add_cap('edit_private_products');
        $role->add_cap('edit_private_shop_coupons');
        $role->add_cap('edit_private_shop_orders');
        $role->add_cap('edit_product');
        $role->add_cap('edit_product_terms');
        $role->add_cap('edit_products');
        $role->add_cap('edit_published_products');
        $role->add_cap('edit_published_shop_coupons');
        $role->add_cap('edit_published_shop_orders');
        $role->add_cap('edit_shop_coupon');
        $role->add_cap('edit_shop_coupon_terms');
        $role->add_cap('edit_shop_coupons');
        $role->add_cap('edit_shop_order');
        $role->add_cap('edit_shop_order_terms');
        $role->add_cap('edit_shop_orders');
        $role->add_cap('manage_product_terms');
        $role->add_cap('manage_shop_coupon_terms');
        $role->add_cap('manage_shop_order_terms');
        $role->add_cap('manage_woocommerce');
        $role->add_cap('publish_products');
        $role->add_cap('publish_shop_coupons');
        $role->add_cap('publish_shop_orders');
        $role->add_cap('read_private_products');
        $role->add_cap('read_private_shop_coupons');
        $role->add_cap('read_private_shop_orders');
        $role->add_cap('read_product');
        $role->add_cap('read_shop_coupon');
        $role->add_cap('read_shop_order');
        $role->add_cap('view_woocommerce_reports');

        // WP Rocket
        $role->add_cap('rocket_purge_cache');
        $role->add_cap('rocket_purge_opcache');
        $role->add_cap('rocket_purge_posts');
        $role->add_cap('rocket_purge_terms');
    }

    // Allow editor to manage the privacy page
    public function editorManagePrivacyPage($caps, $cap, $user_id, $args)
    {
        if (!is_user_logged_in()) return $caps;

        $user_meta = get_userdata($user_id);
        if (array_intersect(['editor', 'administrator', 'qore_editor'], $user_meta->roles)) {
            if ('manage_privacy_options' === $cap) {
                $manage_name = is_multisite() ? 'manage_network' : 'manage_options';
                $caps = array_diff($caps, [$manage_name]);
            }
        }
        return $caps;
    }

    // Add large update/publish post button to the edit screens
    public function largeUpdateButton($post)
    {
        global $pagenow;
        global $post_type;

        $update_button = get_option('qore-tools_update_button');

        if ($pagenow == 'post.php' && $update_button) :
            echo '<div class="largeUpdateButton transition" title="Update"><i class="dashicons dashicons-update-alt"></i></div>';
        endif;
    }

    // Allow editor to add certain users
    public function editorAddUsers($roles)
    {
        $user = wp_get_current_user();
        if (in_array('editor', $user->roles)) {
            $tmp = array_keys($roles);
            foreach ($tmp as $r) {
                if ('subscriber' == $r || 'editor' == $r || 'customer' == $r || 'contributor' == $r || 'author' == $r) continue;
                unset($roles[$r]);
            }
        }
        return $roles;
    }

    // Add a post ID column to every post type
    public function posts_columns_id($defaults)
    {
        $defaults['qore_post_id'] = __('ID');
        return $defaults;
    }

    public function posts_custom_id_columns($column_name, $id)
    {
        if ($column_name === 'qore_post_id') {
            echo '<code>' . $id . '</code>';
        }
    }

    // Add a term ID column to every taxonomy
    public function taxonomy_columns_id($columns)
    {
        $columns['qore_term_id'] = 'ID';
        return $columns;
    }

    public function taxonomy_custom_id_columns($value, $column_name, $tax_id)
    {
        if ($column_name === 'qore_term_id') {
            echo '<code>' . $tax_id . '</code>';
        }
        return $columns;
    }

    // Add a ALT text column to the media library
    public function media_columns_alt($cols)
    {
        $cols["alt"] = __('ALT tekst', 'qore-tools');
        return $cols;
    }

    public function media_column_alt($column_name, $id)
    {
        if ($column_name == 'alt')
            echo get_post_meta($id, '_wp_attachment_image_alt', true);
    }
}
