<?php

$register_taxonomy_soort = function() {
    
    $taxonomy_name = 'soort'; // Wat wordt de naam van de taxonomy?

    register_taxonomy( $taxonomy_name,
    
        array(
            'sample', // Aan welke post types moet hij gekoppeld worden? Dit mogen er meerder zijn.
        ),
        
        array('hierarchical' => true,
            'labels' => array(
                'name' => __("Soort", "qore"),
                'singular_name' => __("Soort", "qore"),
                'search_items' => __("Soort", "qore"),
                'all_items' => __("Alle soorten", "qore"),
                'parent_item' => __("Vorig item", "qore"),
                'parent_item_colon' => __("Vorig item", "qore"),
                'edit_item' => __("Wijzig soort", "qore"),
                'update_item' => __("Update soort", "qore"),
                'add_new_item' => __("Soort toevoegen", "qore"),
                'new_item_name' => __("Nieuw soort", "qore"),
            ),
            'rewrite' => array('slug' => $taxonomy_name),
            'query_var' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'show_in_rest' => true, // Show as Gutenberg block witin editor.
        )
    );
};


add_action('init', $register_taxonomy_soort);