<?php
/* Template Name: Services Page */
get_header(); ?>

<div class="container">
    <div class="breadcrumb">
        <a href=""><?php _e('Home', 'healol-domain'); ?></a> / <?php _e('Our Services', 'healol-domain'); ?>
    </div>
</div>


<div class="container">
    <div class="Left-col">
        <?php get_sidebar('left'); ?>
        <?php get_sidebar('blog-left'); ?>

    </div>
    <div class="Main-content">

        <div class="title-a">
            <h2>
                <?php
                $title = get_the_title($post->ID);
                if ($title) {
                    echo '<span>' . esc_html__($title, 'healol-domain') . '</span>';
                }
                ?>
            </h2>
        </div>
        <div class="text-block">
            <div class="img-box">
                <?php
                $image_url = get_the_post_thumbnail_url($post->ID, 'full');
                if ($image_url) :
                    echo '<img src="' . esc_url($image_url) . '" width="670" height="231">';
                endif;
                ?>

            </div>



            <?php

            $content = get_the_content();
            if ($content) {
                echo wp_kses_post($content);
            }

            ?>

            <ul class="list-d">
                <?php
                $args = array(
                    'post_type' => 'solutions',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'title',
                );

                $solutions = new WP_Query($args);
                if ($solutions->have_posts()) :
                    while ($solutions->have_posts()) : $solutions->the_post();
                ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<li>' . __('No solutions found', 'healol-domain') . '</li>';
                endif;
                ?>
            </ul>
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