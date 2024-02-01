<?php

function site_scripts()
{
    $script_js = get_template_directory() . '/dist/js/script.js';
    $style_css = get_template_directory() . '/dist/css/style.css';

    // Adding scripts file in the footer
    if (file_exists($script_js)) {
        wp_enqueue_script('script_js', get_template_directory_uri() . '/dist/js/script.js', ['jquery'], filemtime(get_template_directory() . '/dist/js/'), false);
        wp_localize_script('script_js', 'AjaxJs', array('ajaxurl' => admin_url('admin-ajax.php')));
    } else {
        echo '<strong>Geen Javascript file in dist folder!</strong><br>';
    }

    // Register main stylesheet
    if (file_exists($style_css)) {
        wp_enqueue_style('style_css', get_template_directory_uri() . '/dist/css/style.css', [], filemtime(get_template_directory() . '/dist/css/'), 'all');
    } else {
        echo '<strong>Geen CSS file in dist folder!</strong>';
    }
}

add_action('wp_enqueue_scripts', 'site_scripts', 999);
