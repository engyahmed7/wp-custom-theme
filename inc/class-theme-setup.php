<?php
class Theme_Setup
{
    public function __construct()
    {
        add_action('init', array($this, 'init'));
    }

    public function init()
    {
        global $wp_locale;

        if (!($wp_locale instanceof WP_Locale)) {
            return false;
        }

        if (!is_admin()) {
            if (!empty($_GET['lang']) && $_GET['lang'] == 'en') {
                $wp_locale->text_direction = 'ltr';
            } else {
                $wp_locale->text_direction = 'rtl';
            }
        }
    }
}

// Initialize the class
new Theme_Setup();
