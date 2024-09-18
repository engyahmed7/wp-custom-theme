<?php
/* Template Name: Home Page */

/**
 * The main template file
 */

get_header();
?>
<section class="slider">

    <!------------------------------------- THE CONTENT ------------------------------------------------->
    <div id="jslidernews2" class="lof-slidecontent" style="width:980px; height:400px;">
        <div class="preload">
            <div></div>
        </div>

        <div class="button-previous"><?php _e('Previous', 'healol-domain'); ?></div>

        <!-- MAIN CONTENT -->
        <div class="main-slider-content" style="width:640px; height:400px;">
            <ul class="sliders-wrap-inner">
                <?php
                $args = array(
                    'post_type'      => 'news',
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $latest_posts = get_posts($args);

                foreach ($latest_posts as $post) : setup_postdata($post); ?>
                <li>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>">
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slid-1.jpg">
                    <?php endif; ?>
                </li>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </ul>
        </div>
        <!-- END MAIN CONTENT -->

        <!-- NAVIGATOR -->
        <div class="navigator-content">
            <div class="navigator-wrapper">
                <ul class="navigator-wrap-inner">
                    <?php
                    $args = array(
                        'post_type'      => 'news',
                        'posts_per_page' => 5,
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    );
                    $latest_posts = get_posts($args);

                    foreach ($latest_posts as $post) : setup_postdata($post); ?>
                    <li>
                        <div>
                            <h3><?php the_content(); ?></h3>
                        </div>
                    </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
        <!-- END NAVIGATOR -->

        <!----------------- END OF NAVIGATOR --------------------->
        <div class="button-next"><?php _e('Next', 'healol-domain'); ?></div>

        <!-- BUTTON PLAY-STOP -->
        <div class="button-control"><span></span></div>
        <!-- END OF BUTTON PLAY-STOP -->

    </div>

    <!------------------------------------- END OF THE CONTENT ------------------------------------------------->

</section>

<section class="news-block">
    <div class="container">
        <div class="new-news">
            <h3><?php _e('Company News', 'healol-domain'); ?></h3>

            <!-- Start newslider-minimal -->
            <div class="sliderkit newslider-minimal">

                <?php echo do_shortcode('[today_news_slider]'); ?>
            </div>
            <!-- // end of newslider-minimal -->


        </div>
        <!--new-news-->
    </div>
</section>


<section class="Home-content">
    <div class="container">
        <div class="about-comp pull-right">
            <div class="title-a">
                <h2><?php _e('About Solutions Company', 'healol-domain'); ?></h2>
            </div>
            <?php
            $page_id = get_the_ID();

            $image_url = get_post_meta($page_id, '_custom_image_url', true);
            $description = get_post_meta($page_id, '_custom_description', true);

            $template_name = 'about-us.php';
            $page_url = get_page_url_by_template_name($template_name);


            if ($image_url || $description) {
            ?>

            <div class="text-box">
                <?php if ($image_url) : ?>
                <div class="img-box">
                    <img src="<?php echo esc_url($image_url); ?>" width="369" height="183">
                </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                <p><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
                <br /><br /><br /><br />
                <?php
                    $about_us_url = get_page_url_by_template_name('about-us.php');
                    if ($about_us_url) :
                        echo '<a href="' . esc_url($about_us_url) . '" class="more">' . __('Read More', 'healol-domain') . '</a>';
                    endif;
                    ?>
            </div>

            <?php
            }
            ?>

        </div>

        <!--about-comp-->

        <div class="comp-service">
            <div class="title-a">
                <h2><?php _e('Solutions Services', 'healol-domain'); ?></h2>
            </div>

            <div class="text-box">
                <ul class="list-a">
                    <?php
                    $args = array(
                        'post_type' => 'solutions',
                        'posts_per_page' => 6,
                        'paged' => 1
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <li>
                        <div class="img-box">
                            <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img1.jpg"
                                alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="caption-a">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                        <p><?php echo get_the_content(); ?></p>
                    </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<li>' . __('No Solutions found.', 'healol-domain') . '</li>';
                    endif;
                    ?>
                </ul>

                <a id="load-more" class="more"><?php _e('Read More', 'healol-domain'); ?></a>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--comp-service-->
    </div>
</section>
<!--Home-content-->

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
            <li>No partners found.</li>
            <?php
            endif;
            ?>
        </ul>

    </div>
</section>

<?php
get_footer();
?>