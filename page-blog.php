<?php
/* Template Name: Blog */

get_header(); ?>

<div class="container">
    <div class="breadcrumb">
        <a href=""><?php _e('Home', 'healol-domain'); ?></a> / <?php _e('About the Company', 'healol-domain'); ?>
    </div>
</div>

<div class="container">
    <div class="Left-col">
        <?php get_sidebar('left'); ?>
        <?php get_sidebar('blog-left'); ?>

    </div>
    <div class="Main-content">
        <?php
        $main_content_paged = (get_query_var('main_content_paged')) ? get_query_var('main_content_paged') : 1;

        $args = array(
            'post_type'      => 'blogs',
            'posts_per_page' => 6,
            'paged'          => $main_content_paged,
            'orderby'        => 'date',
            'order'          => 'ASC',
        );

        $blog_query = new WP_Query($args);
        ?>

        <?php if ($blog_query->have_posts()) : ?>
        <div class="Blog">
            <div class="title-a">
                <h2><?php _e('Blog', 'healol-domain'); ?></h2>
            </div>
            <div class="text-block">
                <ul>
                    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <li>
                        <div class="img-box pull-left">
                            <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" width="230" height="118">
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg"
                                width="230" height="118">
                            <?php endif; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="Foot-blog">
                <?php
                    $total_pages = $blog_query->max_num_pages;

                    if ($total_pages > 1) {
                        echo paginate_links(array(
                            'format'    => '?main_content_paged=%#%',
                            'total' => $blog_query->max_num_pages,
                            'current' => $main_content_paged,
                            'prev_text' => '«',
                            'next_text' => '»',
                        ));
                    }
                    ?>
            </div>
        </div>
        <?php else : ?>
        <p><?php _e('No posts found.', 'healol-domain'); ?></p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</div>


<div class="clearfix"></div>
<section class="partner">

    <h2><?php _e('Success Partners', 'healol-domain'); ?></h2>
    <div class="container">
        <ul class="list-b">
            <?php
            $args = array(
                'post_type' => 'partners',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $image_url = get_the_post_thumbnail_url($post->ID, 'full');
                    if ($image_url) :
            ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" width="192" height="62" alt="<?php the_title(); ?>">
                </a>
            </li>
            <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                ?>
            <li><?php _e('No partners found.', 'healol-domain'); ?></li>
            <?php
            endif;
            ?>
        </ul>

    </div>
</section>

<?php get_footer(); ?>