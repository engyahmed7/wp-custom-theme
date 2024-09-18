<?php
class Blogs_Post_Type extends Custom_Post_Type
{
    public function __construct()
    {
        $labels = array(
            'name' => _x('Blogs', 'Post type general name', 'healol-domain'),
            'singular_name' => _x('Blogs', 'Post type singular name', 'healol-domain'),
            'menu_name' => _x('Blogs', 'Admin Menu text', 'healol-domain'),
            'name_admin_bar' => _x('Blogs', 'Add New on Toolbar', 'healol-domain'),
            'add_new' => __('Add New', 'healol-domain'),
            'add_new_item' => __('Add New Blogs', 'healol-domain'),
            'new_item' => __('New Blogs', 'healol-domain'),
            'edit_item' => __('Edit Blogs', 'healol-domain'),
            'view_item' => __('View Blogs', 'healol-domain'),
            'all_items' => __('All Blogs', 'healol-domain'),
            'search_items' => __('Search Blogs', 'healol-domain'),
            'not_found' => __('No Blogs found.', 'healol-domain'),
            'not_found_in_trash' => __('No Blogs found in Trash.', 'healol-domain'),
        );

        $args = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'blogs'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        );

        parent::__construct('blogs', $labels, $args);
    }
}

new Blogs_Post_Type();