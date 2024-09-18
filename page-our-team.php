<?php

/* Template Name: Our Team */

get_header(); ?>
<div class="container">
    <div class="breadcrumb">
        <a href=""><?php _e('Home', 'healol-domain'); ?></a> / <?php _e('About the Company', 'healol-domain'); ?>
    </div>
</div>


<div class="container">

    <div class="Main-content">
        <div class="about-company">
            <div class="title-a">
                <?php
                $title = get_the_title($post->ID);
                if ($title) {
                    echo '<h2><span>' . esc_html__($title, 'healol-domain') . '</span></h2>';
                }
                ?>
            </div>
        </div>

        <?php
        $args = array(
            'post_type' => 'our_team',
            'posts_per_page' => -1, 
        );
        $query = new WP_Query($args);
        ?>

        <ul id="teamList">
            <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
                <?php
                        if (has_post_thumbnail()) {
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        }
                        ?>
                <img src="<?php echo esc_url($thumbnail_url); ?>" width="105" height="100" alt="<?php the_title(); ?>">
                <aside>
                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'member_name', true)); ?></p>
                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'member_position', true)); ?></p>
                    <p><span></span><a href="<?php the_permalink(); ?>">Member Profile</a></p>
                </aside>
            </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <li><?php _e('No team members found.', 'healol-domain'); ?></li>
            <?php endif; ?>
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