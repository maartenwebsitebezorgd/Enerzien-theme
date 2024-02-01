<?php

//namespace Qore\Tools;

/**
 * Settings class
 */
class QoreToolsSettings {
	/**
	 * Initialize functions here, mostly actions and filters.
	 */
	public function init() {
		// Load ACF options page
		add_action('acf/init', array($this, 'loadACFoptions'));
	}

	// Load ACF options page
	public function loadACFoptions() {
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_611a80f401736',
				'title' => 'Qore Digital - Tools',
				'fields' => array(
					array(
						'key' => 'field_611a8389630e8',
						'label' => 'Scripts',
						'name' => '',
						'aria-label' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_611a839d630e9',
						'label' => 'Head scripts',
						'name' => 'head_scripts',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_611a872d2210d',
						'label' => 'Body scripts',
						'name' => 'body_scripts',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_611a83ae630ea',
						'label' => 'Footer scripts',
						'name' => 'footer_scripts',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_63f78b6174192',
						'label' => 'Front-end tools',
						'name' => '',
						'aria-label' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_63f78b8074193',
						'label' => 'Toolbar tonen?',
						'name' => 'show_toolbar',
						'aria-label' => '',
						'type' => 'true_false',
						'instructions' => 'Weergeeft een reeks opties aan de rechterzijde van het scherm voor het in/uitschakelen van veelvoorkomende front-end functionaliteiten.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui_on_text' => '',
						'ui_off_text' => '',
						'ui' => 1,
					),
					array(
						'key' => 'field_63f8bf1f9facb',
						'label' => 'Back-end tools',
						'name' => '',
						'aria-label' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_63f78be274194',
						'label' => 'Grote knop voor bijwerken tonen?',
						'name' => 'update_button',
						'aria-label' => '',
						'type' => 'true_false',
						'instructions' => 'Weergeeft een grote gefixeerde knop voor het bijwerken van een pagina/bericht in WordPress.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui_on_text' => '',
						'ui_off_text' => '',
						'ui' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'Qore Digital - Tools',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
				'show_in_rest' => 0,
			));
			
		endif;
	}
}