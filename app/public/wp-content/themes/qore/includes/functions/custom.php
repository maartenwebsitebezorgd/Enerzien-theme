<?php

//===============================================//
//============== Custom functions ===============//
//===============================================//

// Prefetch DNS
function dns_prefetch()
{
    echo '
        <meta http-equiv="x-dns-prefetch-control" content="on">
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <link rel="dns-prefetch" href="//www.google-analytics.com" />
    ';
}

// ACF options page(s)
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Algemeen',
        'menu_title' => 'Algemeen',
        'menu_slug' => 'options',
        'redirect' => false,
        'position' => '4',
        'icon_url' => 'dashicons-admin-tools',
        'update_button' => 'Wijzigingen opslaan',
    ]);
}

//Page Slug Body Class
// function add_slug_body_class($classes)
// {
//     global $post;

//     if (isset($post) && !empty($post))
//     {
//         $classes[] = $post->post_type . '-' . $post->post_name;
//     }
//     return $classes;
// }

// Get SVG from icons folder
function svg($name = 'smile', $align = 'ml-3')
{
    $icon_path = get_template_directory() . '/dist/img/icons/' . $name . '.svg';

    if (file_exists($icon_path)) {
        $icon = file_get_contents($icon_path);

        // Output
        return '<i class="h-5 w-5 text-inherit inline-flex items-center justify-center ' . $align . '" aria-hidden="true">' . $icon . '</i>';
    } else {
        return false;
    }
}

// Excerpt & read more functions
function custom_read_more()
{
    return '... <a class="link link-primary" href="' . get_permalink(get_the_ID()) . '">Lees verder &raquo;</a>';
}

function excerpt($limit)
{
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
}

function excerpt_only($limit)
{
    return wp_trim_words(get_the_excerpt(), $limit);
}

function excerpt_inside_link($limit)
{
    return wp_trim_words(get_the_excerpt(), $limit);
}

