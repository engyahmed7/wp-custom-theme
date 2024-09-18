<?php

$member_name = get_post_meta($post->ID, 'member_name', true);
$member_position = get_post_meta($post->ID, 'member_position', true);
?>

<div style="margin-top: 20px;">
    <label for="member_name" style="display: block; font-size: 16px; margin-bottom: 5px;">Member Name</label>
    <input type="text" name="member_name" id="member_name" value="<?php echo esc_attr($member_name); ?>"
        style="width:100%; padding: 10px; font-size: 14px;">

    <label for="member_position" style="display: block; font-size: 16px; margin-top: 20px; margin-bottom: 5px;">Member
        Position</label>
    <input type="text" name="member_position" id="member_position" value="<?php echo esc_attr($member_position); ?>"
        style="width:100%; padding: 10px; font-size: 14px;">
</div>