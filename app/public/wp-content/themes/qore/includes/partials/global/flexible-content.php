<?php

while (have_rows('content_blocks')) {
    the_row();

    if (get_row_layout() == 'news') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'news', $args);
    } elseif (get_row_layout() == 'projects') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'projects', $args);
    } elseif (get_row_layout() == 'themes') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'relation', $args);
    } elseif (get_row_layout() == 'testimonials') {
        $args = [];
        get_template_part('includes/partials/sliders/slider', 'testimonials', $args);
    } elseif (get_row_layout() == 'partners') {
        $args = [];
        get_template_part('includes/partials/sliders/slider', 'partners', $args);
    } elseif (get_row_layout() == 'header') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'header', $args);
    } elseif (get_row_layout() == 'text') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'textblock', $args);
    } elseif (get_row_layout() == 'textblock_two_columns') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'textblock-two-columns', $args);
    } elseif (get_row_layout() == 'image_textblock') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'image-textblock', $args);
    } elseif (get_row_layout() === 'usps') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'usps-icon', $args);
    } elseif (get_row_layout() === 'featured_image') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'featured-image', $args);
    } elseif (get_row_layout() === 'cta') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'cta', $args);
    } elseif (get_row_layout() === 'form') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'form', $args);
    } elseif (get_row_layout() === 'cases') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'cases', $args);
    } elseif (get_row_layout() === 'solutions') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'solutions-featured', $args);
    } elseif (get_row_layout() === 'faq') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'faq', $args);
    } elseif (get_row_layout() === 'gallery') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'gallery', $args);
    } elseif (get_row_layout() === 'team_featured') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'team-featured', $args);
    } elseif (get_row_layout() === 'partners_slider') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'partners-slider', $args);
    } elseif (get_row_layout() === 'uitgelichte_vacatures') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'uitgelichte-vacatures', $args);
    } elseif (get_row_layout() === 'media_steps') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'media-steps', $args);
    } elseif (get_row_layout() === 'content_media') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'content-media', $args);
    } elseif (get_row_layout() === 'offgrid_gallery') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'offgrid-gallery', $args);
    } elseif (get_row_layout() === 'content_simple') {
        $args = [];
        get_template_part('includes/partials/sections/section', 'content-simple', $args);
    }
}