// Developer dump functions
function pr($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function vd($value)
{
    var_dump($value);
}

function generate_image_sizes()
{
    $image_sizes = [
        'shape-image' => [
            'width' => 1200,
            'height' => 1280,
            'crop' => true,
            'retina' => true,
        ],
        'post-thema' => [
            'width' => 472,
            'height' => 300,
            'crop' => true,
            'retina' => true,
        ],
        'team' => [
            'width' => 200,
            'height' => 180,
            'crop' => true,
            'retina' => true,
        ],
        'post-blog' => [
            'width' => 374,
            'height' => 213,
            'crop' => true,
            'retina' => true,
        ],
        'post-blog-large' => [
            'width' => 688,
            'height' => 424,
            'crop' => true,
            'retina' => true,
        ],
        'post-detail-image' => [
            'width' => 1240,
            'height' => 500,
            'crop' => true,
            'retina' => true,
        ],
        'cta' => [
            'width' => 640,
            'height' => 1240,
            'crop' => true,
            'retina' => false,
        ],
        'featured-team' => [
            'width' => 900,
            'height' => 1200,
            'crop' => true,
            'retina' => true,
        ],
        'shape-image-big' => [
            'width' => 1280,
            'height' => 1280,
            'crop' => true,
            'retina' => false,
        ],
    ];

    foreach ($image_sizes as $key => $value) {
        $name = $key;
        $width = $value['width'];
        $height = $value['height'];
        $crop = $value['crop'];
        $retina = $value['retina'];

        // Add size
        add_image_size($name, $width, $height, $crop);

        if (isset($retina) && $retina == true) {
            $retina_name = $name . '-retina';
            $retina_height = $height * 2;
            $retina_width = $width * 2;

            // Add retina size
            add_image_size($retina_name, $retina_width, $retina_height, $crop);
        }
    }
}

// Get Google API key from field - Globally accessible
function get_google_console_api($key = '')
{
    $key = get_field('google_api', 'option');

    return $key;
}

function acf_init_google_maps_api()
{
    $key = get_google_console_api();
    acf_update_setting('google_api_key', $key);
}

/* -- Read more toggle using <more> tag
========================================== */

function the_content_more($content = '', $post_id = '')
{
    global $post;

    if (empty($content)) {
        $content = get_post_field('post_content', $post_id);
    }

    if (empty($post_id)) {
        $post_id = $post->ID;
    }

    // Fetch post content

    $content_parts = get_extended($content);

    if (!empty($content_parts['extended'])) {
        echo '<div class="readmore_wrapper">
            <div class="readmore_before">' . wpautop($content_parts['main']) . '</div>
            <div class="readmore_after">' . wpautop($content_parts['extended']) . '</div>
            <button class="link link-primary readmore_toggle inline-flex justify-start items-center mt-8" role="button">
                <span class="more flex justify-start items-center">
                    <span class="link link-primary text-secondary inline-flex font-bold no-underline hover:underline">Lees verder</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex ml-3 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </span>
                <span class="less flex justify-start items-center">
                    <span class="link link-primary text-secondary inline-flex font-bold no-underline hover:underline">Tekst inklappen</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex ml-3 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>
                </span>
            </button>
        </div>';
    } else {
        return $content;
    }
}

// function remove_wysiwyg_editor()
// {
//     if (!empty($_GET['post'])) {
//         if (get_page_template_slug($_GET['post']) == '_pagebuilder.php') {
//             remove_post_type_support('page', 'editor');
//         }
//     }
// }

function acf_fields_flexible_content_label($title, $field, $layout, $i)
{
    if ($layout['name'] == 'header') {
        $group = get_sub_field('header');
        $title = '<b style="color: #4C1AD6;">' . $title . '</b>' . ' (' . esc_html($group['title']) . ')';

        return $title;
    } elseif ($layout['name'] == 'image_textblock') {
        $group = get_sub_field('image_textblock');
        $title = '<b style="color: #4C1AD6;">' . $title . '</b>' . ' (' . esc_html($group['title']) . ')';

        return $title;
    } elseif ($layout['name'] == 'text') {
        $group = get_sub_field('textblock');
        $title = '<b style="color: #4C1AD6;">' . $title . '</b>' . ' (' . esc_html(wp_trim_words($group['text'], 15)) . ')';

        return $title;
    } else {
        return '<b style="color: #4C1AD6;">' . $title . '</b>';
    }
}

function remove_editor_on_pagebuilder()
{
    if (isset($_GET['[page]'])) {
        $template = get_post_meta($_GET['post'], '_wp_page_template', true);
        $post_type = get_post_type($_GET['post']);

        if ($template == '_pagebuilder.php') {
            remove_post_type_support($post_type, 'editor');
        }
    }
}

function use_pagebuilder_template_by_default()
{
    global $post;
    if (
        'page' == $post->post_type
        && 0 != count(get_page_templates($post))
        && get_option('page_for_posts') != $post->ID // Not the page for listing posts
        && '' == $post->page_template // Only when page_template is not set
    ) {
        $post->page_template = '_pagebuilder.php';
    }
}

function acf_flexible_content_collapse_on_load()
{ ?>
    <script type="text/javascript">
        (function ($) {
            jQuery(document).ready(function () {
                jQuery('.layout').addClass('-collapsed');
                jQuery('body.post-php .acf-postbox').addClass('closed');
            });
        })(jQuery);
    </script>
    <?php
}

function calculate_readtime($post_id = '')
{
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }

    $content = get_post_field('post_content', $post_id);
    $count_words = str_word_count(strip_tags($content));

    $read_time = ceil($count_words / 250);

    $prefix = '';
    $suffix = ' min';

    $read_time_output = $prefix . $read_time . $suffix;

    return $read_time_output;
}

function get_posts_years()
{
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    $query_year = new WP_Query($args);
    $years = [];

    if ($query_year->have_posts()) {
        while ($query_year->have_posts()) {
            $query_year->the_post();
            $year = get_the_date('Y');
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }
        wp_reset_postdata();
    }

    return $years;
}

// Count post view amount and store in DB
function get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return 0;
    }

    return $count;
}

function store_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        ++$count;
        update_post_meta($postID, $count_key, $count);
    }
}

