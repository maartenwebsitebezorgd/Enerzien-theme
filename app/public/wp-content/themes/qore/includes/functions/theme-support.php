<?php

// Adding WP Functions & Theme Support
function qore_theme_support()
{
    if (!defined('DISALLOW_FILE_EDIT'))
    {
        define('DISALLOW_FILE_EDIT', true);
    }

    // Add WP Thumbnail Support
    add_theme_support('post-thumbnails');

    // add_filter('image_size_names_choose', 'custom_image_sizes');

    // function custom_image_sizes($sizes)
    // {
    //     return array_merge($sizes, [
    //         'header-detail' => __('Omslagfoto detailpagina'),
    //         'block-item' => __('Bericht achtergrondfoto'),
    //         'block-item-small' => __('Bericht achtergrondfoto (small)'),
    //         'block-item-large' => __('Bericht achtergrondfoto (breed)'),
    //         'slider-item' => __('Slider (block) achtergrondfoto'),
    //     ]);
    // }

    // Add RSS Support
    add_theme_support('automatic-feed-links');

    // Add Support for WP Controlled Title Tag
    add_theme_support('title-tag');

    // Add HTML5 Support
    add_theme_support(
        'html5',
        [
            'comment-list',
            'comment-form',
            'search-form',
        ]
    );

    // Editor styles
    add_theme_support('editor-styles');

    add_editor_style();

    // Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
    $GLOBALS['content_width'] = apply_filters('qore_theme_support', 1200);
} /* end theme support */

add_action('after_setup_theme', 'qore_theme_support');
