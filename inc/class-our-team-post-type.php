<?php
class Our_Teams_Post_Type extends Custom_Post_Type
{
    public function __construct()
    {
        $labels = array(
            'name' => _x('Our Team', 'Post type general name', 'healol-domain'),
            'singular_name' => _x('Team Member', 'Post type singular name', 'healol-domain'),
            'menu_name' => _x('Our Team', 'Admin Menu text', 'healol-domain'),
            'name_admin_bar' => _x('Our Team', 'Add New on Toolbar', 'healol-domain'),
            'add_new' => __('Add New Team Member', 'healol-domain'),
            'add_new_item' => __('Add New Team', 'healol-domain'),
            'new_item' => __('New Team', 'healol-domain'),
            'edit_item' => __('Edit Team', 'healol-domain'),
            'view_item' => __('View Team', 'healol-domain'),
            'all_items' => __('All Team', 'healol-domain'),
            'search_items' => __('Search Our Team', 'healol-domain'),
            'not_found' => __('No Our Team found.', 'healol-domain'),
            'not_found_in_trash' => __('No Our Team found in Trash.', 'healol-domain'),
        );

        $args = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'our_team'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('author', 'thumbnail'),
        );

        parent::__construct('our_team', $labels, $args);
    }
}

new Our_Teams_Post_Type();