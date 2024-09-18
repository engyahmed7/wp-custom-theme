<?php

class Contact_Settings_Page
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_settings_menu']);
        add_action('admin_init', [$this, 'initialize_settings']);
    }

    public function add_settings_menu()
    {
        add_menu_page(
            __('Contact Information', 'healol-domain'),
            __('Contact Information', 'healol-domain'),
            'manage_options',
            'contact-information',
            [$this, 'render_settings_page'],
            'dashicons-admin-site'
        );
    }

    public function initialize_settings()
    {
        register_setting(
            'contact_information_options_group',
            'contact_information_options'
        );

        add_settings_section(
            'contact_information_section',
            '',
            null,
            'contact-information'
        );

        add_settings_field(
            'contact_address',
            __('Address', 'healol-domain'),
            [$this, 'contact_address_callback'],
            'contact-information',
            'contact_information_section'
        );

        add_settings_field(
            'contact_phone',
            __('Phone', 'healol-domain'),
            [$this, 'contact_phone_callback'],
            'contact-information',
            'contact_information_section'
        );

        add_settings_field(
            'contact_email',
            __('Email', 'healol-domain'),
            [$this, 'contact_email_callback'],
            'contact-information',
            'contact_information_section'
        );
    }

    public function render_settings_page()
    {
        if (locate_template('template-parts/settings-page.php') != '') {
            include locate_template('template-parts/settings-page.php');
        }
    }

    public function contact_address_callback()
    {
        $options = get_option('contact_information_options');
        echo '<textarea name="contact_information_options[contact_address]" rows="5" cols="50">' .
            (isset($options['contact_address']) ? esc_textarea($options['contact_address']) : '') .
            '</textarea>';
    }

    public function contact_phone_callback()
    {
        $options = get_option('contact_information_options');
        echo '<input type="text" name="contact_information_options[contact_phone]" value="' .
            (isset($options['contact_phone']) ? esc_attr($options['contact_phone']) : '') .
            '" size="50" />';
    }

    public function contact_email_callback()
    {
        $options = get_option('contact_information_options');
        echo '<input type="email" name="contact_information_options[contact_email]" value="' .
            (isset($options['contact_email']) ? esc_attr($options['contact_email']) : '') .
            '" size="50" />';
    }

    public static function display_contact_information()
    {
        $options = get_option('contact_information_options');

        if (locate_template('template-parts/contact-information.php') != '') {
            include locate_template('template-parts/contact-information.php');
        }
    }
}

new Contact_Settings_Page();