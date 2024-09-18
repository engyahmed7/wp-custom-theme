<?php

class Theme_Assets
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function enqueue_assets()
    {
        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    private function enqueue_styles()
    {
        if (is_404()) {
            wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css', array(), '1.0.0');
            wp_enqueue_script(
                'goog-fixurl',
                '//linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js',
                array(),
                null,
                true
            );

            wp_add_inline_script(
                'goog-fixurl',
                "var GOOG_FIXURL_LANG = (navigator.language || '').slice(0, 2),
                GOOG_FIXURL_SITE = location.host;"
            );
            return;
        }

        $css_files = array(
            'bootstrap-responsive'    => 'assets/css/bootstrap-responsive.css',
            'bootstrap'               => 'assets/css/bootstrap.css',
            'bootstrap.min'           => 'assets/css/bootstrap.min.css',
            'bootstrap-responsive.min' => 'assets/css/bootstrap-responsive.min.css',
            'normalize'               => 'assets/css/normalize.css',
            'styles'                  => 'assets/css/styles.css',
            'style2'                  => 'assets/css/style2.css',
        );

        foreach ($css_files as $handle => $file) {
            wp_enqueue_style(
                $handle,
                get_template_directory_uri() . '/' . $file,
                array(),
                '1.0.0'
            );
        }

        $main_css = is_rtl() ? 'assets/css/main.css' : 'assets/css/main_en.css';
        wp_enqueue_style(
            'main',
            get_template_directory_uri() . '/' . $main_css,
            array(),
            '1.0.0'
        );
    }

    private function enqueue_scripts()
    {
        $scripts = array(
            'modernizr'               => array('path' => 'assets/js/vendor/modernizr-2.6.2.min.js', 'deps' => array(), 'version' => '2.6.2'),
            'jquery-cdn'              => array('path' => '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 'deps' => array(), 'version' => '1.9.1'),
            'jquery-easing'           => array('path' => '//ajax/libs/jquery-easing/1.3/jquery.easing.min.js', 'deps' => array(), 'version' => '1.3'),
            'bootstrap'               => array('path' => 'assets/js/bootstrap.min.js', 'deps' => array('jquery-cdn'), 'version' => '1.0.0'),
            'jquery.easing.1.3.min'   => array('path' => 'assets/js/jquery.easing.1.3.min', 'deps' => array('jquery-cdn'), 'version' => '1.0.0'),
            'jquery-easing'           => array('path' => 'assets/js/jquery.easing.js', 'deps' => array('jquery-cdn'), 'version' => '1.3'),
            'plugins'                 => array('path' => 'assets/js/plugins.js', 'deps' => array('jquery-cdn'), 'version' => '1.0.0'),
            'main'                    => array('path' => 'assets/js/main.js', 'deps' => array('jquery-cdn'), 'version' => '1.0.0'),
            'jquery-mousewheel'       => array('path' => 'assets/js/jquery.mousewheel.min.js', 'deps' => array('jquery-cdn'), 'version' => '1.0.0'),
            'jquery-sliderkit'       => array('path' => 'assets/js/jquery.sliderkit.1.9.pack.js', 'deps' => array('jquery-cdn'), 'version' => '1.9'),
            'jquery-selectbox'        => array('path' => 'assets/js/jquery.selectbox-0.1.3.js', 'deps' => array('jquery-cdn'), 'version' => '0.1.3'),
            'script'                  => array('path' => 'assets/js/script.js', 'deps' => array('jquery-cdn'), 'version' => '0.1.3'),
        );

        foreach ($scripts as $handle => $details) {
            wp_enqueue_script(
                $handle,
                get_template_directory_uri() . '/' . $details['path'],
                $details['deps'],
                $details['version'],
                true
            );
        }

        wp_add_inline_script(
            'jquery-selectbox',
            'jQuery(function($) {
                $("#country_id").selectbox();
                $(document).ready(function() {
                    var buttons = {
                        previous: $("#jslidernews2 .button-previous"),
                        next: $("#jslidernews2 .button-next")
                    };
                    $("#jslidernews2").lofJSidernews({
                        interval: 5000,
                        easing: "easeInOutQuad",
                        duration: 1200,
                        auto: true,
                        mainWidth: 640,
                        mainHeight: 400,
                        navigatorHeight: 100,
                        navigatorWidth: 354,
                        maxItemDisplay: 4,
                        buttons: buttons
                    });
                });
                $(".newslider-minimal").sliderkit({
                    auto: true,
                    circular: true,
                    shownavitems: 1,
                    panelfx: "sliding",
                    panelfxspeed: 400,
                    panelfxeasing: "easeOutCirc",
                    mousewheel: true,
                    verticalnav: true,
                    verticalslide: true
                });
            });'
        );

        wp_add_inline_script(
            'jquery-cdn',
            "var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function(d, t) {
                var g = d.createElement(t),
                    s = d.getElementsByTagName(t)[0];
                g.src = '//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s);
            }(document, 'script'));"
        );

        wp_enqueue_script('load-more', get_template_directory_uri() . '/assets/js/load-more.js', array('jquery'), null, true);

        wp_localize_script('load-more', 'wp_vars', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('load_more_solutions_nonce')
        ));
    }
}

new Theme_Assets();