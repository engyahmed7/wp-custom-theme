<?php
class Our_Team_Custom_Fields
{

    public function __construct()
    {
        add_action('admin_init', [$this, 'add_custom_fields']);
        add_action('save_post', [$this, 'save_custom_fields']);
        add_filter('the_title', [$this, 'custom_admin_title'], 10, 2);
    }


    public function add_custom_fields()
    {
        add_action('edit_form_after_title', [$this, 'custom_fields_form']);
    }


    public function custom_fields_form($post)
    {
        if ($post->post_type == 'our_team') {
            include locate_template('template-parts/team-custom-fields-form.php');
        }
    }


    public function save_custom_fields($post_id)
    {
        if (isset($_POST['member_name'])) {
            update_post_meta($post_id, 'member_name', sanitize_text_field($_POST['member_name']));
        }
        if (isset($_POST['member_position'])) {
            update_post_meta($post_id, 'member_position', sanitize_text_field($_POST['member_position']));
        }
    }

    public function custom_admin_title($column_title, $post_id)
    {
        $post_type = get_post_type($post_id);
        if ($post_type == 'our_team') {
            $member_name = get_post_meta($post_id, 'member_name', true);
            $member_position = get_post_meta($post_id, 'member_position', true);

            if (!empty($member_name) && !empty($member_position)) {
                return $member_name;
            }
        }
        return $column_title;
    }
}

new Our_Team_Custom_Fields();