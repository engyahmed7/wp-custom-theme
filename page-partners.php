<?php
/* Template Name: Partners */
get_header(); ?>
<div class="container">
    <div class="breadcrumb">

        <a href=""><?php _e('Home', 'healol-domain'); ?></a> / <?php _e('About the Company', 'healol-domain'); ?>
    </div>
</div>


<div class="container">
    <div class="Left-col">
        <?php get_sidebar('left'); ?>


    </div>
    <div class="Main-content">
        <div class="partner-page">
            <div class="title-a">
                <h2><?php
                    $title = get_the_title($post->ID);
                    if ($title) {
                        echo '<span>' . esc_html__($title, 'healol-domain') . '</span>';
                    }
                    ?></h2>
            </div>
            <div class="text-block">
                <div class="img-box">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>

                    <?php endif; ?>
                </div>

                <ul>
                    <?php
                    $args = array(
                        'post_type'      => 'partners',
                        'posts_per_page' => -1,
                    );
                    $partners_query = new WP_Query($args);

                    if ($partners_query->have_posts()) :
                        while ($partners_query->have_posts()) : $partners_query->the_post(); ?>
                    <li>
                        <div class="img-box pull-left">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg">
                            <?php endif; ?>
                        </div>
                        <h2><?php esc_html__(the_title()); ?></h2>
                        <p><?php esc_html__(the_content()); ?></p>
                    </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                    <p><?php _e('No partners found', 'healol-domain'); ?></p>
                    <?php endif; ?>
                </ul>

            </div>
        </div>

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