function webrand_filter_function()
{
    global $post;
    global $wp_query;

    $post_status = 'publish';
    $post_type = !empty($_GET['post_type']) ? $_GET['post_type'] : 'post';
    $post_per_page = !empty($_GET['post_per_page']) ? $_GET['post_per_page'] : 20;
    $orderby = !empty($_GET['orderby']) ? $_GET['orderby'] : 'menu_order';
    $year = !empty($_GET['year']) ? $_GET['year'] : 'any';
    $order = !empty($_GET['sort_date']) ? $_GET['sort_date'] : 'DESC';
    $reset_btn = '<button type="button" class="btn btn-outline" id="post_filter_reset">Wis filters</button>';
    $article_args = [];

    $args = [
        'post_per_page' => $post_per_page,
        'post_status' => $post_status,
        'post_type' => $post_type,
        'orderby' => $orderby,
        'order' => $order,
    ];

    $taxonomies = get_object_taxonomies($post_type);

    foreach ($taxonomies as $key) {
        if (isset($_GET[$key]) && $_GET[$key] !== '') {
            $value = sanitize_text_field($_GET[$key]);
            $args[$key] = $value;
        }
    }

    if (isset($_GET['cat'])) {
        $value = sanitize_text_field($_GET['cat']);
        $args['category_name'] = $value;
    }

    if (isset($_GET['year'])) {
        $args['date_query'] = [
            ['year' => $year],
        ];
    }

    $query = new WP_Query($args);
    $showed_post = intval($query->found_posts);
    $found_posts = intval(wp_count_posts('post')->publish);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            if (wp_is_mobile()) {
                get_template_part('includes/partials/articles/article', 'post-inline-small');
            } else {
                get_template_part('includes/partials/articles/article', 'post-inline');
            }
        }

        if ($showed_post !== $found_posts) {
            echo '<hr class="my-10 border-base-200">' . $reset_btn;
        } ?>

        <?php
    } else { ?>

        <div class="no-results w-full py-10">
            <div class="mb-10">
                <h3 class="text-2xl leading-tight font-bold">
                    <?php echo __('Geen resultaten', 'qore'); ?>
                </h3>
                <p>
                    <?php echo __('Geen resultaten gevonden in combinatie met de door jouw gekozen filters', 'qore'); ?>.
                </p>
            </div>
            <?php echo $reset_btn; ?>
        </div>

    <?php }

    wp_reset_query();

    exit();
}

function get_post_max_width()
{
    global $post;
    if (is_singular('post')) {
        $post_max_width = 'lg:max-w-2xl mx-auto';
    } elseif (is_page()) {
        $post_max_width = 'lg:max-w-2xl mx-auto';
    } else {
        $post_max_width = 'max-w-none mx-auto';
    }

    return $post_max_width;
}

function renderStarRating($rating, $maxRating = 5)
{
    $rating = $rating <= $maxRating ? $rating : $maxRating;

    $fullStar = "<i class='fas fa-star'></i>";
    $halfStar = "<i class='fas fa-star-half-alt'></i>";
    $emptyStar = "<i class='far fa-star'></i>";

    $fullStarCount = (int) $rating;
    $halfStarCount = ceil($rating) - $fullStarCount;
    $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

    $stars = str_repeat($fullStar, $fullStarCount);
    $stars .= str_repeat($halfStar, $halfStarCount);
    $stars .= str_repeat($emptyStar, $emptyStarCount);

    return '<div class="flex flex-row text-warning items-center justify-start">' . $stars . '</div>';
}

