<?php
class Blog_Box_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'blog_box_widget',
            __('Blog Box', 'healol-domain'),
            array('description' => __('Displays recent blog posts with pagination', 'healol-domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $blog_box_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query_args = array(
            'post_type'      => 'blogs',
            'posts_per_page' => 3,
            'paged'          => $blog_box_paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $blog_query = new WP_Query($query_args);

        if (locate_template('template-parts/widgets/blog-box-widget.php') != '') {
            include locate_template('template-parts/widgets/blog-box-widget.php');
        }

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        return $instance;
    }
}

function register_blog_box_widget()
{
    register_widget('Blog_Box_Widget');
}
add_action('widgets_init', 'register_blog_box_widget');