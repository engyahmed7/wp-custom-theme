<?php
class Partners_Post_Type extends Custom_Post_Type
{
    public function __construct()
    {
        $labels = array(
            'name' => _x('Partners', 'Post type general name', 'healol-domain'),
            'singular_name' => _x('Partners', 'Post type singular name', 'healol-domain'),
            'menu_name' => _x('Partners', 'Admin Menu text', 'healol-domain'),
            'name_admin_bar' => _x('Partners', 'Add New on Toolbar', 'healol-domain'),
            'add_new' => __('Add New', 'healol-domain'),
            'add_new_item' => __('Add New Partners', 'healol-domain'),
            'new_item' => __('New Partners', 'healol-domain'),
            'edit_item' => __('Edit Partners', 'healol-domain'),
            'view_item' => __('View Partners', 'healol-domain'),
            'all_items' => __('All Partners', 'healol-domain'),
            'search_items' => __('Search Partners', 'healol-domain'),
            'not_found' => __('No Partners found.', 'healol-domain'),
            'not_found_in_trash' => __('No Partners found in Trash.', 'healol-domain'),
        );

        $args = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'partners'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        );

        parent::__construct('partners', $labels, $args);
    }
}

new Partners_Post_Type();