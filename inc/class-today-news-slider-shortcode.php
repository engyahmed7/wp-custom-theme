<?php

class Today_News_Slider_Shortcode
{

    public function __construct()
    {
        add_shortcode('today_news_slider', [$this, 'render_today_news_slider']);
    }

    public function render_today_news_slider()
    {
        $args = array(
            'post_type'      => 'news',
            'posts_per_page' => -1,
            'orderby'        => 'rand',
            'date_query'     => array(
                array(
                    'year'  => date('Y'),
                    'month' => date('m'),
                    'day'   => date('d'),
                ),
            ),
        );

        $latest_posts = get_posts($args);

        ob_start();

        include locate_template('template-parts/today-news-slider.php');

        return ob_get_clean();
    }
}

new Today_News_Slider_Shortcode();
