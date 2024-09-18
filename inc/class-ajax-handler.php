<?php
class AJAX_Handler
{
    public function __construct()
    {
        add_action('wp_ajax_load_more_solutions', array($this, 'load_more_solutions'));
        add_action('wp_ajax_nopriv_load_more_solutions', array($this, 'load_more_solutions'));
    }

    public function load_more_solutions()
    {
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'load_more_solutions_nonce')) {
            wp_send_json_error('Nonce verification failed');
        }
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

        $posts_per_page = 6;

        $total_posts = wp_count_posts('solutions')->publish;

        $total_pages = ceil($total_posts / $posts_per_page);

        if ($page > 1) {
            $args = array(
                'post_type'      => 'solutions',
                'posts_per_page' => $total_posts - ($posts_per_page * ($page - 1)),
                'paged'          => $page,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                ob_start();
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/solutions-list');
                endwhile;
                wp_reset_postdata();
                $response = ob_get_clean();
                wp_send_json_success($response);
            else :
                wp_send_json_error(__('No more solutions found.', 'healol-domain'));
            endif;
        } else {
            wp_send_json_error(__('Invalid request', 'healol-domain'));
        }

        wp_die();
    }
}

new AJAX_Handler();