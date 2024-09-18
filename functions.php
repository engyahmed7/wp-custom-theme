<?php

/**
 * My Custom Theme functions and definitions
 *
 * @package My_Custom_Theme
 */

// Define constants
define('MCT_DIR', get_template_directory());
define('MCT_URI', get_template_directory_uri());

// Include required files
$required_files = [
    'inc/class-theme-setup.php',
    'inc/class-my-theme-menus.php',
    'inc/class-custom-post-type.php',
    'inc/class-today-news-slider-shortcode.php',
    'inc/class-news-post-type.php',
    'inc/class-solutions-post-type.php',
    'inc/class-partners-post-type.php',
    'inc/class-blog-post-type.php',
    'inc/class-our-team-post-type.php',
    'inc/class-our-team-custom-fields.php',
    'inc/class-custom-meta-box.php',
    'inc/class-theme-customizer.php',
    'inc/class-ajax-handler.php',
    'inc/class-theme-assets.php',
    'inc/class-contact-settings-page.php',
    'inc/class-blog-box-widget.php',
    'inc/custom-icons.php',
];


foreach ($required_files as $file) {
    require MCT_DIR . '/' . $file;
}


/**
 * Theme setup function
 */
function my_theme_setup()
{
    add_theme_support('widgets');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
    add_theme_support('post-formats', [
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ]);
    add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'my_theme_setup');

/**
 * Register sidebar
 */
function healol_register_sidebar()
{

    register_sidebar([
        'name'          => __('Left Sidebar', 'healol-domain'),
        'id'            => 'left-sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title-a"><h2>',
        'after_title'   => '</h2></div>',

    ]);

    register_sidebar(array(
        'name'          => __('Blog Left Sidebar', 'healol-domain'),
        'id'            => 'blog-left-sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'healol_register_sidebar');


function add_custom_query_vars($vars)
{
    $vars[] = 'blog_box_paged';
    $vars[] = 'main_content_paged';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// with WP_Query
function get_page_Url_by_template_name($template_name)
{
    $template_name = sanitize_text_field($template_name);

    $query = new WP_Query(array(
        'post_type'  => 'page',
        'meta_key'   => '_wp_page_template',
        'meta_value' => $template_name,
        'posts_per_page' => 1,
    ));

    if ($query->have_posts()) {
        $query->the_post();
        $page_id = get_the_ID();
        wp_reset_postdata();
        return get_permalink($page_id);
    }

    return null;
}



// add_action('admin_init', function () {
//     if (class_exists('WPML_Installer_Gateway')) {
//         $gateway = WPML_Installer_Gateway::get_instance();
//         if ($gateway->class_exists()) {
//             $site_key = $gateway->get_site_key();
//             error_log('Site Key: ' . $site_key);
//         } else {
//             error_log('WP_Installer_API class does not exist.');
//         }
//     } else {
//         error_log('WPML_Installer_Gateway class does not exist.');
//     }
// });