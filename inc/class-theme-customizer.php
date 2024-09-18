<?php

class Theme_Customizer
{

    public function __construct()
    {
        add_action('customize_register', array($this, 'customize_register'));
    }

    public function customize_register($wp_customize)
    {
        $wp_customize->add_section('footer_settings', array(
            'title'    => __('Footer & Header Settings', 'healol-domain'),
            'priority' => 120,
        ));

        $wp_customize->add_setting('footer_copyright_text', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('footer_copyright_text_control', array(
            'label'    => __('Footer Copyright Text', 'healol-domain'),
            'section'  => 'footer_settings',
            'settings' => 'footer_copyright_text',
            'type'     => 'text',
        ));

        $wp_customize->add_setting('footer_facebook_url', array(
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('footer_facebook_url_control', array(
            'label'    => __('Footer Facebook URL', 'healol-domain'),
            'section'  => 'footer_settings',
            'settings' => 'footer_facebook_url',
            'type'     => 'url',
        ));

        $wp_customize->add_setting('footer_twitter_url', array(
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('footer_twitter_url_control', array(
            'label'    => __('Footer Twitter URL', 'healol-domain'),
            'section'  => 'footer_settings',
            'settings' => 'footer_twitter_url',
            'type'     => 'url',
        ));
    }
}

new Theme_Customizer();