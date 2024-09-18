<?php
class News_Post_Type extends Custom_Post_Type
{
    public function __construct()
    {
        $labels = array(
            'name' => _x('News', 'Post type general name', 'healol-domain'),
            'singular_name' => _x('News', 'Post type singular name', 'healol-domain'),
            'menu_name' => _x('News', 'Admin Menu text', 'healol-domain'),
            'name_admin_bar' => _x('News', 'Add New on Toolbar', 'healol-domain'),
            'add_new' => __('Add New', 'healol-domain'),
            'add_new_item' => __('Add New News', 'healol-domain'),
            'new_item' => __('New News', 'healol-domain'),
            'edit_item' => __('Edit News', 'healol-domain'),
            'view_item' => __('View News', 'healol-domain'),
            'all_items' => __('All News', 'healol-domain'),
            'search_items' => __('Search News', 'healol-domain'),
            'not_found' => __('No news found.', 'healol-domain'),
            'not_found_in_trash' => __('No news found in Trash.', 'healol-domain'),
        );

        $args = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'news'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        );

        parent::__construct('news', $labels, $args);
    }
}

new News_Post_Type();