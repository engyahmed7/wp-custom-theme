<!DOCTYPE html>
<html lang="<?php echo !empty($_GET['lang']) ? $_GET['lang'] : 'en'; ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7">
    <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8">
    <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <!--[if lt IE 7]>
        <p class="chromeframe">
            You are using an <strong>outdated</strong> browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a> or
            <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>
            to improve your experience.
        </p>
        <![endif]-->

        <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>


    <header>
        <div class="top-bar">
            <div class="container">
                <ul class="social-icons pull-left unstyled">
                    <li><a href="<?php echo esc_url(get_theme_mod('footer_facebook_url', '#')); ?>"
                            class="Facebook"></a></li>
                    <li><a href="<?php echo esc_url(get_theme_mod('footer_twitter_url', '#')); ?>" class="Twitter"></a>
                    </li>

                </ul>


                <!-- <select class="gt_selector notranslate" aria-label="Select Language">
                        <option value="">Select Language</option>
                        <option value="en|ar" data-gt-href="#" selected="">Arabic</option>
                        <option value="en|en" data-gt-href="#">English</option>
                    </select> -->

                <div class="Language pull-left">
                    <?php echo do_shortcode('[gtranslate]'); ?>
                </div>
            </div>
        </div>

        <div class="menu-box">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_site_icon_url(); ?>" width="193" height="151" alt="Logo">

                </a>
                <span class="slogan">
                    <?php echo get_bloginfo('description'); ?>
                </span>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'main-menu pull-left',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
                ?>
            </div>
        </div>

    </header>