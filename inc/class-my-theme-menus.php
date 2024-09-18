<?php

class Class_My_Theme_Menus {
    public function __construct() {
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus() {
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'healol-domain'),
            'footer_menu' => __('Footer Menu', 'healol-domain'),
        ));
    }
}

new Class_My_Theme_Menus();