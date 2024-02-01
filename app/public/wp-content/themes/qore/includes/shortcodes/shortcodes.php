<?php if ( ! defined( 'ABSPATH' ) ) exit;

//===============================================//
//=========== Add shortcodes button =============//
//===============================================//


add_action('admin_head', 'add_shortcodes_button');

function add_shortcodes_button() {
    global $typenow;

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
	    return;
    }

    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_tinymce_plugin");
        add_filter('mce_buttons', 'register_shortcodes_button');
    }
}

function add_tinymce_plugin($plugin_array) {
    $plugin_array['shortcodes_button'] = esc_url( get_template_directory_uri() ) . '/includes/shortcodes/js/shortcodes.js';
    return $plugin_array;
}

function register_shortcodes_button($buttons) {
   array_push($buttons, "shortcodes_button");
   return $buttons;
}


//===============================================//
//================= Elements ====================//
//===============================================//


/* -- Row
========================================== */

function row( $atts, $content = null ) {
	return '<div class="row">'.do_shortcode($content).'</div>';
}

add_shortcode('row', 'row');

/* -- Columns
========================================== */

function column( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'width' => '',
		), $atts )
	);
	return '<div class="column '.$width.'">'.do_shortcode($content).'</div>';
}

add_shortcode('column', 'column');

/* -- Button
========================================== */

function button( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'size' => '',
			'link' => '',
			'target' => '',
			'class' => '',
		), $atts )
	);

	if($target) { $target = 'target="'.$target.'"'; }

	return '<a class="button '.$size.' '.$class.'" href="'.$link.'" '. $target.'>'. $content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content) .'</a>';

}

add_shortcode('button', 'button'); ?>