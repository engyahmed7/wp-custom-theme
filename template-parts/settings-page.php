<div class="wrap">
    <h1><?php _e('Contact Information Settings', 'healol-domain'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('contact_information_options_group');
        do_settings_sections('contact-information');
        submit_button();
        ?>
    </form>
</div>