function btn_icon($value = '', $link = false)
{
    if (strpos($value, '#') !== false) {
        $icon = '<svg class="h-4 w-4 ml-3 rotate-90 transition-all" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor" fill-rule="evenodd"><path d="m10 2c-1.9522 0-3.75184.161-5.19629.35177-1.29999.17169-2.28025 1.15195-2.45194 2.45194-.19076 1.44445-.35177 3.24409-.35177 5.19629s.161 3.7518.35177 5.1963c.17169 1.3 1.15195 2.2802 2.45194 2.4519 1.44445.1908 3.24409.3518 5.19629.3518s3.7518-.161 5.1963-.3518c1.3-.1717 2.2802-1.1519 2.4519-2.4519.1908-1.4445.3518-3.2441.3518-5.1963s-.161-3.75184-.3518-5.19629c-.1717-1.29999-1.1519-2.28025-2.4519-2.45194-1.4445-.19076-3.2441-.35177-5.1963-.35177zm-5.45816-1.63101c-2.1968.29013-3.88272 1.97605-4.17285 4.17285-.19946 1.51024-.36899 3.39943-.36899 5.45816 0 2.0587.16953 3.9479.36899 5.4582.29013 2.1968 1.97605 3.8827 4.17285 4.1728 1.51024.1995 3.39943.369 5.45816.369 2.0587 0 3.9479-.1695 5.4582-.369 2.1968-.2901 3.8827-1.976 4.1728-4.1728.1995-1.5103.369-3.3995.369-5.4582 0-2.05873-.1695-3.94792-.369-5.45816-.2901-2.1968-1.976-3.88272-4.1728-4.17285-1.5103-.19946-3.3995-.36899-5.4582-.36899-2.05873 0-3.94792.16953-5.45816.36899z"/><path d="m7.79289 5.79289c-.39052.39053-.39052 1.02369 0 1.41422l2.79291 2.79289-2.79291 2.7929c-.39052.3905-.39052 1.0237 0 1.4142.39051.3905 1.02371.3905 1.41421 0l3.5-3.5c.3905-.3905.3905-1.0237 0-1.4142l-3.5-3.50001c-.3905-.39052-1.0237-.39052-1.41421 0z"/></g></svg>';
    } else {
        $icon = '<svg viewBox="0 0 14 20" class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg"><path d="m.15980028 11.1828264 7.8239313-10.83306383c.51745334-.71656082 1.64802366-.24480276 1.50268851.62707435l-1.08574889 6.51450173h4.2181478c.6821052 0 1.0773031.77280168.6778405 1.32581949l-7.82384767 10.83307136c-.51752024.7165574-1.64806548.2448454-1.50275542-.6270819l1.08573218-6.5144934h-4.21808095c-.68216372 0-1.07731143-.7728351-.67790736-1.3258278z" fill="currentColor" fill-rule="evenodd"/></svg>';
    }
    return $icon;
}

function get_icon_by_shortcode($atts)
{
    $name = !empty($atts['name']) ? wp_strip_all_tags($atts['name']) : 'smile';
    $align = !empty($atts['align']) ? wp_strip_all_tags($atts['align']) : 'left';

    $response = svg($name, $align);

    return $response;
}

// function get_icon_by_shortcode($atts)
// {
//     $atts = shortcode_atts([
//         'foo' => 'no foo',
//         'baz' => 'default baz'
//     ], $atts, 'bartag');

//     return "foo = {$atts['foo']}";
// }

function archive_title($title = '')
{
    if (is_category()) {
        $title = single_cat_title('Topic: ', false);
        // } elseif ( is_tag() ) {
        // $title = single_tag_title( '', false );
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
        // } elseif ( is_tax() ) { //for custom post types
        //     $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }

    return $title;
}

function wpb_custom_new_menu()
{
    register_nav_menus(
        array(
            'footer-1' => __('Footer 1'),
            'footer-2' => __('Footer 2'),
            'footer-3' => __('Footer 3'),
            'footer-4' => __('Footer 4')
        )
    );
}
add_action('init', 'wpb_custom_new_menu');

//===================================================================//
//============== Include support, filters and actions ===============//
//===================================================================//

// Support
add_post_type_support('page', 'excerpt');

// Actions
// add_action('init', 'remove_wysiwyg_editor');
add_action('wp_head', 'dns_prefetch', 0);
add_action('admin_init', 'remove_editor_on_pagebuilder');
add_action('acf/input/admin_head', 'acf_flexible_content_collapse_on_load');
add_action('add_meta_boxes', 'use_pagebuilder_template_by_default', 1);
add_action('wp_ajax_filter_values', 'webrand_filter_function');
add_action('wp_ajax_nopriv_filter_values', 'webrand_filter_function');
add_action('after_setup_theme', 'generate_image_sizes');

// Filter
// add_filter('body_class', 'add_slug_body_class');
add_filter('get_the_archive_title', 'archive_title');
add_filter('acf/fields/flexible_content/layout_title/name=content_blocks', 'acf_fields_flexible_content_label', 10, 4);

// Shortcodes
add_shortcode('icon', 'get_icon_by_shortcode');
