<?php

// Define plugin lisence from .env file
// if (!defined('ACF_PRO_LICENSE')) {
//     define('ACF_PRO_LICENSE', getenv('ACF_PRO_LICENSE'));
// }

// if (!defined('WPMDB_LICENCE')) {
//     define('WPMDB_LICENCE', getenv('ACF_PRO_LICENSE'));
// }

// if (defined('GF_LICENSE_KEY') === false) {
//     define('GF_LICENSE_KEY', getenv('GF_LICENSE_KEY'));
// }

function check_plugin_status()
{
    /* Gravity Forms
    ---------------------------------------------------------------------------------- */
    if (is_plugin_active('gravityforms/gravityforms.php'))
    {
        function nl_phone_format($phone_formats)
        {
            $phone_formats['nl'] = [
                'label' => __('NL tel. nummer', 'gravityforms'),
                'mask' => '9999999999',
                'regex' => '/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/',
                'instruction' => 'Voer je telefoonnummer nummer in.',
            ];

            return $phone_formats;
        }

        // Europe (euro) as default currency
        function gform_currencies($currencies)
        {
            $currencies['EUR']['symbol_left'] = '&#8364;';
            $currencies['EUR']['symbol_right'] = '';
            $currencies['EUR']['thousand_separator'] = '.';
            $currencies['EUR']['decimal_separator'] = ',';

            return $currencies;
        }

        function gform_ajax_spinner_url()
        {
            return esc_url(get_template_directory_uri()) . '/dist/img/preloader.svg';
        };

        function form_submit_button($button, $form)
        {
            $btn = "<button class='group btn btn-secondary gform_button mr-3' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span><svg class='h-5 w-5 ml-3 group-hover:scale-110 transition-all fill-current' viewBox='0 0 21 20' xmlns='http://www.w3.org/2000/svg'><path d='m19.795784 3.55173419c.8791623-2.10994863-1.2375444-4.22667581-3.347493-3.34752372l-14.55690489 6.0653702c-2.84686402 1.18619334-2.36566958 5.35862033.67647169 5.86557733l4.54027033.7566981.75670831 4.5402908c.50705938 3.0421515 4.67944546 3.523305 5.86558756.6765229z' fill='#fff' fill-rule='evenodd' transform='translate(.5)'/></svg></button>";
            return $btn;
        }

        add_filter('gform_phone_formats', 'nl_phone_format');
        add_filter('gform_currencies', 'gform_currencies');
        // add_filter('gform_ajax_spinner_url', 'gform_ajax_spinner_url', 10, 2);
        // add_filter('pre_option_rg_gforms_disable_css', '__return_true');
        add_filter('gform_submit_button', 'form_submit_button', 10, 2);
    }

    /* Yoast SEO
    ---------------------------------------------------------------------------------- */
    if (is_plugin_active('wordpress-seo/wp-seo.php') || is_plugin_active('wordpress-seo-premium/wp-seo-premium.php'))
    {
        // Yoast meta box as last box
        function lower_wpseo_priority($html)
        {
            return 'low';
        }

        // define the custom replacement callback
        function make_description_variable()
        {
            return get_bloginfo('description');
        }

        // define the action for register yoast_variable replacments
        function register_custom_yoast_variables()
        {
            wpseo_register_var_replacement('%%description%%', 'make_description_variable', 'advanced', 'Bloginfo - description');
        }

        add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables');
        add_filter('gform_init_scripts_footer', '__return_false');
        add_filter('wpseo_metabox_prio', 'lower_wpseo_priority');
    }
}

add_action('init', 'check_plugin_status');
