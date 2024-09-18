<?php
function my_theme_add_custom_icons_to_menu_items($items, $args)
{
    $icon_classes = array(
        1 => 'main-icon',
        2 => 'about-icon',
        3 => 'service-icon',
        4 => 'partner-icon',
        5 => 'blog-icon',
        6 => 'contact-icon'
    );

    $lang = !empty($_GET['lang']) ? esc_attr($_GET['lang']) : 'ar';

    foreach ($items as $index => $item) {
        if (isset($icon_classes[$index])) {
            $items[$index]->title = '<span class="' . $icon_classes[$index] . '"></span>' . $item->title;
        }

        $url = $item->url;
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'] ?? '', $query_params);

        $query_params['lang'] = $lang; //en
        $new_query = http_build_query($query_params); //lang=en

        $item->url = $parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path'] . '?' . $new_query;
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'my_theme_add_custom_icons_to_menu_items', 10, 2);