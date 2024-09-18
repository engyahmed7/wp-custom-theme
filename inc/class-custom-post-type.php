<?php
class Custom_Post_Type
{
    protected $post_type;
    protected $labels;
    protected $args;

    public function __construct($post_type, $labels, $args)
    {
        $this->post_type = $post_type;
        $this->labels = $labels;
        $this->args = $args;

        add_action('init', array($this, 'register_post_type'));
    }

    public function register_post_type()
    {
        $this->args['labels'] = $this->labels;
        register_post_type($this->post_type, $this->args);
    }
}