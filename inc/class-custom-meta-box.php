<?php

class Class_Custom_Meta_Box
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save_meta_box_data']);
    }

    public function add_meta_box()
    {
        global $post;

        $current_template = get_page_template_slug($post->ID);

        if ($current_template !== 'home-custom.php') {
            return;
        }

        add_meta_box(
            'custom_meta_box_id',
            __('About Solutions Company', 'healol-domain'),
            [$this, 'render_meta_box'],
            'page',
            'normal',
            'high'
        );
    }

    public function render_meta_box($post)
    {
        wp_nonce_field('save_custom_meta_box_data', 'custom_meta_box_nonce');
        get_template_part('template-parts/meta-box-content', null, ['post' => $post]);
    }

    public function save_meta_box_data($post_id)
    {
        if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], 'save_custom_meta_box_data')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['custom_image_url'])) {
            $image_url = sanitize_text_field($_POST['custom_image_url']);
            update_post_meta($post_id, '_custom_image_url', $image_url);
        }

        if (isset($_POST['custom_description'])) {
            $description = sanitize_textarea_field($_POST['custom_description']);
            update_post_meta($post_id, '_custom_description', $description);
        }
    }
}

new Class_Custom_Meta_Box();