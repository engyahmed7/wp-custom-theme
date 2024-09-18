<?php
class Solutions_Post_Type extends Custom_Post_Type
{
    public function __construct()
    {
        $labels = array(
            'name' => _x('Solutions', 'Post type general name', 'healol-domain'),
            'singular_name' => _x('Solutions', 'Post type singular name', 'healol-domain'),
            'menu_name' => _x('Solutions', 'Admin Menu text', 'healol-domain'),
            'name_admin_bar' => _x('Solutions', 'Add New on Toolbar', 'healol-domain'),
            'add_new' => __('Add New', 'healol-domain'),
            'add_new_item' => __('Add New Solutions', 'healol-domain'),
            'new_item' => __('New Solutions', 'healol-domain'),
            'edit_item' => __('Edit Solutions', 'healol-domain'),
            'view_item' => __('View Solutions', 'healol-domain'),
            'all_items' => __('All Solutions', 'healol-domain'),
            'search_items' => __('Search Solutions', 'healol-domain'),
            'not_found' => __('No Solutions found.', 'healol-domain'),
            'not_found_in_trash' => __('No Solutions found in Trash.', 'healol-domain'),
        );

        $args = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'solutions'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        );

        parent::__construct('solutions', $labels, $args);
    }
}

new Solutions_Post_Type();