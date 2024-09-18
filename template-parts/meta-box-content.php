<?php
$image_url = get_post_meta($post->ID, '_custom_image_url', true);
$description = get_post_meta($post->ID, '_custom_description', true);
?>

<p>
    <label for="custom_image_url"><?php _e('Image URL:', 'healol-domain'); ?></label>
    <input type="text" id="custom_image_url" name="custom_image_url" value="<?php echo esc_attr($image_url); ?>"
        size="50" />
</p>
<p>
    <label for="custom_description"><?php _e('Description:', 'healol-domain'); ?></label>
    <textarea id="custom_description" name="custom_description" rows="5"
        cols="50"><?php echo esc_textarea($description); ?></textarea>
</p>